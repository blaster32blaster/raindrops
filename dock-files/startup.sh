#!/bin/bash

echo "running composer install"
cd /var/www/html &&
composer install

apachectl -D FOREGROUND
