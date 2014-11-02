<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCmtvotesTable extends Migration {

	public function up()
	{
		Schema::create('cmtvotes', function(Blueprint $table) {
			$table->increments('id');
			$table->boolean('upvote');
			$table->integer('user_id')->unsigned();
			$table->integer('cmt_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('cmtvotes');
	}
}