FROM php:8.3-cli

# Install dependency
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project
COPY . .

# Install dependency Laravel
RUN composer install --no-dev --optimize-autoloader

# Permission
RUN chmod -R 775 storage bootstrap/cache

# Generate cache
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Port Render
EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=$PORT
