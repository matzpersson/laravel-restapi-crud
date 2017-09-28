
<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Laravel REST Api Crud
This is a plain, authenticated SPA Crud application with Laravel Rest Api on the back. Rest API can be consumed from this application or directly onto the API. Data on both these views are token authenticated. Styling is with Bootstrap

## Installation
Clone or Download this repo. These instructions assume that you have installed Composer, Laravel 5.5, PHP7, Node Package Manager and whatever prefered database system. I used Mysql for this.

Once downloaded, cd into repo directory and start installation:

````ruby
composer install 
````

Create a new database. I used mysql:
````ruby
mysql -u root -p
create database laravel_vue2_crud;
CREATE USER 'homestead'@'%' IDENTIFIED BY 'secret';
grant all privileges on *.* to 'homestead'@'%';
````

Copy .env.example to .env and change the database variable in .env:
````ruby
DB_DATABASE=laravel_vue2_crud
````

Generate the Artisan key:
````ruby
php artisan key:generate
````

Migrate the tables and seed the database:
````ruby
php artisan migrate:refresh --seed
````

Install Vue2 components listed in package.json:
````ruby
npm install
````

Use two tabs. Run NPM hot watch on one:
````ruby
npm run watch
````

and serve the application with artisan:
````ruby
php artisan serve
````

You should now be able to browse this app on http://localhost:8000. You will need to register first and then login to see the CRUD application.
