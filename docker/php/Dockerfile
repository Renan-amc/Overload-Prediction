FROM php:8.2-fpm

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensões PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip opcache

# Instalar Redis extension
RUN pecl install redis && docker-php-ext-enable redis

# Copiar configurações otimizadas
COPY docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini
COPY docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf

# Configurar working directory
WORKDIR /var/www

# Copiar aplicação
COPY . /var/www

# Ajustar permissões
RUN chown -R www-data:www-data /var/www

EXPOSE 9000

CMD ["php-fpm"]