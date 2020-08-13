#!/bin/bash
yum install -y php php-devel php-pear php-json php-zip make nginx unzip openssl-devel
pecl install mongodb
echo "extension=mongodb.so" >> /etc/php.d/50-mongodb.ini

mkdir -p /usr/share/nginx/html/php-demo
cp demo.php /usr/share/nginx/html/php-demo
cd /usr/share/nginx/html/php-demo
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e5325b19b381bfd88ce90a5ddb7823406b2a38cff6bb704b0acc289a09c8128d4a8ce2bbafcd1fcbdc38666422fe2806') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
./composer.phar require mongodb/mongodb

service nginx start
service php-fpm start