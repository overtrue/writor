<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;

// 一般错误
App::error(function(Exception $exception)
{
    Log::error($exception);
    
    return View::make('500');
});

// 404
App::missing(function($exception)
{
    Log::error($exception);

    return View::make('404');
});

// 服务器内部错误
App::fatal(function(Exception $exception)
{
    Log::error($exception);
    
    return View::make('500');
});

//模型未找到
App::error(function(ModelNotFoundException $exception)
{
    Log::error($exception);
    return View::make('404');
});