Passaggi post clone:
-php artisan optimize:clear
-composer i
-cp .env.example .env
-php artisan key:gen
-php artisan migrate
-npm i

Per DB:
-winpty mysql -u root -p
-password: root
-create database varg_database;
-show databases varg_database;
-exit
-modifica .env (psw e name)
-php artisan migrate
-php artisan migrate:rollback
-php artisan migrate
-php artisan db:seed

Per avvio:
-php artisan serve
-npm run dev
