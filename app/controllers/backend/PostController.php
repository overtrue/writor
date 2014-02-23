<?php namespace Backend;

use \View;
use \Term;
use \TermTaxonomy;
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
        $categorys = Term::getTree(TermTaxonomy::TYPE_CATEGORY);
        return View::make('backend.pages.post-new')->withCategorys($categorys);
    }

}
