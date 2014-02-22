<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerms extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('postmeta');
		Schema::create('terms', function(Blueprint $table)
		{
			$table->increments('id');//分类ID
			$table->string('name')->index();//分类名
			$table->string('slug')->unique();//缩略名
			$table->integer('term_group')->nullable()->default(0);//未知
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('terms');
	}

}