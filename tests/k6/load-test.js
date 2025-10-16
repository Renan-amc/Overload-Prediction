import http from 'k6/http';
import { check, sleep } from 'k6';
import { Rate } from 'k6/metrics';

const errorRate = new Rate('errors');
const BASE_URL = 'http://localhost:8085';

export const options = {
  stages: [
    { duration: '30s', target: 10 },
    { duration: '30s', target: 50 },
    { duration: '30s', target: 100 },
    { duration: '30s', target: 250 },
    { duration: '30s', target: 500 },
    { duration: '30s', target: 0 },
  ],
  thresholds: {
    http_req_duration: ['p(95)<3000'],
    http_req_failed: ['rate<0.1'],
    errors: ['rate<0.1'],
  },
};

// Variáveis globais para sessão
let csrfToken = '';
let sessionCookie = '';

export default function () {
  // PRIMEIRO: Obter CSRF token da página de login
  let res = http.get(`${BASE_URL}/login`);
  
  // Extrair CSRF token do HTML ou cookies
  const cookieHeader = res.headers['Set-Cookie'];
  if (cookieHeader) {
    // Verificar se é array antes de usar find
    if (Array.isArray(cookieHeader)) {
      sessionCookie = cookieHeader.find(c => c.includes('laravel_session')) || '';
    } else {
      sessionCookie = cookieHeader.includes('laravel_session') ? cookieHeader : '';
    }
    
    // Tentar extrair token do HTML
    const tokenMatch = res.body.match(/name="_token" value="([^"]*)"/);
    if (tokenMatch) {
      csrfToken = tokenMatch[1];
    }
  }

  // SEGUNDO: Fazer login com CSRF token
  const loginPayload = `username=munera@gmail.com&password=123456&_token=${encodeURIComponent(csrfToken)}`;

  const loginParams = {
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
      'Cookie': sessionCookie,
    },
  };

  res = http.post(`${BASE_URL}/login-submit`, loginPayload, loginParams);
  
  const loginSuccess = check(res, {
    'login status is 200 or 302': (r) => [200, 302].includes(r.status),
  });

  if (!loginSuccess) {
    errorRate.add(1);
    console.log(`Login failed: ${res.status}`);
    sleep(1);
    return;
  }

  // Atualizar cookies da sessão após login
  if (res.headers['Set-Cookie']) {
    const newCookies = res.headers['Set-Cookie'];
    if (Array.isArray(newCookies)) {
      sessionCookie = newCookies.find(c => c.includes('laravel_session')) || sessionCookie;
    } else {
      sessionCookie = newCookies.includes('laravel_session') ? newCookies : sessionCookie;
    }
  }

  sleep(1);

  // TERCEIRO: Testar rotas autenticadas
  const authParams = {
    headers: {
      'Cookie': sessionCookie,
    },
  };

  // Teste rotas autenticadas
  const routes = [
    { path: '/', name: 'home' },
    { path: '/comprar-ingressos', name: 'comprar-ingressos' },
    { path: '/sobre-evento', name: 'sobre-evento' },
    { path: '/sobre', name: 'sobre' },
    { path: '/carrinho', name: 'carrinho' }
  ];

  routes.forEach(route => {
    res = http.get(`${BASE_URL}${route.path}`, authParams);
    
    check(res, {
      [`${route.name} status 200`]: (r) => r.status === 200,
      [`${route.name} response time < 3000ms`]: (r) => r.timings.duration < 3000,
    }) || errorRate.add(1);
    
    sleep(0.5);
  });
}

export function setup() {
  console.log('=== Iniciando testes com autenticação ===');
  console.log('Base URL:', BASE_URL);
  console.log('Username: munera@gmail.com');
  console.log('Cenário: Docker Orquestrados');
}

export function teardown(data) {
  console.log('=== Testes finalizados ===');
}