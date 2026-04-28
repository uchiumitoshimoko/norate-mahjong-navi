#!/bin/bash
set -e

# CakePHP tmp ディレクトリのパーミッション設定
for dir in \
    /var/www/html/app/tmp/cache/models \
    /var/www/html/app/tmp/cache/persistent \
    /var/www/html/app/tmp/cache/views \
    /var/www/html/app/tmp/logs \
    /var/www/html/app/tmp/sessions \
    /var/www/html/app/tmp/tests \
    /var/www/html/kanri/app/tmp/cache/models \
    /var/www/html/kanri/app/tmp/cache/persistent \
    /var/www/html/kanri/app/tmp/logs \
    /var/www/html/kanri/app/tmp/sessions; do
    mkdir -p "$dir"
    chmod 777 "$dir"
done

exec "$@"
