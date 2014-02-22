<?php namespace Backend;

use \View;

class HomeController extends \Controller {

    /**
     * 后台首页
     *
     * @return object
     */
    public function index()
    {
        return View::make('backend.pages.home');
    }
}