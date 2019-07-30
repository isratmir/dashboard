FROM php:7.0-fpm-stretch

ENV APP /var/www
ENV COMPOSER_ALLOW_SUPERUSER 1

WORKDIR $APP

RUN apt-get update && apt-get install -y libmcrypt-dev \
    zlib1g-dev git \
    mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install mcrypt pdo_mysql zip

COPY --from=composer:1.5 /usr/bin/composer /usr/bin/composer

CMD