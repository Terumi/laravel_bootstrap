<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Page extends Model {

	protected $fillable = [
		'title',
		'menu_title',
		'slug',
		'body',
		'description',
		'parent_id',
		'priority',
		'meta_content',
		'meta_title',
		'meta_description',
		'meta_canonical',
		'path',
		'type'
	];


	public function getParentPageNameAttribute() {
		$parent = Page::find($this->attributes['parent_id']);
		if (isset( $parent ))
			return $parent->name;

		return "None";
	}

	public function getPageTypeAttribute() {
		$type = Config::get('page_types')[$this->attributes['type']];

		return strtolower($type);
	}


	public function subPages() {
		return $this->hasMany('App\Page', 'parent_id');
	}

	public function getSubPages($parent = false) {
		$parent   = $parent ?: $this;
		$subPages = $parent->subPages()->get();
		foreach ($subPages as $subPage) {
			$subPage->setRelation('subPages', $this->getSubPages($subPage));
		}

		return $subPages;
	}

	public function hasSubPages() {
		$page = $this->subPages->first();

		return !is_null($page);
	}

	public function parent() {
		return $this->belongsTo('App\Page', 'parent_id');
	}

	public function getURIAttribute() {
		if ($this->attributes['parent_id'] == 0)
			return $this->attributes['slug'];

		return $this->parent->URI . '/' . $this->attributes['slug'];
	}

	public function getTitlePathAttribute() {
		if ($this->attributes['parent_id'] == 0)
			return $this->attributes['title'];

		return $this->parent->title_path . '/' . $this->attributes['title'];
	}
}
