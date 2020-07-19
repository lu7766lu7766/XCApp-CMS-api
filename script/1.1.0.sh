#!/bin/sh

composer install
php artisan vendor:publish --force --all
php artisan migrate:refresh
php artisan passport:install
php artisan db:seed
