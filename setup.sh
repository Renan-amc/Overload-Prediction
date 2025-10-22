#!/bin/bash

sudo apt update
sudo apt install docker.io docker-compose -y
sudo systemctl start docker
sudo systemctl enable docker
sudo usermod -aG docker $USER

docker compose -f docker-compose.yml up -d

sleep 15

docker-compose exec -T workspace composer install

docker-compose exec -T workspace php artisan config:clear
docker-compose exec -T workspace php artisan cache:clear
docker-compose exec -T workspace php artisan route:clear

sleep 10

docker-compose exec -T workspace php artisan migrate --force
docker-compose exec -T workspace php artisan db:seed --force
docker-compose exec -T workspace php artisan storage:link

docker-compose exec -T workspace php artisan config:cache
docker-compose exec -T workspace php artisan route:cache
docker-compose exec -T workspace php artisan view:cache

docker-compose exec -T workspace chmod -R 775 storage bootstrap/cache
docker-compose exec -T app chown -R www-data:www-data storage bootstrap/cache

sudo gpg -k
sudo gpg --no-default-keyring --keyring /usr/share/keyrings/k6-archive-keyring.gpg --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys C5AD17C747E3415A3642D57D77C6C491D6AC1D69
echo "deb [signed-by=/usr/share/keyrings/k6-archive-keyring.gpg] https://dl.k6.io/deb stable main" | sudo tee /etc/apt/sources.list.d/k6.list
sudo apt-get update
sudo apt-get install k6 -y

docker exec overload-netdata cat /var/lib/netdata/netdata_random_session_id