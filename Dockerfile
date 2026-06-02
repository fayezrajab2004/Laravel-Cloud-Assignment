FROM php:8.2-apache

# تثبيت الحزم الأساسية
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev zip unzip git curl

# تثبيت إضافات PHP اللازمة لـ Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# تثبيت أداة Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# تفعيل ميزة الـ Rewrite في Apache لكي تعمل مسارات Laravel
RUN a2enmod rewrite

# تغيير مسار ملفات الموقع لكي يقرأ من مجلد public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html
