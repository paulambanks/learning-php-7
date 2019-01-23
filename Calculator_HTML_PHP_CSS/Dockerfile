FROM php:7.0.23-apache
RUN pecl install xdebug && \
    echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini
COPY xdebug-custom.ini /usr/local/etc/php/conf.d
