<?php
class article extends controller
{	
	function index()
	{
		$news = sf::getModel("news");
		$addWhere = $addSql = '';
		view::set("pager",$news->getPager($addWhere ,$addSql ,10));
		//view::apply("article");
		view::display("article");
	}
}