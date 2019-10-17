#!/bin/bash

# We need to install dependencies only for Docker
[[ ! -e /.dockerenv ]] && exit 0

set -xe

curl -sL https://deb.nodesource.com/setup_10.x | bash - &&
curl -sS https://getcomposer.org/installer | php

# Install git (the php image doesn't have it) which is required by composer
apt-get update -yqq
apt-get install git -yqq \
    nodejs \
    wget zip unzip \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libssl-dev \
    libzip-dev \
    gnupg -yqq \
    libcurl4-gnutls-dev \
    libicu-dev \
    libmcrypt-dev \
    libvpx-dev \
    libjpeg-dev \
    libpng-dev \
    libxpm-dev \
    zlib1g-dev \
    libfreetype6-dev \
    libxml2-dev \
    libexpat1-dev \
    libbz2-dev \
    libgmp3-dev \
    libldap2-dev \
    unixodbc-dev \
    libpq-dev \
    libsqlite3-dev \
    libaspell-dev \
    libsnmp-dev \
    libpcre3-dev \
    libtidy-dev -yqq \
    && pecl install redis

# -- Uncomment to install yarn
# apt-get install -y --no-install-recommends nodejs && \
# curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
#     echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list && \
#     apt-get update && \
#     apt-get install -y --no-install-recommends yarn && \
#     npm install -g npm

# Install phpunit, the tool that we will use for testing
curl --location --output /usr/local/bin/phpunit https://phar.phpunit.de/phpunit.phar
chmod +x /usr/local/bin/phpunit

# Here you can install any other extension that you need
docker-php-ext-install pdo_mysql
docker-php-ext-install mbstring pdo_mysql curl json intl gd xml zip bz2 opcache
  pecl install xdebug
docker-php-ext-enable xdebug
  php composer.phar install
  npm install
