FROM php:8.0

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer self-update

# Install PHP extensions
RUN docker-php-ext-install pgsql pdo pdo_pgsql mbstring exif pcntl bcmath gd
#RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/

# Copy composer.lock and composer.json
COPY . /var/www

# Set working directory
WORKDIR /var/www


# Composer Install
RUN composer install

# Expose port 8000 and start laravel server
EXPOSE 8000

CMD php artisan serve --host=0.0.0.0
