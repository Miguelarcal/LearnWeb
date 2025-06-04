# Usamos una imagen base de PHP con Composer y Nginx
FROM php:8.2-fpm

# Instalar dependencias
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libpq-dev \
    libzip-dev \
    git \
    unzip \
    libcurl4-openssl-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install intl pdo pdo_mysql zip gd curl

# Instalar Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir el directorio de trabajo
WORKDIR /var/www/symfony

# Copiar los archivos de la aplicación Symfony
COPY . .

# Instalar dependencias de Symfony (Composer)
RUN composer install --no-interaction --prefer-dist

# Exponer el puerto 8000
EXPOSE 8000

# Comando para ejecutar Symfony en modo de desarrollo
CMD ["symfony", "server:start", "--no-tls", "--allow-http", "--allow-all-ip", "--port=8000"]
