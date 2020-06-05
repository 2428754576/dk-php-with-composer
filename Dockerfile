FROM composer:1.6.5 as build

WORKDIR /app
COPY . /app
RUN composer install

FROM php:7.1.8-apache

RUN apt -yqq update
RUN docker-php-ext-install mysqli pdo pdo_mysql

EXPOSE 80
COPY --from=build /app /app
COPY vhost.conf /etc/apache2/sites-available/000-default.conf
RUN chown -R www-data:www-data /app \
    && a2enmod rewrite

