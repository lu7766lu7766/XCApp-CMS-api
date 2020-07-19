#!/bin/sh

composer install
php artisan vendor:publish --force --all
php artisan migrate
php artisan db:seed --class=\\Modules\\News\\Database\\Seeders\\NewsNodeSeederTableSeeder
