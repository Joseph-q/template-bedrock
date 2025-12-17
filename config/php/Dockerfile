FROM php:8.5-fpm-alpine 


RUN apk add --no-cache \
    $PHPIZE_DEPS \
    libxml2-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    icu-dev \
    libzip-dev \
    # Compila y activa todas las extensiones en un solo paso
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        gd \
        pdo pdo_mysql mysqli \
        intl \
        opcache \
        zip