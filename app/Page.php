<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Page extends Model {

	protected $fillable = [
		'title',
		'menu_title',
		'slug',
		'body',
		'description',
		'parent_page',
		'priority',
		'meta_content',
		'meta_title',
		'meta_description',
		'meta_canonical'
	];

	public function getPageTypeAttribute() {
		return Config::get('page_types')[$this->attributes['type']];
	}

	public function getParentPageNameAttribute() {
		$parent = Page::find($this->attributes['parent_id']);
		if (isset( $parent ))
			return $parent->name;

		return "None";
	}

	public function subPages() {
		return $this->hasMany('App\Page', 'parent_id');
	}

	public function hasSubPages() {
		return $this->subPages->count() ? true : false;
	}

	public function parent() {
		return $this->belongsTo('Page', 'parent_id');
	}
}
