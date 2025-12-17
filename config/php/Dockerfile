FROM php:8.4-fpm-bookworm

# Instalamos dependencias del sistema (Debian usa apt-get)
RUN apt-get update && apt-get install -y \
    libxml2-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libicu-dev \
    libzip-dev \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Configurar e instalar extensiones (En Debian 8.4+, opcache ya viene incluido)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        gd \
        pdo_mysql \
        mysqli \
        intl \
        zip

# Activar Opcache
RUN docker-php-ext-enable opcache

# Configurar directorio de trabajo
WORKDIR /var/www

# IMPORTANTE: Cambiar el ID del usuario www-data para evitar problemas de permisos con el host
# Esto hace que el usuario de PHP tenga permisos sobre los archivos montados
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
