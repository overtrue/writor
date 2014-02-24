<?php namespace Backend;

use \View;
use \Auth;
use \Term;
use \Post;
use \Input;
use \Redirect;
use \Validator;
use \TermRelation;
use \TermTaxonomy;

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
        $posts = Post::with('categorys')->where('post_author', Auth::user()->id)->paginate(15);
var_dump($posts->toArray());
        return View::make('backend.pages.post-all')->withPosts($posts);
    }
        
    /**
     * 新文章
     *
     * @return object
     */
    public function getNew()
    {
        $categorys = Term::getTree(TermTaxonomy::TYPE_CATEGORY);
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

        $termTaxonomy = TermTaxonomy::where('term_id', Input::get('category'))->first();
        if (empty($termTaxonomy)) {
            return Redirect::back()->withMessage('分类不存在！');
        }
        $termRelation =  new TermRelation;
        $termRelation->term_taxonomy_id = $termTaxonomy->id;

        $post->save();
        $post->termRelation()->save($termRelation);

        return Redirect::back()->withMessage('发布成功！', link_to('admin/post/list', '查看文章列表'));

    }

}
