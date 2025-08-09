#!/bin/bash
set -e

# Instalar dependencias backend y frontend
composer install --no-dev --optimize-autoloader
npm ci

# Compilar frontend con Vite
npm run build

# Cachear config de Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache
