FROM php:8.2-apache

RUN docker-php-ext-install mysqli

COPY public/ /var/www/html/
COPY private/ /var/www/private/

RUN sed -i 's/80/80/g' /etc/apache2/ports.conf && \
    echo "ServerName localhost" >> /etc/apache2/apache2.conf && \
    a2enmod rewrite

EXPOSE 80