FROM ubuntu:18.04

RUN apt update -qq && \
    apt -y upgrade && \
    DEBIAN_FRONTEND=noninteractive apt -y --no-install-recommends --no-install-suggests install \
        tzdata nginx php php-mysql php-fpm && \
    ln -sf /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime

COPY ./nginx.conf /etc/nginx/

COPY ./docker-entrypoint.sh /
RUN chmod +x /docker-entrypoint.sh
CMD ["/docker-entrypoint.sh"]