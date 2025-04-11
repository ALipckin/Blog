docker compose up -d --build

sudo chown -R www-data:www-data ./
sudo chmod -R 777 ./

docker compose exec app bash -c "
  cd /var/www &&
  composer install &&
  php artisan key:generate &&
  php artisan config:cache &&
  php artisan migrate:fresh --seed &&
  php artisan storage:link &&
  npm install &&
  npm run build
"
