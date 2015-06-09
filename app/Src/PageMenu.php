<?php

	namespace App\Src;

	use App\Page;
	use App\Repositories\PageRepository;

	class PageMenu {

		public $menuArray;
		private $repository;

		function __construct(PageRepository $repository) {
			$this->repository = $repository;
			$this->menuArray  = $this->getMenu();
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

			$menu = '<div class="dropdown"><a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary" data-target="#" href="/page.html">Dropdown <span class="caret"></span></a>';
			$menu .= '<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">';
			$menu .= $this->digHtml($this->repository->getTopLevelPages());
			$menu .= '</ul>';

			return $menu;

		}

		private function digHtml($ancestors) {
			$menu = '';
			foreach ($ancestors as $page) {
				if ($page->hasSubPages()) {
					$menu .= $this->renderSubMenu($page);
				} else {
					$menu .= $this->renderMenuItem($page);
				}
			}

			return $menu;
		}

		private function renderSubMenu($page) {
			$menu = '<li class="dropdown-submenu">' .
			        '<a tabindex="-1" href="#">' .
			        $page->title .
			        '</a>';
			$menu .= '<ul class="dropdown-menu">';
			$menu .= $this->digHtml($page->subPages);
			$menu .= "</ul></li>";

			return $menu;
		}

		private function renderMenuItem($page) {
			return '<li><a href="#">' . $page->title . '</a></li>';
		}

	}