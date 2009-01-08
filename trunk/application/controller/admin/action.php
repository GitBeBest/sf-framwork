<?php
class action extends controller
{	
	/**
	 * 数据列表
	 */
	function index()
	{
		$actions = sf::getModel("actions");
		$addWhere = $addSql = '';
		view::set("pager",$actions->getPager($addWhere ,$addSql ,20));
		view::apply("inc_body","action/index");
		view::display("page");
	}
	
	/**
	 * 数据编辑
	 */
	function edit()
	{
		$actions = sf::getModel("actions",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"));
		if(input::getInput("post.controller_name"))
		{
			$actions->setController(input::getInput("post.controller"));
			$actions->setControllerName(input::getInput("post.controller_name"));
			$actions->setMethod(input::getInput("post.method"));
			$actions->setUserGroupIds(input::getInput("post.actions"));
			$actions->save();
			$this->page_debug(lang::get("Has been saved!"),site_url("action/index"));
		}
		$data["action"] = $actions;
		$data['pager']  = sf::getModel("user_group")->selectAll("","ORDER BY id ASC",0);
		view::set($data);
		view::apply("inc_body","action/edit");
		view::display("page");
	}
	
	/**
	 * 删除数据
	 */
	function delete()
	{
		if(input::getInput("post.select_id")){
			$ids = implode("','",input::getInput("post.select_id"));
		}else $ids = input::getInput("get.id"); 
		
		sf::getModel("actions")->remove($ids);
		$this->page_debug(lang::get("Has been deleted!"),site_url("action/index"));
	}
}
?>