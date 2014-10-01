<?php

Post::creating(function($post){
    $post->post_author = Auth::user()->id;
});

//允许用户删除
User::creating(function($user){
    $user->deleteable = 1;
});

//记录SQL
Event::listen('illuminate.query', function($sql, $param)
{
    Log::info($sql . ", with[" . join(',', $param) ."]");
});