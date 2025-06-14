# Utiliza una imagen base oficial de PHP con Apache.
# '8.2' es una versión de PHP. Puedes cambiarla si tu código necesita otra (ej. php:8.1-apache).
FROM php:8.2-apache

# Establece el directorio de trabajo dentro del contenedor. Aquí es donde se copiarán tus archivos.
WORKDIR /var/www/html

# Copia los archivos de tu aplicación PHP desde tu repositorio al directorio de trabajo en el contenedor.
# Si tus archivos PHP (como index.php) están en la raíz de tu repositorio, usa:
COPY . .
# SI tus archivos PHP están en una SUB-CARPETA dentro de tu repositorio (ej. 'public/'), usa:
# COPY public/ .

# Instala las extensiones de PHP necesarias. 'pdo_pgsql' es vital para conectar con Neon.
RUN docker-php-ext-install pdo_pgsql && \
    docker-php-ext-enable pdo_pgsql

# Expone el puerto 80, que es el puerto predeterminado que Apache escuchará.
EXPOSE 80

# El comando para iniciar Apache ya está configurado en la imagen base 'php:*-apache'.
# No necesitas un comando CMD adicional a menos que tengas una configuración muy específica de Apache.
