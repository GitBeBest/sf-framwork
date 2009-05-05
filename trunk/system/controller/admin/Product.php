<?php
class product extends controller
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
		view::set("pager",sf::getModel("products")->getPager($addWhere ,$addSql ,30,'','',$from_vars));
		view::apply("inc_body","admin/product/index");
		view::display("admin/page");
	}
	
	/**
	 * 数据编辑
	 */
	function edit()
	{
		$product = sf::getModel("products",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"));
		if(input::getInput("post.subject"))
		{
			$product->setSubject(input::getInput("post.subject"));
			$product->setPrice(input::getInput("post.price"));
			$product->setBrief(input::getInput("post.brief"));
			$product->setContent(input::getInput("post.content"));
			$product->setTypeStr($this->type);
			$product->setCategoryId(input::getInput("post.category_id"));
			$product->setCover(input::getInput("post.cover"));
			$product->setImages(input::getInput("post.images"));
			$product->setIsTop(input::getInput("post.is_top") ? 1 : 0);
			$product->setIsHot(input::getInput("post.is_hot") ? 1 : 0);
			$product->setIsPublic(input::getInput("post.is_public") ? 1 : 0);
			$product->setUpdatedAt(date("Y-m-d H:i:s"));
			$product->save();
			$this->page_debug(lang::get("Has been saved!"),site_url("admin/product/index/type/".$this->type));
		}
		view::set("product",$product);
		view::apply("inc_body","admin/product/edit");
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
		
		if(sf::getModel("products")->remove("`id` IN ('".$ids."')")) $this->page_debug(lang::get("Has been delete!"),getFromUrl());
		else $this->page_debug(lang::get("Nothing to do!"),getFromUrl());
	}
}
?>