<?php namespace App\Http\ViewComposers;

use App\Page;
use App\Src\PageMenu;
use Illuminate\Contracts\View\View;

class NavComposer {

	public function __construct()
	{
		// Dependencies automatically resolved by service container...
	}

	public function compose(View $view)
	{
		$pages = Page::all();
		$pm = new PageMenu();
		$view->with('menu', $pm->getMenu())->with('pages', $pages);
	}

}