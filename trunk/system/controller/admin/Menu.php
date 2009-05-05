<?php
class menu extends controller
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
		$menu = sf::getModel("menus",0,$this->type);
		$addWhere = $addSql = '';
		//取得带翻页的数据集
		view::set("pager",$menu->getPager($addWhere ,$addSql ,30));
		view::apply("inc_body","admin/menu/index");
		view::display("admin/page");
	}
	
	/**
	 * 数据编辑
	 */
	function edit()
	{
		$menu = sf::getModel("menus",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"),$this->type);
		if(input::getInput("post.subject"))
		{
			input::getInput("post.subject") && $menu->setSubject(input::getInput("post.subject"));
			$menu->setParentId(input::getInput("post.parent_id") ? input::getInput("post.parent_id") : 0);
			input::getInput("post.orders") && $menu->setOrders(input::getInput("post.orders"));
			input::getInput("post.url") && $menu->setUrl(input::getInput("post.url"));
			input::getInput("post.alt") && $menu->setAlt(input::getInput("post.alt"));
			$menu->setUserGroupIds(input::getInput("post.user_group_ids"));
			$menu->setType($this->type);
			$menu->setUpdatedAt(date("Y-m-d H:i:s"));
			$menu->save();
			$this->page_debug(lang::get("Has been saved!"),getFromUrl(site_url("home/left"),site_url("admin/menu/index/type/".$this->type)));
		}
		view::set("menu",$menu);
		view::set('pager',sf::getModel("user_groups")->selectAll("","ORDER BY id ASC",0));
		view::set("pid",input::getInput("get.pid") ? input::getInput("get.pid") : 0);
		view::set("parent_data",$menu->selectAll('','',0));
		view::apply("inc_body","admin/menu/edit");
		view::display("admin/page");
	}
	
	/**
	 * 删除数据
	 */
	function delete()
	{
		sf::getModel("menus",input::getInput("get.id"),$this->type)->remove();
		$this->page_debug(lang::get("Has been deleted!"),getFromUrl());
	}
}
?>