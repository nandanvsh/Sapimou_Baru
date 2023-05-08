composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh
php artisan storage:link
php artisan serve
