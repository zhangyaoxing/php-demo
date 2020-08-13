#!/bin/bash
sudo yum install -y php php-devel php-pear php-json php-zip make nginx unzip openssl-devel
sudo pecl install mongodb
echo "extension=mongodb.so" | sudo tee -a /etc/php.d/50-mongodb.ini

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e5325b19b381bfd88ce90a5ddb7823406b2a38cff6bb704b0acc289a09c8128d4a8ce2bbafcd1fcbdc38666422fe2806') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
./composer.phar require mongodb/mongodb

cd ..
sudo mv php-demo /usr/share/nginx/html/

sudo service nginx start
sudo service php-fpm start