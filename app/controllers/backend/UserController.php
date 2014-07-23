<?php namespace Backend;

use \View;
use \Input;
use \User;
use \Redirect;
use \Validator;

class UserController extends BaseController {

	/**
	 * 所有用户
	 *
	 * @return Response
	 */
	public function getAll()
	{
		$users = User::orderBy('id', 'DESC')->paginate(5);

		return View::make('backend.pages.user-all')->withUsers($users);
	}

	/**
	 * 添加用户
	 *
	 * @return Response
	 */
	public function getNew()
	{
		return View::make('backend.pages.user-new');
	}

	/**
	 * 编辑用户
	 *
	 * @return Response
	 */
	public function getEdit($id)
	{
		return View::make('backend.pages.user-edit');
	}

	/**
	 * 删除用户
	 *
	 * @param  integer $id
	 * 
	 * @return Response
	 */
	public function getDelete($id)
	{
		return User::findOrFail($id)->delete();
	}

}