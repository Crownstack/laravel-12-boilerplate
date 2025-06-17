# Pre-requisite software

Make sure to have the following software installed before installing Laravel:

## PHP 8.4 and all the required PHP packages

```
sudo apt install curl zip unzip php8.4 php8.4-mysql php8.4-cli php8.4-mbstring php8.4-zip php8.4-xml php8.4-curl php8.4-dom php8.4-gd
```

## Installing Nginx-specific PHP packages
```
sudo apt install php8.4-fpm
```


## Installing Apache-specific PHP packages
```
sudo apt install libapache2-mod-php8.4
```

## Composer 2

```
curl -sS https://getcomposer.org/installer -o composer-setup.php
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
rm composer-setup.php
```

## Nginx Web Server

```
sudo apt install nginx
```


## Apache Web Server

```
sudo apt install apache2
```


# Setting up virtual hosts for Nginx / Apache

## Setup Virtual Host on Nginx

Sample virtual host configuration file:
```
server {
    listen 80;
    root /project-root-folder/public;
    index index.php;
    server_name api.example.com;

    #Control the max body size client can upload in a single HTTP request
    client_max_body_size 999m;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.4-fpm.sock;
    }
}
```


## Setup Virtual Host on Apache

Sample virtual host configuration file:
```
<VirtualHost *:80>
    ServerName www.example.com
    ServerAlias api.example.com

    ServerAdmin webmaster@localhost
    DocumentRoot /project-root-folder

    <Directory "/project-root-folder">
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```


# Installing the Laravel Project

## Install dependencies

```
composer install
```

## Give folder permissions to directories

```
sudo chmod -R 777 storage
sudo chmod -R 777 bootstrap/cache
```

## Create .env file and set it up

```
cp .env.example .env
```

## Generate application key

```
php artisan key:generate
```


## Run database migrations
```
php artisan migrate
```


## Run database seeder
```
php artisan db:seed
```


## [Apache Specific] If serving through Apache and can't set the document root to "/public" directory

### Copy or move /public/index.php to the project root folder
```
cp public/index.php ./
```

### Remove one `../` from index.php file

Remove `../` from line numbers 9, 14 and 18

### Create symbolic link of the "/media" folder
Create symbolic link of the "/media" folder & favicon.png file present inside "/public" folder to the root folder of the project:

```
ln -s public/media ./
ln -s public/favicon.png ./
ln -s public/robots.txt ./
```


# Other useful commands

## Caching the application configuration for faster load for production environment

To give application a speed boost, you should cache all of your configuration files into a single file. This will combine all of the configuration options for your application into a single file which can be quickly loaded by the framework.

### Generating config's cache

```
php artisan config:cache
```

You should typically run the above command as part of your production deployment process. The command should not be run during local development as configuration options will frequently need to be changed during the course of your application's development.

[Reference reading](https://laravel.com/docs/12.x/configuration#configuration-caching)

### Deleting (purging) config's cache

```
php artisan config:clear
```