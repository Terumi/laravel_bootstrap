<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('parent_id');
			$table->string('type')->default(0);
			$table->string('title');
			$table->string('menu_title');
			$table->string('slug');
			$table->text('body');
			$table->text('description');
			$table->integer('priority');
			$table->string('meta_content');
			$table->string('meta_title');
			$table->string('meta_description');
			$table->string('meta_canonical');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pages');
	}

}
