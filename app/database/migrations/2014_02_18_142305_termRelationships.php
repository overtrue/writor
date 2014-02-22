<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TermRelationships extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('postmeta');
		Schema::create('term_relationships', function(Blueprint $table)
		{
			$table->integer('object_id');//对应文章ID/链接ID
			$table->integer('term_taxonomy_id')->index();//对应分类方法ID
			$table->integer('term_order')->nullable()->default(0);//排序
			$table->primary(array('object_id', 'term_taxonomy_id'));
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