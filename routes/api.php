<?php

// -- Register, Login and Log end-points
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

// -- Token check for authentication
Route::group(['middleware' => 'auth:api'], function() {

	// -- Only available if authenticated
	
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
