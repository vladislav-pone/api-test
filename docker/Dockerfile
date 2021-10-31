FROM php:8.0-fpm

RUN apt-get update && \
    apt-get install -y libonig-dev && \
    rm -rf /var/lib/apt/lists/* \
RUN docker-php-ext-install mbstring

WORKDIR /var/www
