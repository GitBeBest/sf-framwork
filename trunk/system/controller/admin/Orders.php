<?php
class orders extends controller
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
		$from_vars = array('field','search','type');
		view::set("pager",sf::getModel("Order_froms")->getPager($addWhere ,$addSql ,30,'','',$from_vars));
		view::apply("inc_body","admin/order/index");
		view::display("admin/page");
	}
	
	/**
	 * 数据编辑
	 */
	function edit()
	{
		$orders = sf::getModel("Order_froms",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"));
		if(input::getInput("post.note"))
		{
			$orders->setNote(input::getInput("post.note"));
			$orders->setIsPublic(input::getInput("post.is_public"));
			$orders->save();
			$this->page_debug(lang::get("Has been saved!"),site_url("admin/orders/index"));
		}
		view::set("orders",$orders);
		view::apply("inc_body","admin/order/edit");
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
		if(sf::getModel("Order_froms")->remove("`id` IN ('".$ids."')")) $this->page_debug(lang::get("Has been deleted!"),getFromUrl());
		else $this->page_debug(lang::get("Nothing to do!"),getFromUrl());
	}
}
?>