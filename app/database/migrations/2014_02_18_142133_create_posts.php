<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('posts');
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');//自增唯一ID
		    $table->integer('post_author');//对应作者ID
		    $table->longText('post_content')->nullable();//正文
		    $table->string('post_title')->index();//标题
		    $table->string('post_status', 20)->nullable()->default('publish');//文章状态（publish/auto-draft/inherit等）
		    $table->string('comment_status', 20)->nullable()->default('open');//评论状态（open/closed）
		    $table->string('post_password', 20)->nullable();//文章密码
		    $table->string('post_type', 20)->nullable()->default('post');//文章类型（post/page等）
		    $table->integer('comment_count')->nullable()->default(0);//评论总数
		    $table->integer('view_count')->nullable()->default(0);//浏览总数
		    $table->timestamps();
		    $table->softDeletes();
		    $table->index(array('post_status', 'post_type'));
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('posts');
	}

}