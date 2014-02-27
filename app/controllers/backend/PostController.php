<?php namespace Backend;

use \View;
use \User;
use \Auth;
use \Category;
use \Post;
use \Input;
use \Redirect;
use \Validator;
use \TermRelation;

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
        $posts = Auth::user()->posts()->paginate(15);
        
        return View::make('backend.pages.post-all')->withPosts($posts);
    }
        
    /**
     * 新文章
     *
     * @return object
     */
    public function getNew()
    {
        $categorys = Category::getTree();
        return View::make('backend.pages.post-new')->withCategorys($categorys);
    }

    /**
     * 创建文章
     *
     * @return object
     */
    public function postCreate()
    {
        $rules = array(
                  'title'    => 'required',
                  'content'  => 'required',
                  'category' => 'required|integer',
                 );

        $validator = Validator::make(Input::all(), $rules);

        //验证失败
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput(Input::all());
        }   

        $post = new Post;
        $post->post_title = Input::get('title');
        $post->post_content = Input::get('content');

        $category = Category::findOrFail(Input::get('category'));

        $termRelation =  new TermRelation;
        $termRelation->category_id = $category->id;

        $post->save();
        $post->termRelation()->save($termRelation);

        return Redirect::back()->withMessage('发布成功！', link_to('admin/post/list', '查看文章列表'));

    }

}
