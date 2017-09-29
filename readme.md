
<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Laravel REST Api Crud
This is a template Laravel based REST Api with a handful of example data models included to show case a typical CRUD application. This api can be used as the base for front-end consumption from any Javascrip Frame using Ajax and directly from native mobile apps developed in iOS Swift.

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

Migrate the tables and seed the database. This will fill the tables with <a target="_new" href="https://github.com/fzaninotto/Faker"?>Faker</a> data:
````ruby
php artisan migrate:refresh --seed
````

and serve the REST API with artisan:
````ruby
php artisan serve
````

You should now be able to browse this app on http://localhost:8000. You will need to register first and then login to see the CRUD application.

## Rest API Example End-Points
The api have two sets of Example End-Points, Jobs and Users as well as registration, login and logout points. You need to register first. I used curl to play around with this:

So registration:

````ruby
$ curl -X POST http://localhost:8000/api/register \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"name": "Jim Beam", "email": "jim@inabottle.com", "password": "somesecret", "password_confirmation": "somesecret"}'
````

All the above details are required. The two passwords are compared and a bunch of checks done on validity of email and passwords and returns

````ruby
$ curl -X POST http://localhost:8000/api/register \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"name": "Jim Beam", "email": "jim@inabottle.com", "password": "somesecret", "password_confirmation": "somesecret"}'
````
... which should respond with:

````ruby
{"user": 
 {
  "name":"Jim Beam",
  "email":"jim@inabottle.com",
  "updated_at":"2017-09-29 00:26:02",
  "created_at":"2017-09-29 00:26:02",
  "id":106,
  "api_token":"0944eee1038c7c318524bf8c5db381d7"
  }
 }
````
As the token is returned, we are essentially authenticated and all we have to do is include the api_token in the header but we'll do a login as well.

Using the login end-point:

````ruby
$ curl -X POST localhost:8000/api/login \
  -H "Accept: application/json" \
  -H "Content-type: application/json" \
  -d '{"email": "jim@inabottle.com", "password": "somesecret" }'
 ````

... and it returns the same thing:

````ruby
{"user": 
 {
  "name":"Jim Beam",
  "email":"jim@inabottle.com",
  "updated_at":"2017-09-29 00:26:02",
  "created_at":"2017-09-29 00:26:02",
  "id":106,
  "api_token":"0944eee1038c7c318524bf8c5db381d7"
  }
 }
````

Now add the api token to any subsequent call. This one gets a full jobs list using the GET verb:
````ruby
curl -X GET http://localhost:8000/api/jobs \
  -H "Accept: application/json" \
  -H "Content-type: application/json" \
  -H "Authorization: Bearer 0944eee1038c7c318524bf8c5db381d7" 
````

This adds another job to the list:

````ruby
curl -X  POST http://localhost:8000/api/jobs \
  -H "Accept: application/json" \
  -H "Content-type: application/json" \
  -H "Authorization: Bearer 0944eee1038c7c318524bf8c5db381d7" \
  -d '{"name": "Lorem", "description": "Esse dignissimos ipsam" , "status_id": 1, "progress": 2, "assignedto_id": 2}'
````

... and this will filter jobs and return records filtered by dignissimos in name or description:

````ruby
curl -X  GET http://localhost:8000/api/jobs?filter=dignissimos \
  -H "Accept: application/json" \
  -H "Content-type: application/json" \
  -H "Authorization: Bearer 0944eee1038c7c318524bf8c5db381d7" 
````

