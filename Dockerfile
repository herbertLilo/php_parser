# Use PHP 8.2 CLI image as the base
FROM php:8.2-cli

# Set the working directory
WORKDIR /var/www/html

# Copy all files from the host to the container
COPY . /var/www/html

# Install PDO MySQL extension
RUN docker-php-ext-install pdo_mysql

# Set the default command to start bash (debugging friendly)
CMD ["bash"]
