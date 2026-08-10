from php:8.2-apache

copy ./var/www/html/

run docker-php-ext-install mysqli

run a2enmod rewrite