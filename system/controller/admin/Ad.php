<?php
class Ad extends controller
{
	
	function index()
	{
		$addWhere = $addSql = '';
		//处理排序
		$orderfield = input::getInput("get.orderfield") ? input::getInput("get.orderfield") : 'id';
		$ordermode = input::getInput("get.ordermode") ? input::getInput("get.ordermode") : 'DESC';
		$addSql = 'ORDER BY '.$orderfield.' '.$ordermode.' ';
		//处理搜索
		input::getInput("post.search") && $addWhere .= "`".input::getInput("mix.field")."` LIKE '%".trim(input::getInput("post.search"))."%' ";
		//取得带翻页的数据集
		$from_vars = array('field','search');
		view::set("pager",sf::getModel("ads")->getPager($addWhere ,$addSql ,10,'','',$from_vars));
		view::apply("inc_body","admin/ad/index");
		view::display("admin/page");
	}
	
	/**
	 * 数据编辑
	 */
	function edit()
	{
		$ad = sf::getModel("ads",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"));
		if(input::getInput("post.subject"))
		{
			$ad->setSubject(input::getInput("post.subject"));
			$ad->setBrief(input::getInput("post.brief"));
			$ad->setTypeStr(input::getInput("post.type_str"));
			$ad->setContent(input::getInput("post.content"));
			$ad->setIsPublic(input::getInput("post.is_public") ? 1 : 0);
			$ad->setUpdatedAt(date("Y-m-d H:i:s"));
			$ad->save();
			$this->page_debug(lang::get("Has been saved!"),site_url("admin/ad/index"));
		}
		view::set("ad",$ad);
		view::apply("inc_body","admin/ad/edit");
		view::display("admin/page");
	}
	
	/**
	 * 查看广告效果
	 */
	function show()
	{
		view::set("ad",sf::getModel("ads",input::getInput("get.id")));
		view::apply("inc_body","admin/ad/show");
		view::display("admin/page");
	}
	
	/**
	 * 取得广告内容页面
	 */
	function content()
	{
		$type = input::getInput("get.type") ? input::getInput("get.type") : 'text';
		view::set("ad",sf::getModel("ads",input::getInput("get.id")));
		switch($type)
		{
			case 'image':
				view::display("admin/ad/image");
			break;
			case 'flash':
				view::display("admin/ad/flash");
			break;
			case 'magic':
				view::display("admin/ad/magic");
			break;
			case 'code':
				view::display("admin/ad/code");
			break;
			default:
				view::display("admin/ad/text");
			break;
		}
	}
	
	/**
	 * 删除数据
	 */
	function delete()
	{
		if(input::getInput("post.select_id")){
			$ids = implode("','",input::getInput("post.select_id"));
		}else $ids = input::getInput("get.id");
		if(sf::getModel("ads")->remove("`id` IN ('".$ids."')")) $this->page_debug(lang::get("Has been deleted!"),getFromUrl());
		else $this->page_debug(lang::get("Nothing to do!"),getFromUrl());
	}
}
?>