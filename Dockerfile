FROM php:8.3-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libpq-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        gd \
        pdo \
        pdo_mysql \
        pdo_pgsql \
        zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project
COPY . .
RUN mkdir -p storage/framework/cache
RUN mkdir -p storage/framework/views
RUN mkdir -p storage/framework/sessions
RUN mkdir -p storage/logs
RUN chmod -R 775 storage bootstrap/cache
# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader
RUN mkdir -p storage/framework/cache
RUN mkdir -p storage/framework/views
RUN mkdir -p storage/framework/sessions
RUN mkdir -p storage/logs
RUN chmod -R 775 storage bootstrap/cache
# Optimize Laravel
RUN php artisan config:clear || true
RUN php artisan route:clear || true
RUN php artisan view:clear || true

# Expose Render port
EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-10000}