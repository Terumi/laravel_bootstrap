<?php

	namespace App\Repositories;

	use App\Page;
	use Illuminate\Support\Facades\App;

	class PageRepository {

		public function getAll() {
			return Page::all();
		}

		public function getPageTree() {
			$ancestors = $this->getTopLevelPages();
			foreach ($ancestors as $item) {
				$item->subPages();
			}
			return $ancestors;
		}

		public function findBySlug($slug) {
			$page = Page::where('slug', $slug)->first();
			if (!$page)
				App::abort(404, 'Page not found');

			return $page;
		}

		public function findSubPageByTree($path_array) {
			$page = $this->findBySlug($path_array[0]);
			if (count($path_array) > 1) {
				array_shift($path_array);

				return $this->findSubPageByTree($path_array);
			}
			return $page;
		}

		public function getTopLevelPages() {
			return Page::where('parent_id', 0)->get();
		}


	}