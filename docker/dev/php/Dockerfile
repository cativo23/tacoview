FROM php:8.1-fpm

LABEL maintainer="Carlos Cativo"

ARG UID
ARG GID
ARG NODE_VERSION=16

ENV UID=${UID}
ENV GID=${GID}

WORKDIR /var/www/html

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update \
    && apt-get install -y gnupg gosu curl ca-certificates zip unzip git supervisor libcap2-bin  \
    libpng-dev libzip-dev python2 libicu-dev cron unixodbc-dev \
    && mkdir -p ~/.gnupg \
    && chmod 600 ~/.gnupg \
    && echo "disable-ipv6" >> ~/.gnupg/dirmngr.conf \
    && apt-get update

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql exif pcntl bcmath gd \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pcntl \
    && docker-php-ext-install zip \
    && docker-php-ext-install intl \
    && docker-php-source delete

RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

RUN pecl install -o -f xdebug \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable xdebug

RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    && curl -sL https://deb.nodesource.com/setup_$NODE_VERSION.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm \
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
    && echo "deb https://dl.yarnpkg.com/debian/ stable main" > /etc/apt/sources.list.d/yarn.list \
    && apt-get update \
    && apt-get install -y yarn \
    && apt-get install -y default-mysql-client \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN groupadd --force -g ${GID} tacos
RUN useradd -ms /bin/bash --no-user-group -g ${GID} -u ${UID} tacos

RUN chown -R tacos:tacos /var/www/html

RUN sed -i "s/user = www-data/user = tacos/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = tacos/g" /usr/local/etc/php-fpm.d/www.conf
RUN echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf

#Cron
COPY crontab /etc/cron.d/scheduler
RUN  chmod 0644 /etc/cron.d/scheduler
RUN  crontab /etc/cron.d/scheduler

COPY start-container /usr/local/bin/start-container
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY php.ini $PHP_INI_DIR/conf.d/99-tacos.ini
RUN chmod +x /usr/local/bin/start-container

EXPOSE 9000

ENTRYPOINT ["start-container"]
