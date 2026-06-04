#!/bin/bash

echo "Start Deployment Script......"

# تحديد المتغيرات والاعدادات اللازمة
SERVER_IP="13.60.183.83"
SERVER_USER="deployer"
GITHUB_REPO="https://github.com/fayezrajab2004/Laravel-Cloud-Assignment.git"
PROJECT_PATH="/home/deployer/Laravel-Cloud-Assignment"
DATE=$(date +%Y%m%d%H%M%S)

# الربط مع السيرفر من خلال SSH (ملاحظة: السطر متصل مع EOF)
ssh -i server_key.pem -o StrictHostKeyChecking=no $SERVER_USER@$SERVER_IP << EOF

    echo "Connected to the server successfully."

    # تنزيل docker
    sudo apt-get update
    sudo apt-get install -y docker.io docker-compose

    # تجهيز المجلدات المطلوبة للنشر
    mkdir -p $PROJECT_PATH/releases
    mkdir -p $PROJECT_PATH/shared
    mkdir -p $PROJECT_PATH/backups

    # رفع مشروع اللاارفيل
    echo "Cloning the project from GitHub..."
    mkdir -p $PROJECT_PATH/releases/$DATE
    git clone $GITHUB_REPO $PROJECT_PATH/releases/$DATE

    cd $PROJECT_PATH/releases/$DATE

    # n. نظام releases لضمان Zero-Downtime (ربط الملفات المشتركة)
    ln -s $PROJECT_PATH/shared/.env $PROJECT_PATH/releases/$DATE/.env
    ln -s $PROJECT_PATH/shared/storage $PROJECT_PATH/releases/$DATE/storage

    # إنشاء كونتينر جديد وتنزيل البيئة (Apache, MySQL, PHP) وإعداد Queue
    echo "Building and running Docker containers..."
    docker compose up -d --build

    # إعطاء الصلاحيات للمجلدات وتثبيت Sentry و Horizon
    echo "Setting permissions and installing packages..."
    sudo chmod -R 777 storage
    sudo chmod -R 777 bootstrap/cache
    docker compose exec -T app composer require sentry/sentry-laravel
    docker compose exec -T app composer require laravel/horizon
    docker compose exec -T app php artisan horizon:install

    # تنفيذ من يلزم من أوامر artisan performance
    echo "Running artisan performance commands..."
    docker compose exec -T app composer install --optimize-autoloader
    docker compose exec -T app php artisan optimize:clear
    docker compose exec -T app php artisan migrate --force

    # تكملة Zero-Downtime (تغيير المؤشر للإصدار الجديد)
    echo "Switching to the new release..."
    ln -sfn $PROJECT_PATH/releases/$DATE $PROJECT_PATH/current

    # إعداد linux cron job خاصة بـ backup للداتابيز في مجلد مستقل
    echo "Setting up cron job for database backup..."
    echo "0 0 * * * docker exec db_container mysqldump -u root -p password database_name > $PROJECT_PATH/backups/db_backup.sql" > cron_backup.txt
    crontab cron_backup.txt

    echo "Deployment finished completely!"

EOF
