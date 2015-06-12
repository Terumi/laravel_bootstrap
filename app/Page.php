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
		'parent_id',
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
		//$page = Page::where('parent_id', $this->attributes['id'])->first();
		//return !is_null($page);
		return true;
	}

	public function parent() {
		return $this->belongsTo('App\Page', 'parent_id');
	}

	public function getPathAttribute() {
		if ($this->attributes['parent_id'] == 0)
			return $this->attributes['slug'];

		return $this->parent->path . '/' . $this->attributes['slug'];

	}

}
