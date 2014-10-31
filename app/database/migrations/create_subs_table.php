<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubsTable extends Migration {

	public function up()
	{
		Schema::create('subs', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 20);
			$table->integer('owner_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('subs');
	}
}