<?php namespace Backend;

use \View;
use \Input;
use \Validator;
use \Redirect;

/**
* 文章控制器
*/
class PostController extends BaseController {

    /**
     * 所有文章
     *
     * @return object
     */
    public function getAll()
    {
        return View::make('backend.pages.post-all');
    }
        
    /**
     * 新文章
     *
     * @return object
     */
    public function getNew()
    {
        return View::make('backend.pages.post-new');
    }

    /**
     * 分类列表
     *
     * @return object
     */
    public function getCategory()
    {
        return View::make('backend.pages.post-category');
    }

    /**
     * 创建分类 
     *
     * @param string $value 
     *
     * @return object
     */
    public function postCreateCategory()
    {
        $rules = array(
                  'title'     => 'required',
                  'alias'     => 'regex:/^[a-z0-9_-]$/',
                  'parent_id' => 'integer',
                 );
        $validator = Validator::make(Input::all(), $rule);
        if ($validator->fails()) {
            return Redirect::back()->with($validator)->withInput();
        }
    }

}
