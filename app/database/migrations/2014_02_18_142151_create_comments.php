<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('comments');
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');//自增唯一ID
			$table->integer('comment_post_id')->index();//对应文章ID
			$table->integer('comment_author');//评论者
			$table->string('comment_author_email');//评论者邮箱
			$table->string('comment_author_url', 200);//评论者网址
			$table->string('comment_author_ip')->nullable();//评论者IP
			$table->text('comment_content');//评论正文
			$table->enum('comment_approved', array('0','1','spam'))->nullable()->default(0);//评论是否被批准
			$table->string('comment_agent')->nullable();//评论者的USER AGENT
			$table->integer('comment_parent')->nullable()->default(0);//父评论ID
			$table->integer('user_id')->nullable()->default(0);//评论者用户ID（不一定存在）
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
		Schema::dropIfExists('comments');
	}

}