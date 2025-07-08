FROM php:8.2-apache

# Install mysqli and enable it
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy all project files to Apache root
COPY . /var/www/html/

# Expose port 80
EXPOSE 80


