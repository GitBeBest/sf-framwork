<?php
class category extends controller
{	
	public $type = 'default';
	
	function load()
	{
		$this->type = input::getInput("get.type") ? input::getInput("get.type") : 'default';
		view::set("type",$this->type);
	}
	
	/**
	 * 数据列表
	 */
	function index()
	{
		$category = sf::getModel("categorys",0,$this->type);
		$addWhere = $addSql = '';
		//取得带翻页的数据集
		view::set("pager",$category->getPager($addWhere ,$addSql ,30));
		view::apply("inc_body","admin/category/index");
		view::display("admin/page");
	}
	
	/**
	 * 数据编辑
	 */
	function edit()
	{
		$category = sf::getModel("categorys",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"),$this->type);
		if(input::getInput("post.subject"))
		{
			input::getInput("post.subject") && $category->setSubject(input::getInput("post.subject"));
			$category->setParentId(input::getInput("post.parent_id") ? input::getInput("post.parent_id") : 0);
			$category->setIsHome(input::getInput("post.is_home") ? 1 : 0);
			input::getInput("post.orders") && $category->setOrders(input::getInput("post.orders"));
			input::getInput("post.cover") && $category->setCover(input::getInput("post.cover"));
			input::getInput("post.type") && $category->setType(input::getInput("post.type"));
			$category->setUpdatedAt(date("Y-m-d H:i:s"));
			$category->save();
			$this->page_debug(lang::get("Has been saved!"),getFromUrl(site_url("home/left"),site_url("admin/category/index/type/".$this->type)));
		}
		view::set("category",$category);
		view::set("pid",input::getInput("get.pid") ? input::getInput("get.pid") : 0);
		view::set("parent_data",$category->selectAll('','',0));
		view::apply("inc_body","admin/category/edit");
		view::display("admin/page");
	}
	
	/**
	 * 删除数据
	 */
	function delete()
	{
		sf::getModel("categorys",input::getInput("get.id"),$this->type)->remove();
		$this->page_debug(lang::get("Has been deleted!"),getFromUrl());
	}
}
?>