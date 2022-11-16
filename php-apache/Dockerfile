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
ADD php.ini /etc/php5/apache2/php.ini
#/usr/local/etc/php/conf.d/40-custom.ini