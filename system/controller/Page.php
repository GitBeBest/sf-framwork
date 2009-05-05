<?php
class page extends controller
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
		$page = sf::getModel("pages")->showPage($this->type,input::getInput("get.id"));
		config::set('title',$page->getSubject());
		view::set("page",$page);
		view::apply("inc_body","template/about_us");
		view::display("template/page");
	}

}
?>