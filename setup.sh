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