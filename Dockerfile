FROM nextstage/php:8.1-fpm-apache

ENV AUTORUN_ENABLED=false \
    APACHE_DOCUMENT_ROOT=/var/www/html/public \
    PHP_VERSION=8.1 \
    AUTORUN_LARAVEL_STORAGE_LINK=false \
    AUTORUN_LARAVEL_MIGRATION=false

COPY . /var/www/html

RUN composer install -q --no-dev
RUN chmod -R 777 /var/www/html/storage