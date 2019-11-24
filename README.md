для запуска vagrant использовать следующие настройки:
---
ip: "192.168.10.10"
memory: 2048
cpus: 1
provider: virtualbox

authorize: ~/.ssh/id_rsa.pub

keys:
    - ~/.ssh/id_rsa

folders:
    - map: /home/kondratskivd/Laravel/sites
      to: /home/vagrant/Code

sites:
    - map: redwerk.test
      to: /home/vagrant/Code/RedWerk/public

databases:
    - redwerk

features:
    - mariadb: false
    - ohmyzsh: false
    - webdriver: false
    
------------------------
конфигурация .env

APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:/tCGX4yig+vi391RxbZ5ea4ZnnHEmjmQzRD28rCm1s8=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=redwerk
DB_USERNAME=homestead
DB_PASSWORD=secret

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"


----------------------
для установки проэкта
1. перейти в папку проэкта и запустить команду создания таблиц баз данных - php artisan migtare
2. сгенерировать тестовые данные в базу, командой - php artisan bd:seed
