<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsermeta extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('usermeta');
		Schema::create('usermeta', function(Blueprint $table)
		{
			$table->increments('id');//自增唯一ID
		    $table->integer('user_id')->index();//对应用户ID
		    $table->string('meta_key')->index();//键名
		    $table->text('meta_value');//键值
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('usermeta');
	}

}