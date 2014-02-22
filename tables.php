<?php
Schema::table('wt_commentmeta', function(Blueprint $table)
{ 
    $table->integer('id');//自增唯一ID
    $table->integer('comment_id');//对应评论ID
    $table->integer('meta_key');//键名
    $table->longText('meta_value');//键值
});

Schema::table('wt_comments', function(Blueprint $table)
{ 
    $table->integer('id');//自增唯一ID
    $table->integer('comment_post_id');//对应文章ID
    $table->integer('comment_author');//评论者
    $table->string('comment_author_email');//评论者邮箱
    $table->string('comment_author_url', 200);//评论者网址
    $table->string('comment_author_ip')->nullable();//评论者IP
    $table->text('comment_content');//评论正文
    $table->integer('comment_karma')->nullable()->default(0);//未知
    $table->enum('comment_approved', array('0','1','spam'))->nullable()->default(0);//评论是否被批准
    $table->string('comment_agent')->nullable();//评论者的USER AGENT
    $table->integer('comment_parent')->nullable()->default(0);//父评论ID
    $table->integer('user_id')->nullable()->default(0);//评论者用户ID（不一定存在）
    $table->timestamps();
});

Schema::table('wt_links', function(Blueprint $table)
{ 
    $table->integer('id');//自增唯一ID
    $table->string('link_url');//链接URL
    $table->string('link_name');//链接标题
    $table->string('link_image')->nullable();//链接图片
    $table->string('link_target')->nullable()->default('_blank');//链接打开方式
    $table->string('link_description')->nullable();//链接描述
    $table->timestamps();
});

Schema::table('wt_options', function(Blueprint $table)
{ 
    $table->integer('id');//自增唯一ID
    $table->string('option_name', 64);//键名
    $table->text('option_value');//键值
});

Schema::table('wt_postmeta', function(Blueprint $table)
{ 
    $table->integer('id');//自增唯一ID
    $table->integer('post_id');//对应文章ID
    $table->string('meta_key');//键名
    $table->text('meta_value');//键值
});

Schema::table('wt_posts', function(Blueprint $table)
{ 
    $table->integer('id');//自增唯一ID
    $table->integer('post_author');//对应作者ID
    $table->longText('post_content')->nullable();//正文
    $table->string('post_title');//标题
    $table->string('post_status', 20)->nullable()->default('publish');//文章状态（publish/auto-draft/inherit等）
    $table->string('comment_status', 20)->nullable()->default('open');//评论状态（open/closed）
    $table->string('post_password', 20)->nullable();//文章密码
    $table->string('post_type', 20)->nullable()->default('post');//文章类型（post/page等）
    $table->integer('comment_count')->nullable()->default(0);//评论总数
    $table->timestamps();
    $table->softDeletes();
});


Schema::table('wt_terms', function(Blueprint $table)
{ 
    $table->integer('id');//分类ID
    $table->string('name');//分类名
    $table->string('slug');//缩略名
    $table->integer('term_group')->nullable()->default(0);//未知
});

Schema::table('wt_term_relationships', function(Blueprint $table)
{ 
    $table->integer('object_id');//对应文章ID/链接ID
    $table->integer('term_taxonomy_id');//对应分类方法ID
    $table->integer('term_order')->nullable()->default(0);//排序
});

Schema::table('wt_term_taxonomy', function(Blueprint $table)
{ 
    $table->integer('id');//分类方法ID
    $table->integer('term_id');//
    $table->string('taxonomy', 32)->nullable()->default('category');//分类方法(category/post_tag)
    $table->string('description')->nullable();//分类描述
    $table->integer('parent')->nullable()->default(0);//所属父分类方法ID
    $table->integer('count')->nullable()->default(0);//文章数统计
});

Schema::table('wt_usermeta', function(Blueprint $table)
{ 
    $table->integer('id');//自增唯一ID
    $table->integer('user_id');//对应用户ID
    $table->string('meta_key');//键名
    $table->text('meta_value');//键值
});

Schema::table('wt_users', function(Blueprint $table)
{ 
    $table->integer('id');//自增唯一ID
    $table->string('user_login', 60);//登录名
    $table->string('user_pass', 64);//密码
    $table->string('user_nicename', 50)->nullable();//昵称
    $table->string('user_email', 100);//Email
    $table->string('user_url', 100)->nullable();//网址
    $table->string('user_activation_key', 60)->nullable();//激活码
    $table->integer('user_status')->nullable()->default('');//用户状态
    $table->integer('display_name')->nullable();//显示名称
});