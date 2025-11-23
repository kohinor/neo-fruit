FROM php:5.6-apache

# Enable Apache mod_rewrite for clean URLs
RUN a2enmod rewrite

# Install any additional PHP extensions if needed
# RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html/

# Create data directory with proper permissions
RUN mkdir -p /var/www/html/data && \
    chmod 777 /var/www/html/data && \
    touch /var/www/html/data/content.json && \
    chmod 666 /var/www/html/data/content.json && \
    touch /var/www/html/data/history.json && \
    chmod 666 /var/www/html/data/history.json

# Fix permissions for all directories and files
RUN chmod -R 755 /var/www/html && \
    chmod -R 644 /var/www/html/*.php && \
    find /var/www/html -type d -exec chmod 755 {} \; && \
    find /var/www/html -type f -exec chmod 644 {} \; && \
    chmod 777 /var/www/html/data && \
    chmod 666 /var/www/html/data/*.json

# Copy entrypoint script
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Set ownership for Apache
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80

# Use custom entrypoint that fixes permissions after volumes are mounted
ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
