import http from 'k6/http';
import { check, sleep } from 'k6';
import { Rate } from 'k6/metrics';

// Métricas customizadas
const errorRate = new Rate('errors');

// Configuração dos testes - Baseado na metodologia do TCC
// Testes progressivos: 10 → 50 → 100 → 250 → 500 usuários
export const options = {
  stages: [
    { duration: '2m', target: 10 },   // Aquecimento: 10 usuários por 2 min
    { duration: '3m', target: 50 },   // Carga leve: 50 usuários por 3 min
    { duration: '3m', target: 100 },  // Carga média: 100 usuários por 3 min
    { duration: '3m', target: 250 },  // Carga alta: 250 usuários por 3 min
    { duration: '5m', target: 500 },  // Stress test: 500 usuários por 5 min
    { duration: '2m', target: 0 },    // Cooldown: reduzir para 0
  ],
  thresholds: {
    http_req_duration: ['p(95)<2000'], // 95% das requisições devem responder em menos de 2s
    http_req_failed: ['rate<0.1'],     // Taxa de erro menor que 10%
    errors: ['rate<0.1'],              // Taxa de erro customizada menor que 10%
  },
};

const BASE_URL = 'http://nginx'; // URL interna do Docker

// Função principal de teste
export default function () {
  // Teste 1: Página inicial
  let res = http.get(`${BASE_URL}/`);
  check(res, {
    'home page status 200': (r) => r.status === 200,
    'home page load time < 1s': (r) => r.timings.duration < 1000,
  }) || errorRate.add(1);
  
  sleep(1);

  // Teste 2: Login (se tiver rota de login)
  const loginPayload = JSON.stringify({
    email: 'test@example.com',
    password: 'password',
  });

  const loginParams = {
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
    },
  };

  res = http.post(`${BASE_URL}/api/login`, loginPayload, loginParams);
  const loginSuccess = check(res, {
    'login status is 200 or 422': (r) => [200, 422].includes(r.status),
  });
  
  if (!loginSuccess) {
    errorRate.add(1);
  }

  sleep(2);

  // Teste 3: Listar eventos
  res = http.get(`${BASE_URL}/api/events`);
  check(res, {
    'events list status 200': (r) => r.status === 200,
    'events response time < 500ms': (r) => r.timings.duration < 500,
  }) || errorRate.add(1);

  sleep(1);

  // Teste 4: Ver detalhes de um evento
  res = http.get(`${BASE_URL}/api/events/1`);
  check(res, {
    'event detail status is 200 or 404': (r) => [200, 404].includes(r.status),
  });

  sleep(2);

  // Teste 5: Health check
  res = http.get(`${BASE_URL}/api/health`);
  check(res, {
    'health check status 200 or 404': (r) => [200, 404].includes(r.status),
  });

  sleep(1);
}

// Função de setup (roda uma vez no início)
export function setup() {
  console.log('=== Iniciando testes de performance ===');
  console.log('Base URL:', BASE_URL);
  console.log('Cenário: Docker Standalone');
}

// Função de teardown (roda uma vez no final)
export function teardown(data) {
  console.log('=== Testes finalizados ===');
}