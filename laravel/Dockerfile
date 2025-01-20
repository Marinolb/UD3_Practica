FROM php:8.2-cli

# Establecer el directorio de trabajo
WORKDIR /app

# Actualizar paquetes e instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    git \
    libmariadb-dev \
    && docker-php-ext-install pdo_mysql

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Instalar Laravel Installer globalmente
RUN composer global require laravel/installer

# Añadir Laravel Installer al PATH
RUN echo "export PATH=/root/.composer/vendor/bin:$PATH" >> /root/.bashrc

# Exponer el puerto para Laravel
EXPOSE 8000

CMD ["bash"]
