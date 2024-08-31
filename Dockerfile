FROM php:8.1-apache

#Instalar deoendencias necesarias para postgreSQL
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

#copiar contenido de toda la app en mi contenedor
COPY . /var/www/html/

#EXPONE EL PUERTO 80
EXPOSE 80