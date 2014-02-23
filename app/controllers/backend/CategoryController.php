<?php namespace Backend;

use \DB;
use \Tree;
use \View;
use \Term;
use \Input;
use \Redirect;
use \Validator;
use \TermTaxonomy;

class CategoryController extends BaseController {


    /**
     * 分类列表
     *
     * @return object
     */
    public function getAll()
    {
        $categorys = Term::getTree(TermTaxonomy::TYPE_CATEGORY);

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
        if (Term::whereName(Input::get('name'))->count()) {
            return Redirect::back()->withMessage("分类 '" . Input::get('name')."' 已经存在！")
                                   ->withColor('danger')
                                   ->withInput(Input::all());
        }
        //检测别名
        if (Term::whereSlug(Input::get('slug'))->count()) {
            return Redirect::back()->withMessage("分类别名 '" . Input::get('slug')."' 已经存在！")
                                   ->withColor('danger')
                                   ->withInput(Input::all());
        }

        // 创建分类
        $category = Term::create(Input::only(array('name', 'slug')));
        $category->slug = str_replace(' ','', snake_case($category->slug));

        //创建分类其它信息
        DB::transaction(function() use ($category) {
            $category->save();
            $termTaxonomy              = new TermTaxonomy;
            $termTaxonomy->term_id     = $category->id;
            $termTaxonomy->taxonomy    = TermTaxonomy::TYPE_CATEGORY;
            $termTaxonomy->description = Input::get('description');
            $termTaxonomy->parent      = Input::get('parent_id');
            $termTaxonomy->save();
            if (!$termTaxonomy->id) {
                $category->rollback();
            }
        });

        return Redirect::back()->withMessage("分类 '$category->name' 添加成功！"); 
    }
}