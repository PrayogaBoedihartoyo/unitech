FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Check contents and Composer version
RUN ls -la
RUN cat composer.json
RUN composer --version

# Install dependencies
RUN COMPOSER_DEBUG=1 composer install --no-scripts --no-autoloader --verbose --prefer-dist --no-progress --no-interaction || (echo "Composer install failed" && cat /root/.composer/composer-diagnose.json && exit 1)

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]