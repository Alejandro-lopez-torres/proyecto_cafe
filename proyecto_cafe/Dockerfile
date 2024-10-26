# Usa una imagen base de PHP con Apache
FROM php:7.4-apache

# Habilita las extensiones necesarias (por ejemplo, PDO)
RUN docker-php-ext-install pdo pdo_mysql

# Copia los archivos de tu proyecto al contenedor
COPY . /var/www/html/

# Establece los permisos necesarios
RUN chown -R www-data:www-data /var/www/html/

# Expone el puerto 80
EXPOSE 80
