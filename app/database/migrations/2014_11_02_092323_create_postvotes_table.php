<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostvotesTable extends Migration {

    public function up()
    {
        Schema::create('postvotes', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('type', 4);
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();
        });
    }

    public function down()
    {
        Schema::drop('postvotes');
    }
}
