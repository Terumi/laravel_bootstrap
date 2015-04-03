<?php

	Route::get('/', 'WelcomeController@index');

	Route::get('home', 'HomeController@index');

	Route::group(['middleware' => 'auth'], function(){
		Route::get('admin', function(){
			return view('admin.index');
		});
	});



	Route::get('upload_file', function(){});
	Route::post('upload_file', 'AssetController@upload_file');
	//Route::post('upload_file', ['middleware' => 'auth', 'uses' => 'AssetController@upload_file']);
	Route::resource('pages', 'PageController');

	/*Route::get('pages', ['middleware' => 'auth', 'uses' => 'PageController@index']);
	Route::get('pages/create', ['middleware' => 'auth', 'uses' => 'PageController@create']);
	Route::post('pages/store', ['middleware' => 'auth', 'uses' => 'PageController@store']);*/

	Route::controllers([
		'auth'     => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]);
