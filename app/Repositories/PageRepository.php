<?php

	namespace App\Repositories;

	use App\Page;
	use Illuminate\Support\Facades\App;

	class PageRepository {

		public function getAll() {
			return Page::all();
		}

		public function findBySlug($slug) {
			$page = Page::where('slug', $slug)->first();
			if (!$page)
				App::abort(404, 'Page not found');

			return $page;
		}

		public function findSubPageBySlug($parent_slug, $slug) {
			$parent = $this->findBySlug($parent_slug);
			$page = $parent->subPages->where('slug', $slug)->first();
			if (is_null($page))
				App::abort(404, 'Page not found');

			return $page;
		}
	}