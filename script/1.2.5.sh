#!/bin/sh

composer install
php artisan vendor:publish --force --all
php artisan migrate
php artisan db:seed --class=\\Modules\\GuestBook\\Database\\Seeders\\GuestBookNodeSeederTableSeeder
