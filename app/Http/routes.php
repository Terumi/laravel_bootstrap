<?php

	use App\Page;

	// home page
	Route::get('/', function () {
		$page = Page::find(15);
		return view('pages.page')->with('page', $page);
	});

	// controllers
	Route::controllers([
		'auth'     => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]);

	// admin section
	Route::group([ 'middleware' => 'auth', 'prefix' => 'admin' ], function () {
		Route::get('/', function () {
			return view('admin.index');
		});
		Route::resource('pages', 'PageController', [ 'except' => [ 'show' ] ]);
		Route::get('upload_file', function () { });
		Route::post('upload_file', 'AssetController@upload_file');
	});

	// other pages
	Route::get('{slug}', 'PageController@show')->where('slug', '.+');

