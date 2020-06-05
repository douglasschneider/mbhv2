FROM ubuntu:18.04

RUN apt update -qq && \
    apt -y upgrade && \
    DEBIAN_FRONTEND=noninteractive apt -y --no-install-recommends --no-install-suggests install \
        tzdata mariadb-server && \
    ln -sf /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime
    
COPY ./50-server.cnf /etc/mysql/mariadb.conf.d/50-server.cnf

COPY ./museu_latest.sql /tmp/museu.sql

RUN /etc/init.d/mysql start && sleep 5 && \
    mysql -u root -e 'create database museu;' && \
    mysql -u root museu < /tmp/museu.sql && \
    mysql -u root -e "grant INSERT,SELECT,DELETE on museu.* to 'museu'@'%' identified by 'museu';"

CMD ["mysqld_safe"]