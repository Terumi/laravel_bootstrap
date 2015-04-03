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

}
