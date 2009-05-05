<?php
class page extends controller
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
		input::getInput("post.search") && $addWhere .= " AND `subject` LIKE '%".trim(input::getInput("post.search"))."%' ";
		//取得带翻页的数据集
		view::set("pager",sf::getModel("pages")->getPager($addWhere ,$addSql ,30));
		view::apply("inc_body","admin/page/index");
		view::display("admin/page");
	}
	
	/**
	 * 数据编辑
	 */
	function edit()
	{
		$page = sf::getModel("pages",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"));
		if(input::getInput("post.subject"))
		{
			$page->setSubject(input::getInput("post.subject"));
			$page->setContent(input::getInput("post.content"));
			$page->setTypeStr($this->type);
			$page->setIsDefault(input::getInput("post.is_default") ? 1 : 0);
			$page->setIsPublic(input::getInput("post.is_public") ? 1 : 0);
			$page->setUpdatedAt(date("Y-m-d H:i:s"));
			$page->save();
			$this->page_debug(lang::get("Has been saved!"),site_url("admin/page/index/type/".$this->type));
		}
		view::set("page",$page);
		view::apply("inc_body","admin/page/edit");
		view::display("admin/page");
	}
	
	/**
	 * 删除数据
	 */
	function delete()
	{
		sf::getModel("pages",input::getInput("get.id"))->delete();
		$this->page_debug(lang::get("Has been deleted!"),getFromUrl());
	}
}
?>