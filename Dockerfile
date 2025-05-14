# Use the official PHP Apache image
FROM php:8.3.20-fpm-alpine

# Install necessary PHP extensions
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli

#Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY . .


