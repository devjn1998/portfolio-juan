FROM php:8.2-fpm

# Instale dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    postgresql-client \
    libpq-dev

# Instale extensões PHP
RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd

# Instale Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configure o diretório de trabalho
WORKDIR /var/www

# Copie os arquivos do projeto
COPY . /var/www/

# Copie o arquivo de configuração padrão
COPY .env.example /var/www/.env

# Instale dependências do projeto
RUN composer install --no-dev --optimize-autoloader

# Configure permissões necessárias
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Gere a chave do aplicativo
RUN php artisan key:generate
