<?php
class templete extends controller
{		
	public $type = 'default';
	
	function load()
	{
		$this->type = input::getInput("get.type") ? input::getInput("get.type") : 'default';
		view::set("type",$this->type);
	}
	
	function index()
	{
		$addWhere = $addSql = '';
		//处理排序
		$orderfield = input::getInput("get.orderfield") ? input::getInput("get.orderfield") : 'id';
		$ordermode = input::getInput("get.ordermode") ? input::getInput("get.ordermode") : 'DESC';
		$addSql = 'ORDER BY '.$orderfield.' '.$ordermode.' ';
		//处理搜索
		$addWhere .= "`type_str` = '".$this->type."' ";
		input::getInput("post.search") && $addWhere .= " AND `".input::getInput("mix.field")."` LIKE '%".trim(input::getInput("post.search"))."%' ";
		//取得带翻页的数据集
		$from_vars = array('field','search','type');
		view::set("pager",sf::getModel("templetes")->getPager($addWhere ,$addSql ,30,'','',$from_vars));
		view::apply("inc_body","admin/templete/index");
		view::display("admin/page");
	}
	
	/**
	 * 数据编辑
	 */
	function edit()
	{
		$templete = sf::getModel("templetes",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"));
		if(input::getInput("post.subject"))
		{
			$templete->setSubject(input::getInput("post.subject"));
			$templete->setBrief(input::getInput("post.brief"));
			$templete->setContent(input::getInput("post.content"));
			$templete->setTypeStr($this->type);
			$templete->setCover(input::getInput("post.cover"));
			$templete->setUpdatedAt(date("Y-m-d H:i:s"));
			$templete->save();
			$this->page_debug(lang::get("Has been saved!"),site_url("admin/templete/index/type/".$this->type));
		}
		view::set("templete",$templete);
		view::apply("inc_body","admin/templete/edit");
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
		if(sf::getModel("templetes")->remove("`id` IN ('".$ids."')")) $this->page_debug(lang::get("Has been deleted!"),getFromUrl());
		else $this->page_debug(lang::get("Nothing to do!"),getFromUrl());
	}
}
?>