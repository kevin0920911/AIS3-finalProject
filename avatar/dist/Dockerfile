FROM php:7-apache

RUN apt update && apt install -y \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libwebp-dev \
        libxpm-dev \
        gcc \
        libfontconfig1 \
        libx11-6 \
        libharfbuzz0b \
        libfribidi0 \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp --with-xpm \
    && docker-php-ext-install -j$(nproc) gd

COPY --from=composer/composer:2.5.8 /usr/bin/composer /usr/bin/composer

COPY src/composer.json /var/www/html/composer.json
COPY src/index.php /var/www/html/index.php
COPY src/sentence.php /var/www/html/sentence.php
COPY src/sess_manager.php /var/www/html/sess_manager.php
COPY src/upload.php /var/www/html/upload.php
COPY src/NOTFOUND.png /var/www/html/NOTFOUND.png
COPY src/sentence_manager.php /var/www/html/sentence_manager.php

COPY ./flag/readflag.c /readflag.c
COPY ./flag/flag /flag
RUN chmod 0400 /flag && chown root:root /flag
RUN chmod 0444 /readflag.c && gcc /readflag.c -o /readflag
RUN chown root:root /readflag && chmod 4555 /readflag

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN cd /var/www/html && composer install
