<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('users');
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');//自增唯一ID
		    $table->string('user_login', 60)->index();//登录名
		    $table->string('user_pass', 64);//密码
		    $table->string('user_nicename', 50)->nullable()->index();//昵称
		    $table->string('user_email', 100);//Email
		    $table->string('user_url', 100)->nullable();//网址
		    $table->string('user_activation_key', 60)->nullable();//激活码
		    $table->integer('user_status')->nullable()->default(0);//用户状态
		    $table->integer('deleteable')->nullable()->default(1);//是否允许删除
		    $table->string('display_name', 60)->nullable();//显示名称
		    $table->string('remember_token', 60)->nullable();
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
		Schema::dropIfExists('users');
	}

}