# Rentals Tacloban - Dockerized Laravel App

for appdev Dockerized Laravel with PHP 8.2, Nginx, MySQL, phpMyAdmin.

## para tak kagrupo

```bash
git clone https://github.com/NikkoRod/rentals-tacloban.git
cd rentals-tacloban
docker-compose up -d --build

#tapos

docker exec -it rentals_app bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
