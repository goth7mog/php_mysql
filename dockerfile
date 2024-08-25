FROM arm64v8/php:5.6-apache

RUN docker-php-ext-install mysql && service apache2 restart