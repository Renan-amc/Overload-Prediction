FROM php:8.2-cli

# Instalar dependências do sistema + ferramentas de desenvolvimento
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    nano \
    vim \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip \
    && pecl install redis && docker-php-ext-enable redis

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Criar usuário para desenvolvimento (DIFERENTE do www-data)
RUN groupadd -g 1000 developer && \
    useradd -u 1000 -ms /bin/bash -g developer developer

# Definir diretório de trabalho
WORKDIR /var/www

# Copiar arquivos da aplicação
COPY . .

# Mudar proprietário para developer
RUN chown -R developer:developer /var/www

# Mudar para usuário developer
USER developer

# Instalar dependências do Composer
RUN composer install --optimize-autoloader

# Criar link simbólico do storage
RUN php artisan storage:link

EXPOSE 9000

CMD ["tail", "-f", "/dev/null"]