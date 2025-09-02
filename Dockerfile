# Использование официального образа PHP с FPM.
FROM php:8.2-fpm

# Установка системных зависимостей.
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Установка расширений PHP.
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl gd

# Установка Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && apt-get install -y nodejs

# Установка Composer.
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Установка рабочей директории.
WORKDIR /var/www/html

# Копирование всех файлов приложения.
COPY . .

# Установка зависимостей Composer.
RUN composer install --no-dev --optimize-autoloader

# Запуск NPM-сборки (для Laravel с Inertia/Vue).
RUN npm install && npm run build

# Открытие порта для FastCGI.
EXPOSE 9000

# Запуск PHP-FPM.
CMD ["php-fpm"]
