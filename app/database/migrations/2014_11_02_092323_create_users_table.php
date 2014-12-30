<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

    public function up()
    {
        Schema::create('users', function (Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('remember_token', 100)->nullable();
            $table->string('name', 20);
            $table->string('password', 60);
        });
    }

    public function down()
    {
        Schema::drop('users');
    }
}
