#!/bin/sh

php /var/www/html/artisan key:generate
php /var/www/html/artisan storage:link

while ! mysqladmin ping -h "$DB_HOST" --silent; do
  echo "Waiting for MySQL to start..."
  sleep 1
done

php /var/www/html/artisan migrate --force --seed

php /var/www/html/artisan config:clear
php /var/www/html/artisan route:cache
php /var/www/html/artisan view:cache
php /var/www/html/artisan event:cache

php /var/www/html/artisan serve --host=0.0.0.0