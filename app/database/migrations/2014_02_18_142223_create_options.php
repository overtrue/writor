<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('options');
		Schema::create('options', function(Blueprint $table)
		{
			$table->increments('id');//自增唯一ID
			$table->string('option_name', 64)->index();//键名
			$table->text('option_value');//键值
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('options');
	}

}