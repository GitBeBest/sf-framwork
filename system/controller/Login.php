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
			if(sf::getPlugin("authentic",'users')->login(input::getInput("post.username"),input::getInput("post.password"))){
				$this->page_debug(lang::get("Has been login!"),site_url("login/index"));
			}else $this->page_debug(lang::get("Username or password is error!"),site_url("login/index"));
		}
		view::set("user",sf::getModel("users",input::getInput("session.userid")));
		view::apply("inc_body","template/user_login");
		view::display("template/page");
	}
	
	function logout()
	{
		if(sf::getPlugin("authentic")->logout())
			$this->page_debug(lang::get("Has been logout!"),site_url("/"));
	}
	
	function edit()
	{
		$user = sf::getModel("users",input::getInput("session.userid"));
		if(input::getInput("post.user_name"))
		{
			if(input::getInput("session.SafetyCode") != input::getInput("post.SafetyCode"))//验证码错误
				$this->page_debug(lang::get("The safety code is error!"),getFromUrl());
			if($user->hasUser(input::getInput("post.user_name")) && $user->isNew())//已经注册过
				$this->page_debug(lang::get("The safety code is error!"),getFromUrl());
			
			$user->setUserName(input::getInput("post.user_name"));
			$user->setUserPassword(input::getInput("post.password"));
			$user->setUserUsername(input::getInput("post.user_name"));
			$user->setUserEmail(input::getInput("post.user_email"));
			$user->setUserGroupId(3);
			$user->setCreatedAt(date("Y-m-d H:i:s"));
			$user->setUpdatedAt(date("Y-m-d H:i:s"));
			$user->save();
			$this->page_debug(lang::get("Has been changed!"),site_url("login/index"));
		}
		view::set("user",$user);
		view::apply("inc_body","template/user_edit");
		view::display("template/page");
	}
	
	function password()
	{
		$user = sf::getModel("users",input::getInput("session.userid"));
		if(input::getInput("post.password"))
		{
			if($user->check(input::getInput("post.oldpassword"))){
				$user->setUserPassword(input::getInput("post.password"));
				$user->setUpdatedAt(date("Y-m-d H:i:s"));
				$user->save();
				$this->page_debug(lang::get("Has been changed!"),site_url("login/index"));
			}else $msg = lang::get("Password is error!");
		}
		view::set("msg",$msg);
		view::set("user",$user);
		view::apply("inc_body","template/user_password");
		view::display("template/page");
	}
	
}