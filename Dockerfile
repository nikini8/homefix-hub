FROM php:8.2-apache

RUN docker-php-ext-install mysqli

COPY . /app/

RUN cp -r /app/public/. /var/www/html/ && \
    cp -r /app/private/ /var/www/private/

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

EXPOSE 80