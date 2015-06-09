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
	}