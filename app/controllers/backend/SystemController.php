<?php namespace Backend;

use \View;
use \Input;
use \User;
use \Redirect;
use \Validator;

class SystemController extends BaseController {

    
    /**
     * 基础设置
     *
     * @return Response
     */
    public function getBasic()
    {
        return View::make('backend.pages.system-basic');
    }
}