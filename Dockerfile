# imagem base do php com apache

FROM php:8.2-apache 

# pasta padrão de trabalho dentro do container
WORKDIR /var/www/html/

# ativa modulo rewrite para formatar URL
RUN a2enmod rewrite

# ativa extensão do php para mysql atraves do PDO
RUN docker-php-ext-install pdo pdo_mysql mysqli

# copia os arquivos do projeto para dentro do container
COPY . /var/www/html/
