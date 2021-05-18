FROM php:7.3-apache
RUN apt update && apt install -y mariadb-server 
RUN docker-php-ext-install mysqli 
RUN docker-php-ext-enable mysqli
RUN docker-php-ext-install mysqli pdo pdo_mysql
