#установка composer
FROM composer:latest AS composer
COPY ./composer.json /app/composer.json
RUN composer install --ignore-platform-reqs --no-scripts

FROM php:7.2-apache
RUN apt-get update \
    # для авторизации в apache через бд
    && apt-get install -y apache2-utils libaprutil1-dbd-mysql \
    ## подключаем пакет с авторизацией через бд в apache
    && docker-php-ext-install mysqli\
    && a2enmod authn_dbd\
    && a2enmod rewrite
    # подключаем redis
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis
RUN echo "ServerName localhost" | tee /etc/apache2/conf-available/fqdn.conf
RUN a2enconf fqdn

# Добавим свой php.ini, можем в нем определять свои значения конфига
ADD php.ini /usr/local/etc/php/conf.d/docker-php-ext-redis.ini

# устанавливаем боиблиотеки для работы
RUN apt-get install -y git && \
    #library implementing an interface for reading and writing PNG
    apt-get install -y libpng-dev && \
    # comands for zip
    apt-get install -y zip unzip && \
    # library for images, and watermark
    docker-php-ext-install gd
COPY --from=composer /app/vendor /var/www/html/vendor