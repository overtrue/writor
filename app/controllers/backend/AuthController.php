<?php namespace Backend;

use \URL;
use \View;
use \Hash;
use \Auth;
use \Lang;
use \Input;
use \Response;
use \Redirect;
use \Password;

/**
 * 登录与登出
 *
 * 说明：登录为ajax请求，所以使用Response::json返回值
 */
class AuthController extends BaseController {

    /**
     * 登录
     *
     * @return Response
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
     * @return Response
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
     * @return Response
     */
    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/admin/auth/login')
            ->with('message', '你已经成功注销当前登录.');
    }

    /**
     * Display the password reminder view.
     *
     * @return Response
     */
    public function getRemind()
    {
        return View::make('backend.pages.remind');
    }

    /**
     * Handle a POST request to remind a user of their password.
     *
     * @return Response
     */
    public function postRemind()
    {
        $credentials = array(
                        'user_email' =>  Input::get('email'),
                       );
        switch ($response = Password::remind($credentials))
        {
            case Password::INVALID_USER:
                return Redirect::back()->with('error', Lang::get($response));

            case Password::REMINDER_SENT:
                return Redirect::back()->with('status', Lang::get($response));
        }
    }

    /**
     * Display the password reset view for the given token.
     *
     * @param  string  $token
     * @return Response
     */
    public function getReset($token = null)
    {
        if (is_null($token)) App::abort(404);

        return View::make('backend.pages.reset')->with('token', $token);
    }

    /**
     * Handle a POST request to reset a user's password.
     *
     * @return Response
     */
    public function postReset()
    {
        $credentials = Input::only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = Password::reset($credentials, function($user, $password)
        {
            $user->password = Hash::make($password);

            $user->save();
        });

        switch ($response)
        {
            case Password::INVALID_PASSWORD:
            case Password::INVALID_TOKEN:
            case Password::INVALID_USER:
                return Redirect::back()->with('error', Lang::get($response));

            case Password::PASSWORD_RESET:
                return Redirect::to('/');
        }
    }
}