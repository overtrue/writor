<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermRelationships extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('term_relationships');
		Schema::create('term_relationships', function(Blueprint $table)
		{
			$table->increments('id');//ID
			$table->integer('object_id');//对应文章ID/链接ID
			$table->integer('category_id')->index();//对应分类ID
			$table->integer('category_order')->nullable()->default(0);//排序
			$table->unique(array('object_id', 'category_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('term_relationships');
	}

}