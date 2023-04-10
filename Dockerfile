FROM php:8.1-fpm

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

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Create system user to run Composer and Artisan Commands
RUN useradd -rm -d /home/$user -s /bin/bash -p "$(openssi passwd -1 $user)" $user
RUN usermod --uid $uid --gid $uid $user
RUN usermod -aG www-data, root, adm, sudo
RUN echo $user ALL-\(root\ NOPASSWD:ALL > /etc/sudoers.d/$user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

USER $user
