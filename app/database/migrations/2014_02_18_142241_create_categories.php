<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('categories');
		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id');//分类ID
			$table->string('name')->index();//分类名
			$table->string('slug')->unique();//缩略名
			$table->string('description')->nullable();//分类描述
			$table->integer('parent')->nullable()->default(0);//所属父分类方法ID
			$table->integer('count')->nullable()->default(0);//文章数统计
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('categories');
	}

}