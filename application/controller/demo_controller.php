<?php
class demo_controller extends controller
{	
	/**
	 * 数据列表
	 */
	function index()
	{
		$demo = sf::getModel("demo");
		$addWhere = $addSql = '';
		$addSql .= "ORDER BY id DESC";
		input::getInput("post.Search") && $addWhere .= "`subject` like '%".input::getInput("post.Search")."%'";
		//取得带翻页的数据集
		view::set("pager",$demo->getPager($addWhere ,$addSql ,10));
		//也可以取得不带翻页的数据集
		//view::set("pager",$demo->selectAll($addWhere ,$addSql ,10));
		view::apply("search","demo/search");
		view::display("demo/demo");
	}
	
	/**
	 * 数据编辑
	 */
	function edit()
	{
		//载载demo数据模型，如果传入的id为空，则表示增加数据，否则为更新数据
		$demo = sf::getModel("demo",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"));
		if(input::getInput("post.subject"))
		{
			$demo->setSubject(input::getInput("post.subject"));
			$demo->setCreatedAt(date("Y-m-d H:i:s"));
			$demo->save();
			$this->page_debug(lang::get("Has been saved!"),site_url("demo_controller/index"));
		}
		view::set("demo",$demo);
		view::display("demo/edit");
	}
	
	/**
	 * 取得单个数据
	 */
	function show()
	{
		//载载demo数据模型
		$demo = sf::getModel("demo",input::getInput("get.id"));
		//也可以这样
		//$demo = sf::getModel("demo");
		//$demo->selectByPk(input::getInput("get.id"));
		view::set("demo",$demo);
		view::apply("search","demo/search");
		view::display("demo/show");
	}
	
	/**
	 * 删除数据
	 */
	function delete()
	{
		sf::getModel("demo",input::getInput("get.id"))->delete();
		//也可以批量删除
		//$demo = sf::getModel("demo");
		//$ids = input::getInput("get.id");//$ids可以是多条id，如：1，2，3
		//$demo->remove($ids);
		$this->page_debug(lang::get("Has been deleted!"),site_url("demo_controller/index"));
	}
}