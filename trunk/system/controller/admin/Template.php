<?php
class template extends controller
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
		view::set("pager",sf::getModel("templates")->getPager($addWhere ,$addSql ,30,'','',$from_vars));
		view::apply("inc_body","admin/template/index");
		view::display("admin/page");
	}
	
	/**
	 * 数据编辑
	 */
	function edit()
	{
		$template = sf::getModel("templates",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"));
		if(input::getInput("post.subject"))
		{
			$template->setSubject(input::getInput("post.subject"));
			$template->setBrief(input::getInput("post.brief"));
			$template->setContent(input::getInput("post.content"));
			$template->setTypeStr($this->type);
			$template->setCover(input::getInput("post.cover"));
			$template->setUpdatedAt(date("Y-m-d H:i:s"));
			$template->save();
			$this->page_debug(lang::get("Has been saved!"),site_url("admin/template/index/type/".$this->type));
		}
		view::set("template",$template);
		view::apply("inc_body","admin/template/edit");
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
		if(sf::getModel("templates")->remove("`id` IN ('".$ids."')")) $this->page_debug(lang::get("Has been deleted!"),getFromUrl());
		else $this->page_debug(lang::get("Nothing to do!"),getFromUrl());
	}
}
?>