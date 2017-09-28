
<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Laravel REST Api Crud
This is a template Laravel based REST Api with a handful of example data models to show case a typical CRUD application. This api can be used as the base for front-end consumption from any Javascrip Frame using Ajax and directly from native mobile apps developed in iOS Swift.

## Quick overview on how it works
To get access to the api, you need to first register. Once registered, you can login using the registration details. On successful authentication, you will be given a api-token. This token needs to be embedded in the header of every subsequent call to the api. Without it, you are unauthorised. The routes/api.php is the entry point into the api and it is the front end for controlling authorised access.

## Installation
Clone or Download this repo. These instructions assume that you have installed Composer, Laravel 5.5, PHP7 and whatever prefered database system. I used Mysql for this.

Once downloaded, cd into repo directory and start installation:

````ruby
composer install 
````

Create a new database. I used mysql:
````ruby
mysql -u root -p
create database laravel_crud;
CREATE USER 'homestead'@'%' IDENTIFIED BY 'secret';
grant all privileges on *.* to 'homestead'@'%';
````

Copy .env.example to .env and change the database variable in .env:
````ruby
DB_DATABASE=laravel_crud
````

Generate the Artisan key:
````ruby
php artisan key:generate
````

Migrate the tables and seed the database:
````ruby
php artisan migrate:refresh --seed
````

and serve the REST API with artisan:
````ruby
php artisan serve
````

You should now be able to browse this app on http://localhost:8000. You will need to register first and then login to see the CRUD application.

## Rest API Example End-Points
The api have two sets of Example End-Points, Jobs and Users as well as registration, login and logout points. 

````ruby
http://localhost:8000/api/members
````

The Api have a pagination end-point with filter capability: Access pagination with:
````ruby
http://localhost:8000/api/members/paginate
````

or filtered across firstname, surname and email:
````ruby
http://localhost:8000/api/members/paginate?filter=Alan

