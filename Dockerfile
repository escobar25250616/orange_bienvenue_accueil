# Utilise une image officielle de PHP avec Apache
FROM php:8.2-apache

# Active les modules nécessaires si besoin (ex: mysqli, pdo, etc.)
# RUN docker-php-ext-install mysqli

# Copie tous les fichiers dans le dossier web Apache
COPY . /var/www/html/

# Ouvre le port 80 pour le web
EXPOSE 80
