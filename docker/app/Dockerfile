FROM ubuntu:18.04

LABEL author="Yazeed Obaid"
LABEL version=0.1.0
LABEL description="Docker image for a PHP Laravel application"

ENV DEBIAN_FRONTEND=noninteractive

RUN set -x && apt-get update && apt-get install -y gnupg

RUN echo "deb http://ppa.launchpad.net/ondrej/php/ubuntu bionic main" > /etc/apt/sources.list.d/ppa_ondrej_php.list \
    && echo "deb http://ppa.launchpad.net/nginx/development/ubuntu bionic main" > /etc/apt/sources.list.d/ppa_nginx_mainline.list \
    && apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys E5267A6C \
    && apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys C300EE8C \
    && apt-get update \
    && apt-get install -y curl zip unzip git supervisor sqlite3 \
    && apt-get install -y nginx php7.3-fpm php7.3-cli \
    php7.3-pgsql php7.3-sqlite3 php7.3-gd \
    php7.3-curl php7.3-memcached \
    php7.3-imap php7.3-mysql php7.3-mbstring \
    php7.3-xml php7.3-zip php7.3-bcmath php7.3-soap \
    php7.3-intl php7.3-readline php7.3-xdebug \
    php7.3-msgpack php7.3-igbinary php7.3-ldap \
    php-redis \
    # installing composer
    && php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    # clean ups and ensuring that php-fpm has the run/php directory to put its file on when running
    && mkdir /run/php \
    && apt-get remove -y --purge software-properties-common \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
    # configuring nginx, pushing nginx to background when run
    && echo "daemon off;" >> /etc/nginx/nginx.conf \
    # simlinking log files of nginx to standard output and standard error to enable Docker to read and display for us
    && ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log

# ports to expose for other containers
EXPOSE 80

# working directory is the project root
WORKDIR /var/www/html

# copying nginx's site configuration for the application
COPY default /etc/nginx/sites-available/default

# copying modified php-fpm file to php-fpm in container, mainly for simlinking php-fpm logs
COPY php-fpm.conf /etc/php/7.3/fpm/php-fpm.conf

# copying supervisor configuration file to container
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# lunching supervisor to run nginx, php-fpm and Laravel queue worker if any
CMD ["/usr/bin/supervisord"]