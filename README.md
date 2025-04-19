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


#kun may error permissions

docker exec -it rentals_app bash
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
exit

#open git bash tapos kadto ha project file then

chown -R $USER:$USER src/storage src/bootstrap/cache
chmod -R 775 src/storage src/bootstrap/cache

