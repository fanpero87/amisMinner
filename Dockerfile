FROM php:8.1.0alpha3-fpm

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

# Arguments defined in docker-compose.yml
ARG user=minner
ARG uid=1000

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root,adm,sudo -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

USER $user
