FROM php:7.3


ENV SWOOLE_HTTP_PORT ${SWOOLE_HTTP_PORT:-00}
ENV SWOOLE_HTTP_HOST ${SWOOLE_HTTP_HOST:-"0.0.0.0"}

USER root

ADD ./ /var/www

CMD ["php","artisan","swoole:http","start"]