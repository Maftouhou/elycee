#!/usr/bin/env bash

# Creation des models et les migrations en même temps
php artisan make:model Comment	--migration
# php artisan make:model User --migration
php artisan make:model Post --migration
php artisan make:model Question --migration
php artisan make:model Choice --migration
php artisan make:model Response --migration
php artisan make:model Score --migration

echo 'Tout est bon';