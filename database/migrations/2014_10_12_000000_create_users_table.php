<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->string('avatar')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->integer('role')->default(1); //4 admin, 2 moderator, 1 user
            $table->string('password', 60);
            $table->rememberToken();
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
		Schema::drop('users');
	}

}
