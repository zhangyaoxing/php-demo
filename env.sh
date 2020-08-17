#!/bin/bash
sudo setenforce 0
sudo yum install -y php php-devel php-pear php-json php-zip make nginx unzip openssl-devel
sudo pecl install mongodb
echo "extension=mongodb.so" | sudo tee /etc/php.d/50-mongodb.ini

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
sudo php composer-setup.php --filename=composer --install-dir=/usr/bin
php -r "unlink('composer-setup.php');"

composer require mongodb/mongodb
cd ..
sudo rm -rf /usr/share/nginx/html/php-demo
sudo cp -R php-demo /usr/share/nginx/html/

sudo service nginx restart
sudo service php-fpm restart