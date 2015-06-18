<?php

	use App\Page;
	use Illuminate\Support\Facades\Event;

	Event::listen('illuminate.query', function($query)
	{
		//var_dump($query);
	});

	//todo: put it somewhere nice
	//todo: update this on page update;

	Page::created(function($page)
	{
		$page->path = $page->URI;
		$page->save();
	});

	// home page
	Route::get('/', function () {
		return view('pages.home');
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

