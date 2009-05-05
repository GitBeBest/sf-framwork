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
		input::getInput("post.search") && $addWhere .= " `".input::getInput("mix.field")."` LIKE '%".trim(input::getInput("post.search"))."%' ";
		//取得带翻页的数据集
		$from_vars = array('field','search','type');
		view::set("pager",sf::getModel("books")->getPager($addWhere,$addSql,5,'','',$from_vars));
		view::apply("inc_body","admin/book/index");
		view::display("admin/page");
	}
	
	function edit()
	{
		$book = sf::getModel("books",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"));
		if(input::getInput("post.content"))
		{
			$book->setContent(input::getInput("post.content"));
			$book->setUserName(input::getInput("post.user_name"));
			$book->setUserPhone(input::getInput("post.user_phone"));
			$book->setUserQq(input::getInput("post.user_qq"));
			$book->setUserEmail(input::getInput("post.user_email"));
			$book->setWriteBack(input::getInput("post.write_back"));
			$book->setIsPublic(input::getInput("post.is_public") ? 1 : 0);
			$book->setUpdatedAt(date("Y-m-d H:i:s"));
			$book->save();
			$this->page_debug(lang::get("Has been saved!"),getFromUrl());
		}
		view::set("book",$book);
		view::apply("inc_body","admin/book/edit");
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
		if(sf::getModel("books")->remove("`id` IN ('".$ids."')")) $this->page_debug(lang::get("Has been deleted!"),getFromUrl());
		else $this->page_debug(lang::get("Nothing to do!"),getFromUrl());
	}

}
?>