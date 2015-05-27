<?php

	namespace App\Src;

	use App\Page;

	class PageMenu {

		private $html;

		public function getMenu() {

			$this->html = '<ul class="nav navbar-nav">';
				$pages = Page::where('parent_id', 0)->get();
				foreach ($pages as $page) {
					$this->dig($page, 0);
				}
			$this->html .= '</ul>';
			return $this->html;
		}

		public function dig($page, $level) {
			if($page->subPages->count()){
				$this->html .= "<li class='dropdown'>";
			} else {
				$this->html .= "<li>";
			}


			$level ++;

			if($page->subPages->count()){
				$this->html .= '<a href="#" class="dropdown-toggle">'. $page->menu_title . '</a>';
				$this->html .= '<ul class="dropdown-menu" role="menu">';
				foreach ($page->subPages as $sub_page) {
					$this->dig($sub_page, $level);
				}
				$this->html .= '</ul>';
			} else {
				$this->html .= '<a href="#">'. $page->menu_title . '</a>';
			}

			$this->html .= "</li>";
		}
	}