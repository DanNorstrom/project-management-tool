FROM php:7.4-apache

# enable mysqli
RUN docker-php-ext-install mysqli

# Copy app source code
#COPY . .
COPY . .

# Exports
EXPOSE 80

# go to ip:8080/main.html