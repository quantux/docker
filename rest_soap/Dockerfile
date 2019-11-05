FROM php:7.2.6-apache
RUN docker-php-ext-install mysqli
RUN apt-get update -y \
  && apt-get install -y \
     libxml2-dev \
  && apt-get clean -y \
  && docker-php-ext-install soap 
