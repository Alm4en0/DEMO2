FROM php: 8.1-apache

#Instalar deoendencias necesarias para postgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-install pdo pdo_pgsql pdo_pgsql

#copiar contenido de toda la app en mi contenedor
COPY ./var/www/html/

#EXPONE EL PUERTO 80
EXPOSE 80