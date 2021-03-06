<?php

	namespace App\Src;

	use App\Page;
	use App\Repositories\PageRepository;

	class PageMenu {

		private $repository;

		function __construct(PageRepository $repository) {
			$this->repository = $repository;
		}

		public function getMenu() {
			$ancestors = $this->repository->getTopLevelPages();

			return $this->dig($ancestors);
		}

		public function dig($ancestors) {
			$menu = [ ];
			foreach ($ancestors as $page) {
				$menu[$page->id] = [
					'slug'     => $page->slug,
					'title'    => $page->title,
					'children' => $this->dig($page->subPages)
				];
			}

			return empty( $menu ) ? null : $menu;
		}

		public function getHtml() {
			$menu = view('layouts.partials.menu-container')->with('content', $this->digHtml($this->repository->getTopLevelPages()));

			return $menu;
		}

		private function digHtml($ancestors, $sec = false) {
			$menu = '';

			foreach ($ancestors as $page) {
				if ($page->hasSubPages()) {
					$menu .= view('layouts.partials.sub-menu')->with('page', $page)->with('content', $this->digHtml($page->getSubPages(), true));
				} else {
					$menu .= view('layouts.partials.menu-item')->with('page', $page);
				}
			}

			return $menu;
		}
	}