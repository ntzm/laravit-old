<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration {

	public function up()
	{
		Schema::create('comments', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('post_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('content', 3000);
		});
	}

	public function down()
	{
		Schema::drop('comments');
	}
}