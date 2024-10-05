#!/bin/bash

# Cek versi PHP saat ini (dua digit pertama)
phpVersion=$(php -r 'echo trim(preg_replace("/^(\d+\.\d+).*/", "$1", PHP_VERSION));')
echo "PHP Version: $phpVersion"
phpProject="8.3"

# Jika versi PHP tidak sama dengan 7.4, unlink versi saat ini dan link ke 7.4
if [ "$phpVersion" != "$phpProject" ]; then
    echo "Unlinking php@$phpVersion"
    brew unlink php@$phpVersion || (echo "Failed to unlink php@$phpVersion"; exit 1)
    echo "Linking php@$phpProject"
    brew link php@$phpProject || (echo "Failed to link php@$phpProject"; exit 1)
else
    echo "PHP version is already $phpProject"
fi
php artisan serve