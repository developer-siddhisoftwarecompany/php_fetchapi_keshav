# Use official PHP image
FROM php:8.2-cli

# Set working directory
WORKDIR /app

# Copy project files
COPY . .

# Install composer
RUN apt-get update && apt-get install -y unzip git \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies (if any)
RUN composer install || true

# Expose port 8080 (Render default)
EXPOSE 8080

# Start PHP server
CMD ["php", "-S", "0.0.0.0:8080", "index.php"]
