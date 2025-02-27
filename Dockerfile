# Usa la imagen base de PHP con Apache
FROM php:8.1-apache

# Instala las extensiones de PHP necesarias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    curl \
    git \
    libjpeg62-turbo-dev \
    libpng-dev \
    libfreetype6-dev \
    && docker-php-ext-install zip gd

# Si usas MongoDB, instala la extensión de MongoDB
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia el contenido del proyecto al directorio de trabajo
COPY . /var/www/html

# Cambia el directorio de trabajo
WORKDIR /var/www/html

# Instala las dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Copiar el archivo de configuración de Apache
COPY apache-setup.conf /etc/apache2/sites-available/000-default.conf

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Establece permisos adecuados para el directorio de trabajo
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80
EXPOSE 80
