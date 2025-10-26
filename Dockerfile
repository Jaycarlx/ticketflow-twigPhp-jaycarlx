# Use the official PHP 8 image with Apache
FROM php:8.2-apache

# Install Composer
RUN apt-get update && apt-get install -y git unzip && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    rm composer-setup.php

# Copy project files into the container
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html/

# Install dependencies
RUN composer install --no-dev

# Enable Apache mod_rewrite (important for clean URLs)
RUN a2enmod rewrite

# Set Apache document root to /var/www/html/public
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Expose port 80 to the web
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
