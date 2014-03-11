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
        $categorys = Category::getTree();
        return View::make('backend.pages.post-new')->withCategorys($categorys);
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

        $category = Category::findOrFail(Input::get('category'));

        $termRelation =  new TermRelation;
        $termRelation->category_id = $category->id;

        $post->save();
        $post->termRelation()->save($termRelation);

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
        $categorys = Category::getTree();

        return View::make('backend.pages.post-edit')->withPost($post)->withCategorys($categorys);
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

        //因为打算改成文章有多个分类，所以这样的操作是合理的
        $post->termRelation()->delete();
        $categories = Input::get('category');
        is_array($categories) || $categories = array($categories);
        $termRelMultiData = array_map(function($categoryId) use ($post){
            return array(
                    'object_id'   => $post->id,
                    'category_id' => $categoryId
                   );
        }, $categories);
        //一次性写入多条
        //请参考：http://www.golaravel.com/docs/4.1/queries/#inserts
        DB::table('term_relationships')->insert($termRelMultiData);
        $post->save();

        return Redirect::back()->withMessage('更新成功！');
    }

}
