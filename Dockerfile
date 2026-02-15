# Use the official PHP image with Apache
FROM php:8.2-apache

# Install the mysqli extension (needed for your PHP code to talk to MariaDB)
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy your source code into the container
COPY . /var/www/html/

# Set permissions so Apache can read your files
RUN chown -R www-data:www-data /var/www/html