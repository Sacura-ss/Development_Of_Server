FROM php:7.2-apache
RUN apt-get update \
    apt-get -y install libaprutil1-dbd-mysql1 \
    && docker-php-ext-install mysqli