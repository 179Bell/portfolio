FROM php:7.4.1-fpm-alpine

# COPY php.ini
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

# Composer install
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

# install Node.js
COPY --from=node:10.22 /usr/local/bin /usr/local/bin
COPY --from=node:10.22 /usr/local/lib /usr/local/lib

# alpine ベースのイメージでなければ autoconf gcc g++ make は不要
RUN apk update && \
    apk add \
    git \
    zip \
    unzip \
    vim \
    autoconf gcc g++ make libzip-dev libpng-dev libjpeg-turbo-dev freetype-dev && \
    docker-php-ext-configure gd --with-jpeg=/usr && \
    docker-php-ext-install pdo_mysql bcmath gd && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug

WORKDIR /var/www/html