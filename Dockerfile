FROM php:8.1-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    wget \
    curl \
    net-tools \
    g++ \
    zip \
    unzip \
    nano \
    vim \
    sudo \
    npm \
    nodejs \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    -y mariadb-client

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install zip mysqli pdo_mysql mbstring exif pcntl bcmath gd && docker-php-ext-enable mysqli

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -rm -d /home/$user -s /bin/bash -p "$(openssi passwd -1 $user)" $user
RUN usermod --uid $uid $user
RUN usermod -aG www-data, sudo
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Assign permissions of the working directory to the www-data user
RUN chown -R www-data:www-data \
        /var/www/storage \
        /var/www/bootstrap/cache

USER $user

# Expose port 9000 and start php-fpm server (for FastCGI Process Manager)
EXPOSE 9000
CMD ["php-fpm"]
