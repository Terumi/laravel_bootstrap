<?php namespace App;

use Illuminate\Database\Eloquent\Model;

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

	public function getParentPageNameAttribute() {
		$parent = Page::find($this->attributes['parent_page']);
		if (isset( $parent ))
			return $parent->name;

		return "None";
	}

	public function subPages() {
		return $this->hasMany('App\Page', 'parent_id');
	}
}
