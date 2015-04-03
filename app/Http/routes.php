<?php

	Route::get('/', 'WelcomeController@index');

	Route::get('home', 'HomeController@index');

	Route::resource('pages', 'PageController');

	Route::controllers([
		'auth'     => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]);
