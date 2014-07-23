<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentmeta extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('commentmeta');
		Schema::create('commentmeta', function(Blueprint $table)
		{
			$table->increments('id');//自增唯一ID
			$table->integer('comment_id')->index();//对应评论ID
			$table->integer('meta_key')->index();//键名
			$table->longText('meta_value');//键值
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('commentmeta');
	}

}