FROM php:8.2-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable Apache mod_rewrite (optional but often useful for PHP apps)
RUN a2enmod rewrite

# Copy all files into the container
COPY . /var/www/html/

EXPOSE 80



