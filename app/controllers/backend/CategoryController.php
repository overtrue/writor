<?php namespace Backend;

use \DB;
use \Tree;
use \View;
use \Category;
use \Input;
use \Redirect;
use \Validator;
use \TermRelation;

class CategoryController extends BaseController {


    /**
     * 分类列表
     *
     * @return Response
     */
    public function getAll()
    {
        $categories = Category::getTree();

        return View::make('backend.pages.category-all')
                     ->withCategories($categories);
    }

    /**
     * 创建分类 
     *
     * @param string $value 
     *
     * @return Response
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
        if (Input::get('slug') && Category::whereSlug(Input::get('slug'))->count()) {
            return Redirect::back()->withMessage("分类别名 '" . Input::get('slug')."' 已经存在！")
                                   ->withColor('danger')
                                   ->withInput(Input::all());
        }

        // 创建分类
        $category              = new Category;
        $category->name        = Input::get('name');
        $category->slug        = str_replace(' ','', snake_case(Input::get('slug')));
        $category->parent      = Input::get('parent_id');
        $category->description = Input::get('description');

        $category->save();

        return Redirect::back()->withMessage("分类 '$category->name' 添加成功！"); 
    }

    /**
     * 编辑分类
     *
     * @param integer $id 
     *
     * @return Response
     */
    public function getEdit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::getTree();
        return View::make('backend.pages.category-edit')
                    ->withCategory($category)
                    ->withCategories($categories);
    }

    /**
     * 更新
     *
     * @param integer $id 
     *
     * @return Response
     */
    public function postUpdate($id)
    {
        $category = Category::findOrFail($id);
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
        if (Category::where('id', '!=', $id)->whereName(Input::get('name'))->count()) {
            return Redirect::back()->withMessage("分类 '" . Input::get('name')."' 与其它分类重复！")
                                   ->withColor('danger')
                                   ->withInput(Input::all());
        }
        //检测别名
        if (Category::where('id', '!=', $id)->whereSlug(Input::get('slug'))->count()) {
            return Redirect::back()->withMessage("分类别名 '" . Input::get('slug')."' 与其它分类重复！")
                                   ->withColor('danger')
                                   ->withInput(Input::all());
        }

        // 创建分类
        $category->name        = Input::get('name');
        $category->slug        = str_replace(' ','', snake_case(Input::get('slug')));
        $category->parent      = Input::get('parent_id');
        $category->description = Input::get('description');

        $category->save();

        return Redirect::back()->withMessage("更新成功！"); 
    }

    /**
     * 删除分类
     *
     * @param integer $id 
     *
     * @return Response
     */
    public function anyDelete($id)
    {
        if ($id == 1) {
            return Redirect::back('系统默认分类不允许删除！');
        }

        Category::findOrFail($id)->delete();
        TermRelation::where('category_id', $id)->update('category_id', 1);
        return Redirect::back()->withMessage("删除成功！");
    }
}