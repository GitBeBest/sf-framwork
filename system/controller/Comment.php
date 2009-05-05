<?php
class comment extends controller
{	
	public $auth = false;
	/**
	 * 数据列表
	 */
	function index()
	{
		$comment = sf::getModel("comments");
		$type = input::getInput("post.type") ? input::getInput("post.type") : input::getInput("get.type");
		
		if(input::getInput("post.content"))
		{
			if(input::getInput("session.SafetyCode") != input::getInput("post.SafetyCode"))
				$this->page_debug(lang::get("The safety code is error!"),getFromUrl());
			$comment->setTypeStr(input::getInput("post.type"));
			$comment->setContent(input::getInput("post.content"));
			$comment->setUserId(input::getInput("session.userid"));
			$comment->setUserName(input::getInput("post.user_name") ? input::getInput("post.user_name") : 'Guest');
			$comment->setUpdatedAt(date("Y-m-d H:i:s"));
			$comment->save();
		}
		
		view::set("type",$type);
		view::set("pager",$comment->getPager("`type_str` = '".$type."' ","ORDER BY updated_at DESC",10));
		
		view::apply("inc_body","comment/index");
		view::display("template/page");
	}
	
	/**
	 * AJAX取得数据
	 */
	function ajax()
	{
		$comment = sf::getModel("comments");
		$type = input::getInput("post.type") ? input::getInput("post.type") : input::getInput("get.type");
		
		if(input::getInput("post.content")){
			if(input::getInput("session.SafetyCode") != input::getInput("post.SafetyCode"))
				$this->page_debug(lang::get("The safety code is error!"),getFromUrl());
			$comment->setTypeStr(input::getInput("post.type"));
			$comment->setContent(input::getInput("post.content"));
			$comment->setUserId(input::getInput("session.userid"));
			$comment->setUserName(input::getInput("post.user_name") ? input::getInput("post.user_name") : 'Guest');
			$comment->setUpdatedAt(date("Y-m-d H:i:s"));
			$comment->save();
		}
		
		view::set("type",$type);
		view::set("pager",$comment->selectAll("`type_str` = '".$type."' ","ORDER BY updated_at DESC",5));
		view::display("comment/comment");
	}
	
}
?>