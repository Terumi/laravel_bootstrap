<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\StorePageRequest;
use App\Page;
use App\Repositories\PageRepository;
use App\Src\PageMenu;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller {

	private $repository;

	function __construct(PageRepository $repository) {
		$this->repository = $repository;
	}

	public function index() {

		$pm   = new PageMenu($this->repository);
		$menu = $pm->getMenu();
		dd($menu);

		$pages = $this->repository->getAll();

		return view('admin.pages.index')->with('pages', $pages);
	}

	public function create() {
		$pages = Page::lists('title', 'id');

		return view('admin.pages.create')->with('pages', $pages);
	}

	public function store(StorePageRequest $request) {
		Page::create($request->all());

		return Redirect::to('admin/pages');
	}

	public function show($slug) {
		$page = Page::where('slug', $slug)->first();

		return view('pages.page')->with('page', $page);
	}

	public function showChild($parent_slug, $slug) {
		$page = $this->repository->findSubPageBySlug($parent_slug, $slug);

		return view('pages.page')->with('page', $page);
	}

	public function edit($slug) {
		$page  = Page::where('slug', $slug)->first();
		$pages = Page::lists('title', 'id');
		$pages = [ 0 => 'none' ] + $pages;

		return view('admin.pages.edit')->with('page', $page)->with('pages', $pages);
	}

	public function update($id) {

		$page = Page::findOrFail($id);
		$page->update(Input::all());

		return Redirect::to('admin/pages');
	}

	public function destroy($id) {
		$page = Page::findOrFail($id);
		$page->delete();

		return Redirect::to('admin/pages');
	}

}
