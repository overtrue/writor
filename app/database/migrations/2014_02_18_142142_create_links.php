<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('links');
		Schema::create('links', function(Blueprint $table)
		{
			$table->increments('id');//自增唯一ID
			$table->string('link_url');//链接URL
			$table->string('link_name');//链接标题
			$table->string('link_image')->nullable();//链接图片
			$table->string('link_target')->nullable()->default('_blank');//链接打开方式
			$table->string('link_description')->nullable();//链接描述
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
		Schema::dropIfExists('links');
	}

}