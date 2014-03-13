<?php namespace Backend;

use \DB;
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

    protected $rules = array(
                  'title'    => 'required',
                  'content'  => 'required',
                  'category' => 'required|integer',
                 );

    /**
     * 所有文章
     *
     * @return Response
     */
    public function getAll()
    {
        $posts = Auth::user()->posts()->paginate(15);

        return View::make('backend.pages.post-all')->withPosts($posts);
    }
        
    /**
     * 新文章
     *
     * @return Response
     */
    public function getNew()
    {
        $categories = Category::getTree();
        return View::make('backend.pages.post-new')->withCategories($categories);
    }

    /**
     * 创建文章
     *
     * @return Response
     */
    public function postCreate()
    {
        $validator = Validator::make(Input::all(), $this->rules);

        //验证失败
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput(Input::all());
        }   

        $post = new Post;
        $post->post_title = Input::get('title');
        $post->post_content = Input::get('content');

        $post->save();
        
        $post->setCategories(Input::get('category', array()));

        return Redirect::back()->withMessage('发布成功！', link_to('admin/post/list', '查看文章列表'));

    }

    /**
     * 编辑文章
     *
     * @param integer $id 
     *
     * @return Response
     */
    public function getEdit($id)
    {
        $post = Post::with('termRelation')->findOrFail($id);
        $categories = Category::getTree();

        return View::make('backend.pages.post-edit')->withPost($post)->withCategories($categories);
    }

    /**
     * 更新文章
     *
     * @param integer $id 
     *
     * @return Response
     */
    public function postUpdate($id)
    {
        $post = Post::findOrFail($id);
        $validator = Validator::make(Input::all(), $this->rules);

        //验证失败
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput(Input::all());
        } 

        $post->post_title = Input::get('title');
        $post->post_content = Input::get('content');
        $post->save();

        $post->setCategories(Input::get('category', array()));

        return Redirect::back()->withMessage('更新成功！');
    }

    /**
     * 删除
     *
     * @param integer $id 
     *
     * @return Response
     */
    public function anyDelete($id)
    {
        Post::findOrFail($id)->delete();
        
        return Redirect::back()->withMessage("删除成功！");
    }

}
