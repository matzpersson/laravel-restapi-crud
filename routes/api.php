<?php

use Illuminate\Http\Request;
use App\User;
use App\Status;
use App\Job;
use App\LookupStatus;

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth:api'], function() {

	// -- Users
	Route::get('users', 'UserController@index');
	Route::get('users/paginate', 'UserController@paginate');
	Route::get('users/{user}', 'UserController@show');
	Route::post('users', 'UserController@store');
	Route::put('users/{id}', 'UserController@update');
	Route::delete('users/{id}', 'UserController@delete');

	// -- Jobs
	Route::get('jobs', 'JobController@index');
	Route::get('jobs/paginate', 'JobController@paginate');
	Route::get('jobs/{id}', 'JobController@show');
	Route::put('jobs/{id}', 'JobController@update');
	Route::post('jobs', 'JobController@store');
	Route::delete('jobs/{id}', 'JobController@delete');

	// -- Lookups
	Route::get('lookups/statuses', 'LookupStatusController@index');

});
