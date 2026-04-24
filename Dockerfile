FROM php:8.2-apache

RUN docker-php-ext-install mysqli

COPY public/ /var/www/html/
COPY private/ /var/www/private/

EXPOSE 80