<?php
class book extends controller
{		
	public $type = 'default';
	public $auth = false;
	
	function load()
	{
		$this->type = input::getInput("get.type") ? input::getInput("get.type") : 'default';
		view::set("type",$this->type);
	}
	
	function index()
	{
		$addWhere = $addSql = '';
		$addSql = "order by updated_at DESC";
		$addWhere .= " is_public = 1 ";
		input::getInput("post.search") && $addWhere .= " AND `content` LIKE '%".trim(input::getInput("post.search"))."%' ";
		//取得带翻页的数据集
		$from_vars = array('field','search','type');
		view::set("pager",sf::getModel("books")->getPager($addWhere,$addSql,5,'','',$from_vars));
		view::apply("inc_body","template/book");
		view::display("template/page");
	}
	
	function edit()
	{
		if(input::getInput("session.SafetyCode") != input::getInput("post.SafetyCode"))
			$this->page_debug(lang::get("The safety code is error!"),getFromUrl());
		$book = sf::getModel("books",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"));
		if(input::getInput("post.content"))
		{
			$book->setContent(input::getInput("post.content"));
			$book->setUserName(input::getInput("post.user_name"));
			$book->setUserPhone(input::getInput("post.user_phone"));
			$book->setUserQq(input::getInput("post.user_qq"));
			$book->setUserEmail(input::getInput("post.user_email"));
			$book->setUpdatedAt(date("Y-m-d H:i:s"));
			$book->save();
			$this->page_debug(lang::get("Has been saved!"),getFromUrl());
		}
		$this->page_debug(lang::get("Has been saved!"),getFromUrl());
	}

}
?>