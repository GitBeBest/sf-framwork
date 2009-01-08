<?php
class login extends controller
{	
	public $auth = false;
	
	function index()
	{
		if(input::getInput("post.username") && input::getInput("post.password"))
		{
			if(sf::getLib("authentic")->login(input::getInput("post.username"),input::getInput("post.password")))
				$this->page_debug(lang::get("Has been login!"),site_url("/"));
			else $msg = lang::get("Username or password is error!");
		}
		view::set("msg",$msg);
		view::apply("inc_right","admin/login/index");
		view::display("page");
	}
	
	function logout()
	{
		if(sf::getLib("authentic")->logout())
			$this->page_debug(lang::get("Has been logout!"),site_url("/"));
	}
	
}