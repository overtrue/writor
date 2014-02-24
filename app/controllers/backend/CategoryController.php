<?php namespace Backend;

use \DB;
use \Tree;
use \View;
use \Category;
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
        $categorys = Category::getTree();

        return View::make('backend.pages.category-all')
                     ->withCategorys($categorys);
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
                  'slug'      => 'regex:/^[a-zA-Z 0-9_-]+$/',
                  'parent_id' => 'integer',
                 );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        // 检测分类名
        if (Category::whereName(Input::get('name'))->count()) {
            return Redirect::back()->withMessage("分类 '" . Input::get('name')."' 已经存在！")
                                   ->withColor('danger')
                                   ->withInput(Input::all());
        }
        //检测别名
        if (Category::whereSlug(Input::get('slug'))->count()) {
            return Redirect::back()->withMessage("分类别名 '" . Input::get('slug')."' 已经存在！")
                                   ->withColor('danger')
                                   ->withInput(Input::all());
        }

        // 创建分类
        $category              = new Category;
        $category->name        = Input::get('name');
        $category->slug        = str_replace(' ','', snake_case(Input::get('name')));
        $category->parent      = Input::get('parent_id');
        $category->description = Input::get('description');

        $category->save();

        return Redirect::back()->withMessage("分类 '$category->name' 添加成功！"); 
    }
}