FROM mcr.microsoft.com/devcontainers/php:7.4-bullseye

# Install php-mysql driver
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enabl apache modules
RUN a2enmod headers rewrite expires

# Remove unused port 8080 from apache ports.
RUN sed -i '/Listen 8080/d' /etc/apache2/ports.conf

RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
    echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list

# Install wp cli
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && \
    mv wp-cli.phar /usr/local/bin/wp

