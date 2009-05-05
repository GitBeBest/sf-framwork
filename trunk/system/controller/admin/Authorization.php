<?php
class Authorization extends controller
{	
	/**
	 * 数据列表
	 */
	function index()
	{
		$Authorizations = sf::getModel("Authorizations");
		
		$addWhere = $addSql = '';
		$orderfield = input::getInput("get.orderfield") ? input::getInput("get.orderfield") : 'id';
		$ordermode = input::getInput("get.ordermode") ? input::getInput("get.ordermode") : 'DESC';
		$addSql .= 'ORDER BY '.$orderfield.' '.$ordermode.' ';
		input::getInput("mix.search") && $addWhere .= "`".input::getInput("mix.field")."` like '%".input::getInput("mix.search")."%' ";
		$from_vars = array('search','field');
		view::set("pager",$Authorizations->getPager($addWhere ,$addSql ,20,'','',$from_vars));
		view::apply("inc_body","admin/authorization/index");
		view::display("admin/page");
	}
	
	/**
	 * 数据编辑
	 */
	function edit()
	{
		$Authorizations = sf::getModel("Authorizations",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"));
		if(input::getInput("post.controller_name"))
		{
			$Authorizations->setController(input::getInput("post.controller"));
			$Authorizations->setControllerName(input::getInput("post.controller_name"));
			$Authorizations->setMethod(input::getInput("post.method"));
			$Authorizations->setUserGroupIds(input::getInput("post.actions"));
			$Authorizations->save();
			$this->page_debug(lang::get("Has been saved!"),getFromUrl(site_url("home/left"),site_url("Authorization/index")));
		}
		$data["authorization"] = $Authorizations;
		$data['pager']  = sf::getModel("user_groups")->selectAll("","ORDER BY id ASC",0);
		view::set($data);
		view::apply("inc_body","admin/authorization/edit");
		view::display("admin/page");
	}
	
	/**
	 * 删除数据
	 */
	function delete()
	{
		if(input::getInput("post.select_id")){
			$ids = implode("','",input::getInput("post.select_id"));
		}else $ids = input::getInput("get.id"); 
		
		sf::getModel("Authorizations")->remove($ids);
		$this->page_debug(lang::get("Has been deleted!"),getFromUrl());
	}
}
?>