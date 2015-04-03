<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePageRequest;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller {

	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index() {
		$pages = Page::all();

		return view('admin.pages.index')->with('pages', $pages);
	}

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create() {
		return view('admin.pages.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * @return Response
	 */
	public function store(StorePageRequest $request) {
		Page::create($request->all());

		return Redirect::to('pages');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string $slug
	 *
	 * @return Response
	 */
	public function show($slug) {
		$page = Page::where('slug', $slug)->first();

		return view('pages.page')->with('page', $page);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  string $slug
	 *
	 * @return Response
	 */
	public function edit($slug) {
		$page = Page::where('slug', $slug)->first();

		return view('admin.pages.edit')->with('page', $page);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function update($id) {

		$page = Page::findOrFail($id);
		$page->update(Input::all());

		return Redirect::to('pages');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
