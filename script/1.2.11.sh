#!/bin/sh

composer install
php artisan vendor:publish --force --all
php artisan migrate
php artisan db:seed --class=\\Modules\\AppAutomation\\Database\\Seeders\\AppAutomationNodeSeeder
