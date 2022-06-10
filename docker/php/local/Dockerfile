FROM php:8.0-apache

RUN apt-get update && \
    apt-get install -y libpq-dev libpng-dev libzip-dev git supervisor libxml2-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql zip soap gd


RUN apt-get install -y \
    libwebp-dev \
    libjpeg62-turbo-dev \
    libpng-dev libxpm-dev \
    libfreetype6-dev

RUN docker-php-ext-configure gd \
    -with-webp \
    -with-jpeg \
    -with-xpm \
    -with-freetype


RUN pecl install xdebug; \
        docker-php-ext-enable xdebug;

ADD xdebug.ini /usr/local/etc/php/conf.d/custom-xdebug.ini

RUN curl -sSL https://getcomposer.org/installer --insecure | php \
    && mv composer.phar /usr/local/bin/composer

ADD php-custom.ini /usr/local/etc/php/conf.d/php-custom.ini

COPY --chown=www-data:www-data . /var/www/html

RUN ls -la && ls -la /var/www/html

COPY vhost.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html

