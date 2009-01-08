<?php
class category_controller extends controller
{	
	/**
	 * 数据列表
	 */
	 
	function index()
	{
		$category = sf::getModel("category");
		$addWhere = $addSql = '';
		//取得带翻页的数据集
		view::set("pager",$category->getPager($addWhere ,$addSql ,20));
		view::apply("inc_left","admin/left");
		view::apply("inc_right","admin/category/index");
		view::display("admin/page");
	}
	
	/**
	 * 数据编辑
	 */
	function edit()
	{
		$category = sf::getModel("category",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"));
		if(input::getInput("post.subject"))
		{
			input::getInput("post.subject") && $category->setSubject(input::getInput("post.subject"));
			$category->setParentId(input::getInput("post.parent_id") ? input::getInput("post.parent_id") : 0);
			input::getInput("post.orders") && $category->setOrders(input::getInput("post.orders"));
			input::getInput("post.cover") && $category->setCover(input::getInput("post.cover"));
			$category->setUpdatedAt(date("Y-m-d H:i:s"));
			$category->save();
			$this->page_debug(lang::get("Has been saved!"),site_url("admin/category_controller/index"));
		}
		view::set("category",$category);
		view::set("pid",input::getInput("get.pid") ? input::getInput("get.pid") : 0);
		view::set("parent_data",$category->selectAll('','',0));
		view::apply("inc_left","admin/left");
		view::apply("inc_right","admin/category/edit");
		view::display("admin/page");
	}
	
	/**
	 * 删除数据
	 */
	function delete()
	{
		sf::getModel("category",input::getInput("get.id"))->remove();
		$this->page_debug(lang::get("Has been deleted!"),site_url("admin/category_controller/index"));
	}
}
?>