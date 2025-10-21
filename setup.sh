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