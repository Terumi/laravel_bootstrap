<?php namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

	/**
	 * Register bindings in the container.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Using class based composers...
		View::composer('pages.nav', 'App\Http\ViewComposers\NavComposer');

		// Using Closure based composers...
		View::composer('dashboard', function($view)
		{

		});
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}