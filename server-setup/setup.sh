# https://www.digitalocean.com/community/tutorials/initial-server-setup-with-ubuntu-20-04
# https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-on-ubuntu-20-04-ru
# under root user
# ubuntu -> sudo su
apt update
apt install -y software-properties-common
add-apt-repository -y ppa:ondrej/php
apt install -y git nginx mysql-server zip unzip php8.0-fpm php8.0-mysql php8.0-dom php8.0-curl php8.0-zip

git clone https://github.com/pekhota/php-filemanager-example.git /var/www/site
chown -R www-data:www-data /var/www

echo "alias php8='sudo -u www-data php'" > ~/.bashrc && source ~/.bashrc

cd /var/www/site && php8 composer.phar install
cd /var/www/site && php8 composer.phar run post-root-package-install
cd /var/www/site && php8 composer.phar run post-create-project-cmd

rm /etc/nginx/sites-enabled/default

# !!! copy site.conf to /etc/nginx/sites-enabled/site

nginx -t
service nginx reload

## Mysql
# https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-20-04-ru
mysql_secure_installation


git clone https://github.com/pekhota/php_telegram_demo_bot_1.git site2