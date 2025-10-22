#!/bin/bash
# install-laravel-baremetal.sh

# Atualizar sistema
sudo apt update && sudo apt upgrade -y

# Instalar dependências
sudo apt install -y software-properties-common

# Adicionar repositório PHP 8.2
sudo add-apt-repository -y ppa:ondrej/php
sudo apt update

# Instalar PHP 8.2 e extensões
sudo apt install -y php8.2-fpm php8.2-cli php8.2-mysql php8.2-redis \
    php8.2-mbstring php8.2-xml php8.2-bcmath php8.2-curl \
    php8.2-zip php8.2-gd php8.2-intl

# Instalar Nginx
sudo apt install -y nginx

# Instalar MySQL
sudo apt install -y mysql-server

# Instalar Redis
sudo apt install -y redis-server

# Instalar Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Instalar Node.js (opcional)
curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
sudo apt install -y nodejs

echo "✅ Instalação concluída!"

# Configurar MySQL
sudo mysql -e "CREATE DATABASE overload;"
sudo mysql -e "CREATE USER 'overload_user'@'localhost' IDENTIFIED BY 'secret';"
sudo mysql -e "GRANT ALL PRIVILEGES ON overload.* TO 'overload_user'@'localhost';"
sudo mysql -e "FLUSH PRIVILEGES;"

# Configuração do Nginx
#!/bin/bash
echo "=== CONFIGURAÇÃO COMPLETA DO NGINX ==="

# 1. Criar symlink
PROJECT_PATH=$(pwd)
echo "📁 Criando symlink para: $PROJECT_PATH"
sudo ln -sf "$PROJECT_PATH" /var/www/overload

# 2. Criar configuração do Nginx
echo "🌐 Configurando Nginx..."
sudo tee /etc/nginx/sites-available/laravel > /dev/null <<'EOF'
server {
    listen 8085;
    server_name localhost;
    root /var/www/overload/public;
    index index.php index.html index.htm;

    charset utf-8;
    
    access_log /var/log/nginx/laravel-access.log;
    error_log /var/log/nginx/laravel-error.log;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_read_timeout 300;
    }

    location ~ /\. {
        deny all;
        access_log off;
        log_not_found off;
    }
}
EOF

# 3. ATIVAR O SITE (etapa que faltava)
echo "🔗 Ativando site Laravel..."
sudo ln -sf /etc/nginx/sites-available/laravel /etc/nginx/sites-enabled/

# 4. REMOVER SITE PADRÃO (importante)
echo "🗑️ Removendo site padrão..."
sudo rm -f /etc/nginx/sites-enabled/default

# 5. Corrigir permissões
echo "🔐 Corrigindo permissões..."
sudo chown -R www-data:www-data /var/www/overload/storage
sudo chown -R www-data:www-data /var/www/overload/bootstrap/cache
sudo chmod -R 775 /var/www/overload/storage
sudo chmod -R 775 /var/www/overload/bootstrap/cache

# 6. Testar configuração
echo "🧪 Testando configuração Nginx..."
sudo nginx -t

# 7. Reiniciar serviços
echo "🔄 Reiniciando serviços..."
sudo systemctl restart php8.2-fpm
sudo systemctl restart nginx

# 8. Verificar status
echo "📊 Status dos serviços:"
echo "PHP-FPM: $(systemctl is-active php8.2-fpm)"
echo "Nginx: $(systemctl is-active nginx)"

# 9. Teste final
echo "🚀 Testando aplicação..."
curl -I http://localhost:8085/ 2>/dev/null | head -1

echo "🎉 Configuração completa! Acesse: http://localhost:8085/"

sudo sed -i 's/^memory_limit = .*/memory_limit = 512M/' /etc/php/8.2/fpm/php.ini
sudo sed -i 's/^max_execution_time = .*/max_execution_time = 60/' /etc/php/8.2/fpm/php.ini
sudo sed -i 's/^upload_max_filesize = .*/upload_max_filesize = 100M/' /etc/php/8.2/fpm/php.ini
sudo sed -i 's/^post_max_size = .*/post_max_size = 100M/' /etc/php/8.2/fpm/php.ini

# OPcache - criar arquivo separado
sudo tee /etc/php/8.2/mods-available/opcache.ini > /dev/null <<'EOF'
opcache.enable=1
opcache.memory_consumption=256
opcache.interned_strings_buffer=16
opcache.max_accelerated_files=10000
opcache.validate_timestamps=0
opcache.save_comments=1
opcache.fast_shutdown=1
EOF

sudo sed -i 's/^pm = .*/pm = dynamic/' /etc/php/8.2/fpm/pool.d/www.conf
sudo sed -i 's/^pm.max_children = .*/pm.max_children = 50/' /etc/php/8.2/fpm/pool.d/www.conf
sudo sed -i 's/^pm.start_servers = .*/pm.start_servers = 10/' /etc/php/8.2/fpm/pool.d/www.conf
sudo sed -i 's/^pm.min_spare_servers = .*/pm.min_spare_servers = 5/' /etc/php/8.2/fpm/pool.d/www.conf
sudo sed -i 's/^pm.max_spare_servers = .*/pm.max_spare_servers = 20/' /etc/php/8.2/fpm/pool.d/www.conf
sudo sed -i 's/^pm.max_requests = .*/pm.max_requests = 500/' /etc/php/8.2/fpm/pool.d/www.conf

# Manter socket (não mudar para 9000) e adicionar clear_env
sudo sed -i 's/^listen = .*/listen = \/var\/run\/php\/php8.2-fpm.sock/' /etc/php/8.2/fpm/pool.d/www.conf
echo "clear_env = no" | sudo tee -a /etc/php/8.2/fpm/pool.d/www.conf

sudo systemctl restart php8.2-fpm

echo ""
echo "=== INSTALANDO NETDATA ==="

# Instalar Netdata via script oficial (método recomendado)
wget -O /tmp/netdata-kickstart.sh https://get.netdata.cloud/kickstart.sh
sudo sh /tmp/netdata-kickstart.sh --non-interactive --disable-telemetry

# Aguardar o Netdata iniciar
sleep 5

# Configurar Netdata para monitorar PHP-FPM
echo "📊 Configurando monitoramento PHP-FPM..."
sudo tee /etc/netdata/go.d/phpfpm.conf > /dev/null <<'EOF'
jobs:
  - name: local
    url: unix:/var/run/php/php8.2-fpm.sock
    fcgi_path: /status
EOF

# Habilitar status do PHP-FPM
if ! grep -q "^pm.status_path" /etc/php/8.2/fpm/pool.d/www.conf; then
    echo "pm.status_path = /status" | sudo tee -a /etc/php/8.2/fpm/pool.d/www.conf
fi

# Configurar Netdata para monitorar Nginx
echo "📊 Configurando monitoramento Nginx..."
sudo tee /etc/netdata/go.d/nginx.conf > /dev/null <<'EOF'
jobs:
  - name: local
    url: http://127.0.0.1:8086/stub_status
EOF

# Adicionar endpoint de status no Nginx
sudo tee /etc/nginx/sites-available/nginx-status > /dev/null <<'EOF'
server {
    listen 8086;
    server_name localhost;
    
    location /stub_status {
        stub_status on;
        access_log off;
        allow 127.0.0.1;
        deny all;
    }
}
EOF

sudo ln -sf /etc/nginx/sites-available/nginx-status /etc/nginx/sites-enabled/

# Configurar Netdata para monitorar MySQL
echo "📊 Configurando monitoramento MySQL..."
sudo mysql -e "CREATE USER IF NOT EXISTS 'netdata'@'localhost';"
sudo mysql -e "GRANT USAGE, REPLICATION CLIENT, PROCESS ON *.* TO 'netdata'@'localhost';"
sudo mysql -e "FLUSH PRIVILEGES;"

sudo tee /etc/netdata/go.d/mysql.conf > /dev/null <<'EOF'
jobs:
  - name: local
    dsn: netdata@unix(/var/run/mysqld/mysqld.sock)/
EOF

# Configurar Netdata para monitorar Redis
echo "📊 Configurando monitoramento Redis..."
sudo tee /etc/netdata/go.d/redis.conf > /dev/null <<'EOF'
jobs:
  - name: local
    address: 127.0.0.1:6379
EOF

# Reiniciar todos os serviços
echo "🔄 Reiniciando serviços..."
sudo systemctl restart php8.2-fpm
sudo systemctl restart nginx
sudo systemctl restart netdata

# Verificar status
echo ""
echo "📊 STATUS DOS SERVIÇOS:"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
echo "Laravel:  http://localhost:8085/"
echo "Netdata:  http://localhost:19999/"
echo ""
echo "PHP-FPM:  $(systemctl is-active php8.2-fpm)"
echo "Nginx:    $(systemctl is-active nginx)"
echo "MySQL:    $(systemctl is-active mysql)"
echo "Redis:    $(systemctl is-active redis)"
echo "Netdata:  $(systemctl is-active netdata)"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"