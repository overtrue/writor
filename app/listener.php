<?php

Post::creating(function($post){
    $post->post_author = Auth::user()->id;
});


//记录SQL
Event::listen('illuminate.query', function($sql, $param)
{
    Log::info($sql . ", with[" . join(',', $param) ."]");
}); 