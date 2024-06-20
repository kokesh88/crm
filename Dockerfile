# Используем официальный образ PHP с Apache
FROM php:8.2-apache

# Устанавливаем необходимые PHP расширения и утилиты
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_sqlite zip

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем файлы проекта в директорию веб-сервера
COPY . /var/www/html

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Устанавливаем права на директорию и загружаем зависимости через Composer
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && composer install \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Копируем и настраиваем конфигурационный файл Apache из корня проекта
COPY ./laravel.conf /etc/apache2/sites-available/000-default.conf

# Активируем mod_rewrite для Laravel
RUN a2enmod rewrite

# Открываем порт 80 для HTTP трафика
EXPOSE 80

# Запускаем Apache сервер в форграунд режиме
CMD ["apache2-foreground"]
