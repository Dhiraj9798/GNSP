FROM php:8.2-apache

WORKDIR /var/www/html

# Enable common Apache modules used by PHP sites.
RUN a2enmod rewrite headers

# Copy project files.
COPY . /var/www/html

# Ensure app files are readable by Apache user.
RUN chown -R www-data:www-data /var/www/html

# Use a small startup script so Apache can listen on Render's dynamic PORT.
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 10000

CMD ["docker-entrypoint.sh"]
