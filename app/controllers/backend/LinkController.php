<?php namespace Backend;

use \View;
use \Input;
use \Link;
use \Redirect;
use \Validator;

class LinkController extends BaseController {

	/**
	 * 所有链接
	 *
	 * @return Response
	 */
	public function getAll()
	{
		$links = Link::paginate(15);
		return View::make('backend.pages.Link-all')->withLinks($links);
	}

	/**
	 * 添加链接
	 *
	 * @return Response
	 */
	public function getNew()
	{
		return View::make('backend.pages.link-new');
	}

	/**
	 * 编辑链接
	 *
	 * @return Response
	 */
	public function getEdit($id)
	{
		return View::make('backend.pages.link-edit');
	}

	/**
	 * 删除链接
	 *
	 * @param  integer $id
	 * 
	 * @return Response
	 */
	public function getDelete($id)
	{
		return Link::findOrFail($id)->delete();
	}

}