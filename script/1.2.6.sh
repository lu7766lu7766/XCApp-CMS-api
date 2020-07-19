#!/bin/sh

composer install
php artisan vendor:publish --force --all
