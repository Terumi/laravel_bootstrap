<?php

	namespace App\Src;

	use App\Page;
	use App\Repositories\PageRepository;

	class PageMenu {

		public $menuArray;
		private $repository;

		function __construct(PageRepository $repository) {
			$this->repository = $repository;
		}

		public function getMenu() {
			$ancestors       = $this->repository->getTopLevelPages();
			$this->menuArray = $this->dig($ancestors);

			return $this->menuArray;
		}

		public function dig($ancestors) {
			$menu = [ ];
			foreach ($ancestors as $page) {
				$menu[$page->id] = $this->dig($page->subPages);
			}

			return empty( $menu ) ? null : $menu;
		}

	}