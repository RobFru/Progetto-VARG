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
-php artisan db:seed (per rilanciare i seed: php artisan migrate:refresh --seed)
-php artisan storage:link (se img non compaiono perchè storage non è linkato)

Per avvio:
-php artisan serve
-npm run dev
-php artisan queue:work

Per aggiungere un revisore
php artisan app:make-user-revisor <emailUtente>

# da aggiungere a .env

QUEUE_CONNECTION=database
