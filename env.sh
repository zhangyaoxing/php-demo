#!/bin/bash
sudo yum install -y php php-devel php-pear php-json php-zip make nginx unzip openssl-devel
sudo pecl install mongodb
echo "extension=mongodb.so" | sudo tee /etc/php.d/50-mongodb.ini

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e5325b19b381bfd88ce90a5ddb7823406b2a38cff6bb704b0acc289a09c8128d4a8ce2bbafcd1fcbdc38666422fe2806') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
./composer.phar require mongodb/mongodb

sudo mkdir -p /usr/share/nginx/html/php-demo
sudo cp *.php /usr/share/nginx/html/php-demo/
sudo cp -R vendor /usr/share/nginx/html/php-demo/

sudo service nginx restart
sudo service php-fpm restart