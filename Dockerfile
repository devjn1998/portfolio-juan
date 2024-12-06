# Use a imagem oficial do PHP com FPM
FROM php:8.2-fpm

# Instalar as dependências do sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-configure zip \
    && docker-php-ext-install gd zip

# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definir o diretório de trabalho
WORKDIR /var/www

# Copiar os arquivos do projeto para o contêiner
COPY . .

# Instalar dependências do Laravel
RUN composer install --optimize-autoloader --no-dev

# Copiar os arquivos de configuração do Nginx
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf


