FROM php:8.2-cli-alpine AS cli

COPY --from=composer:2.5.8 /usr/bin/composer /usr/bin/composer

ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN apk add --no-cache --virtual .build-deps libxslt-dev &&\
    install-php-extensions xsl &&\
    apk del .build-deps

WORKDIR /opt/apps/app

COPY composer.json composer.lock ./

RUN composer install --no-scripts --no-autoloader --prefer-dist

COPY . .

RUN composer install --prefer-dist

FROM oven/bun:1.3 AS bun

WORKDIR /opt/apps/app

COPY . .