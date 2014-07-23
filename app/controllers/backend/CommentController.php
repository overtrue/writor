<?php namespace Backend;

use \View;
use \Input;
use \Comment;
use \Redirect;
use \Validator;

class CommentController extends BaseController {

	/**
	 * 所有评论
	 *
	 * @return Response
	 */
	public function getAll()
	{
		$comments = Comment::paginate(15);
		return View::make('backend.pages.comment-all')->withComments($comments);
	}

	/**
	 * 回复评论
	 *
	 * @return Response
	 */
	public function postReply()
	{
		//
	}

	/**
	 * 删除评论
	 *
	 * @param  integer $id
	 * 
	 * @return Response
	 */
	public function getDelete($id)
	{
		return Comment::findOrFail($id)->delete();
	}

}