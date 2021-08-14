FROM php:7.4-apache

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
# Tools
    apt-utils \
    wget \
    git \
    nano \
    iputils-ping \
    locales \
    unzip \
    zip \
    xz-utils \
    vim \
    libaio1 \
    libaio-dev \
    build-essential \
    libzip-dev \
    supervisor \
# Configure PHP
    libxml2-dev \
    libmcrypt-dev \
    libpng-dev
RUN docker-php-ext-configure gd && \
    docker-php-ext-install -j$(nproc) mysqli soap gd zip opcache pdo pdo_mysql

# Configure Apache & clean
RUN a2enmod rewrite && \
    apt-get clean && \
    apt-get -y purge \
        libxml2-dev \
        libmcrypt-dev \
        libpng12-dev && \
    rm -rf /var/lib/apt/lists/* /usr/src/*
# ======= composer =======
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Set locales
RUN locale-gen en_US.UTF-8 en_GB.UTF-8 de_DE.UTF-8 es_ES.UTF-8 fr_FR.UTF-8 it_IT.UTF-8 km_KH sv_SE.UTF-8 fi_FI.UTF-8
# get the tar.xz from php... this is mostly for oracle
RUN wget -O /usr/src/php.tar.xz https://www.php.net/distributions/php-7.2.21.tar.xz
#create the containers php.ini
RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini && \
    sed -i -e "s/^ *memory_limit.*/memory_limit = 4G/g" /usr/local/etc/php/php.ini

#composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

#create the containers php.ini
RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini && \
    sed -i -e "s/^ *memory_limit.*/memory_limit = 4G/g" /usr/local/etc/php/php.ini

COPY ./dock-files/startup.sh /var/startup.sh
