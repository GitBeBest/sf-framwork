<?php
class article extends controller
{	
	function index()
	{
		$news = sf::getModel("news");
		$addWhere = $addSql = '';
		$this->view->set("pager",$news->getPager($addWhere ,$addSql ,10));
		
		$this->view->load("article");
		$this->view->display();
	}
}