#!/usr/bin/env bash

# deploiement des migrations avec injection des donnée d'exemple 
php artisan migrate:refresh --seed

echo 'Tout est bon';