<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TermTaxonomy extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('postmeta');
		Schema::create('term_taxonomy', function(Blueprint $table)
		{
			$table->increments('id');//分类方法ID
			$table->integer('term_id');//
			$table->string('taxonomy', 32)->nullable()->default('category')->index();//分类方法(category/post_tag)
			$table->string('description')->nullable();//分类描述
			$table->integer('parent')->nullable()->default(0);//所属父分类方法ID
			$table->integer('count')->nullable()->default(0);//文章数统计
			$table->unique(array('term_id', 'taxonomy'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('term_taxonomy');
	}

}