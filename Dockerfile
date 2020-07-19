FROM registry.xing99.net/base-php:v.1.1 as test-appcms-api-php
RUN mkdir -p /var/www/html
COPY . /var/www/html
RUN chmod -R 777 /var/www/html/storage

FROM nginx:stable-alpine as test-appcms-api-nginx
RUN mkdir -p /var/www/html
COPY . /var/www/html 
RUN chmod -R 777 /var/www/html/storage

FROM registry.xing99.net/base-php:v.1.1 as rc-appcms-api-php
RUN mkdir -p /var/www/html
COPY . /var/www/html
RUN chmod -R 777 /var/www/html/storage

FROM nginx:stable-alpine as rc-appcms-api-nginx
RUN mkdir -p /var/www/html
COPY . /var/www/html 
RUN chmod -R 777 /var/www/html/storage

FROM registry.xing99.net/base-php:v.1.1 as stable-appcms-api-php
RUN mkdir -p /var/www/html
COPY . /var/www/html
RUN chmod -R 777 /var/www/html/storage

FROM nginx:stable-alpine as stable-appcms-api-nginx
RUN mkdir -p /var/www/html
COPY . /var/www/html 
RUN chmod -R 777 /var/www/html/storage
