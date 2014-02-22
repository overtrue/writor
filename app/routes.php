<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

// 登录与登出
Route::controller('admin/auth', '\\Backend\\AuthController');

// 需要登录的路由
Route::group(array('prefix' => '/admin', 'before' => 'auth'), function(){
    
    //backend
    Route::get('/', '\\Backend\\HomeController@index');
    Route::controller('post', '\\Backend\\PostController');
    Route::controller('category', '\\Backend\\CategoryController');

});
