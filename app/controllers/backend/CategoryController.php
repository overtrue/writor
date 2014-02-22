<?php namespace Backend;

use \View;
use \Input;
use \Redirect;
use \Validator;

class CategoryController extends BaseController {


    /**
     * 分类列表
     *
     * @return object
     */
    public function getAll()
    {
        return View::make('backend.pages.category-all');
    }

    /**
     * 创建分类 
     *
     * @param string $value 
     *
     * @return object
     */
    public function postCreate()
    {
        $rules = array(
                  'name'      => 'required',
                  'slug'      => 'regex:/^[a-z0-9_-]$/',
                  'parent_id' => 'integer',
                 );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $category = Term::fill();
        var_dump($category);
    }
}