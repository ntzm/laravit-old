<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('posts', function(Blueprint $table) {
			$table->foreign('sub_id')->references('id')->on('subs')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('subs', function(Blueprint $table) {
			$table->foreign('owner_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('comments', function(Blueprint $table) {
			$table->foreign('post_id')->references('id')->on('posts')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('comments', function(Blueprint $table) {
			$table->foreign('parentcmt_id')->references('id')->on('comments')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('comments', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('postvotes', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('postvotes', function(Blueprint $table) {
			$table->foreign('post_id')->references('id')->on('posts')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('cmtvotes', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('cmtvotes', function(Blueprint $table) {
			$table->foreign('cmt_id')->references('id')->on('comments')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('subscriptions', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('subscriptions', function(Blueprint $table) {
			$table->foreign('sub_id')->references('id')->on('subs')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_sub_id_foreign');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_user_id_foreign');
		});
		Schema::table('subs', function(Blueprint $table) {
			$table->dropForeign('subs_owner_id_foreign');
		});
		Schema::table('comments', function(Blueprint $table) {
			$table->dropForeign('comments_post_id_foreign');
		});
		Schema::table('comments', function(Blueprint $table) {
			$table->dropForeign('comments_parentcmt_id_foreign');
		});
		Schema::table('comments', function(Blueprint $table) {
			$table->dropForeign('comments_user_id_foreign');
		});
		Schema::table('postvotes', function(Blueprint $table) {
			$table->dropForeign('postvotes_user_id_foreign');
		});
		Schema::table('postvotes', function(Blueprint $table) {
			$table->dropForeign('postvotes_post_id_foreign');
		});
		Schema::table('cmtvotes', function(Blueprint $table) {
			$table->dropForeign('cmtvotes_user_id_foreign');
		});
		Schema::table('cmtvotes', function(Blueprint $table) {
			$table->dropForeign('cmtvotes_cmt_id_foreign');
		});
		Schema::table('subscriptions', function(Blueprint $table) {
			$table->dropForeign('subscriptions_user_id_foreign');
		});
		Schema::table('subscriptions', function(Blueprint $table) {
			$table->dropForeign('subscriptions_sub_id_foreign');
		});
	}
}
