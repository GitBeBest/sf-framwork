<?php
class login extends controller
{	
	public $auth = false;
	
	function index()
	{
		if(input::getInput("post.username") && input::getInput("post.password"))
		{
			if(input::getInput("session.SafetyCode") != input::getInput("post.SafetyCode"))
				$this->page_debug(lang::get("The safety code is error!"),getFromUrl());
			if(sf::getPlugin("authentic",'managers')->login(input::getInput("post.username"),input::getInput("post.password"))){
				$this->page_debug(lang::get("Has been login!"),site_url("admin/home/index"));
			}else $this->page_debug(lang::get("Username or password is error!"),site_url("admin/login/index"));
		}
		view::display("admin/login/index");
	}
	
	function logout()
	{
		if(sf::getPlugin("authentic")->logout())
			$this->page_debug(lang::get("Has been logout!"),site_url("/"));
	}
	
	function password()
	{
		$user = sf::getModel("managers",input::getInput("session.userid"));
		if(input::getInput("post.password"))
		{
			if(input::getInput("post.password") == input::getInput("post.repassword")){
				if($user->check(input::getInput("post.oldpassword"))){
					$user->setUserPassword(input::getInput("post.password"));
					$user->setUpdatedAt(date("Y-m-d H:i:s"));
					$user->save();
					$this->page_debug(lang::get("Has been changed!"),site_url("admin/home/main"));
				}else $msg = lang::get("Password is error!");
			}else $msg = lang::get("Password is error!");
		}
		view::set("msg",$msg);
		view::set("user",$user);
		view::apply("inc_body","admin/login/password");
		view::display("admin/page");
	}
	
}