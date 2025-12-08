FROM php:8.3-fpm

COPY ./docker/php.ini /usr/local/etc/php/conf.d/custom.ini

# Install Redis extension
RUN pecl install redis \
    && docker-php-ext-enable redis

# Install system dependencies and MySQL client
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    gnupg \
    pkg-config \
    libzip-dev \
    nano \
    iputils-ping \
    default-mysql-client && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /var/cache/apt/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g npm@latest

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Laravel cache paths exist
RUN mkdir -p storage/framework/{cache,sessions,views} \
    && mkdir -p bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache

# Install composer dependencies (if composer.json exists)
RUN if [ -f composer.json ]; then composer install --no-dev --optimize-autoloader ; fi

# Install npm dependencies (if package.json exists)
RUN if [ -f package.json ]; then npm install && npm run build; fi

# Set permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && \
    chmod -R 777 /var/www/bootstrap/cache /var/www/storage

# Expose port for PHP-FPM
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm", "-F"]
