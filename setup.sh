#!/bin/bash

# Inicializar Swarm
docker swarm init --advertise-addr 172.31.35.76

# Build das imagens
docker build -t overload-app:latest -f docker/php/Dockerfile .
docker build -t overload-workspace:latest -f docker/workspace/Dockerfile .

# Deploy do stack
docker stack deploy -c docker-compose.yml overload

# Aguardar serviços iniciarem
sleep 20

# Verificar status
docker stack services overload

# Pegar ID de um container workspace
WORKSPACE_ID=$(docker ps --filter "name=overload_workspace" --format "{{.ID}}" | head -n 1)

# Instalar dependências
docker exec $WORKSPACE_ID composer install --no-interaction --optimize-autoloader

# Limpar cache
docker exec $WORKSPACE_ID php artisan config:clear
docker exec $WORKSPACE_ID php artisan cache:clear
docker exec $WORKSPACE_ID php artisan route:clear

# Aguardar MySQL
sleep 10

# Migrations
docker exec $WORKSPACE_ID php artisan migrate --force
docker exec $WORKSPACE_ID php artisan db:seed --force
docker exec $WORKSPACE_ID php artisan storage:link

# Cache
docker exec $WORKSPACE_ID php artisan config:cache
docker exec $WORKSPACE_ID php artisan route:cache
docker exec $WORKSPACE_ID php artisan view:cache

# Permissões
docker exec $WORKSPACE_ID chmod -R 775 storage bootstrap/cache

# Pegar IDs dos containers app
for APP_ID in $(docker ps --filter "name=overload_app" --format "{{.ID}}"); do
    docker exec $APP_ID chown -R www-data:www-data storage bootstrap/cache
done

# Instalar k6 para testes de carga
sudo gpg -k
sudo gpg --no-default-keyring --keyring /usr/share/keyrings/k6-archive-keyring.gpg --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys C5AD17C747E3415A3642D57D77C6C491D6AC1D69
echo "deb [signed-by=/usr/share/keyrings/k6-archive-keyring.gpg] https://dl.k6.io/deb stable main" | sudo tee /etc/apt/sources.list.d/k6.list
sudo apt-get update
<<<<<<< HEAD
sudo apt-get install k6
=======
sudo apt-get install k6 -y

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
>>>>>>> ac415aeeb910a8818ff6303190bd4297b00d76a3
