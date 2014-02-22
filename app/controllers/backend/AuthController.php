<?php namespace Backend;

use \URL;
use \View;
use \Auth;
use \Input;
use \Response;
use \Redirect;

/**
 * 登录与登出
 *
 * 说明：登录为ajax请求，所以使用Response::json返回值
 */
class AuthController extends BaseController {

    /**
     * 登录
     *
     * @return object
     */
    public function getLogin()
    {
        if (Auth::check()) {
            return Redirect::to('admin');
        }

        return View::make('backend.pages.login');
    }

    /**
     * 执行登录操作
     *
     * @return object
     */
    public function postLogin()
    {
        //这里的key必须叫password,如果你的数据库里密码字段不叫password,
        //请修改app/models/Use.php 中的 getAuthPassword 方法，返回您的字段名即可
        $user = array(
                'user_login' => Input::get('username'),
                'password'   => Input::get('password'),
                );

        if (Auth::viaRemember() || Auth::attempt($user, Input::get('remember'))) {
            return Response::json(array(
                                  'login_status' => 'success',
                                  'redirect_url' => URL::previous(),
                                 ));
        }

        return Response::json(array(
                              'login_status' => 'invalid',
                             ));
    }

    /**
     * 注销登录 
     *
     * @return object
     */
    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/admin/auth/login')
            ->with('message', '你已经成功注销当前登录.');
    }
}