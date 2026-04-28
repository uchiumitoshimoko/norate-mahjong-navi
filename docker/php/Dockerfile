FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
        libicu-dev \
        libonig-dev \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        mysqli \
        mbstring \
        intl \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && rm -rf /var/lib/apt/lists/*

# apcu.ini: apc.cache_by_default を有効にして webroot/.htaccess の php_flag を認識させる
RUN echo "extension=apcu.so\napc.enabled=1\napc.enable_cli=0\napc.cache_by_default=1" \
    > /usr/local/etc/php/conf.d/docker-apcu.ini

RUN a2enmod rewrite

COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["apache2-foreground"]
