FROM nginx:alpine

ADD ./docker/vhost.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /var/www

WORKDIR /var/www
