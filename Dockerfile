#Use official PHP image with FPM
FROM php:8.2-fpm

#install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath

#install Composer globally 
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

#set working directory
WORKDIR /var/www

#Copy app files into the container 
COPY . .

#install laravel dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

#Set file permission 
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

#Expose port 
EXPOSE 9000

#start php-fpm server
CMD [ "php-fpm" ]