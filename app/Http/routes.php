<?php

	//Route::get('/', 'WelcomeController@index');
	use App\Page;

	Route::get('/', function(){
		$page = Page::first();
		return view('pages.page')->with('page', $page);

	});

	Route::get('home', 'HomeController@index');

	Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
		Route::get('/', function(){
			return view('admin.index');
		});

		Route::resource('pages', 'PageController', ['except' => ['show']]);
		Route::get('upload_file', function(){});
		Route::post('upload_file', 'AssetController@upload_file');
	});

	Route::get('pages/{slug}', 'PageController@show');

	Route::controllers([
		'auth'     => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]);
