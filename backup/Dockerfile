FROM wyveo/nginx-php-fpm:latest
WORKDIR /usr/share/nginx/

RUN rm -rf /usr/share/ngix/html
COPY . /usr/share/nginx

RUN ln -s public html

RUN apt-get update

# 1. development packages
RUN apt-get install -y \
    git \
    zip \
    curl \
    sudo \
    unzip \
    libicu-dev \
    libbz2-dev \
    libpng-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libreadline-dev \
    libfreetype6-dev \
    g++

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#RUN chmod -R 777 ./script.sh

#RUN ["chmod", "+x", "./script.sh"]
#ENTRYPOINT ["script.sh"]
#CMD ["run"]
#EXPOSE 9000
