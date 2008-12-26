<?php
class controller
{
	public $auth = true;
	
	public function __construct()
	{
		if($this->auth) $this->auth();
		loader::lib("view");
	}
	
	public function auth()
	{
		if(!sf::getModel("actions")->isAuth())
			$this->page_debug(lang::get("You do not have permission to visit!"),site_url("login/index"));	
	}
	
	public function shutdown(){}
	
	/**
	 * 页面调试，系统提示方法 
	 */
	public function page_debug($msg,$url='',$title='')
	{
		$title == "" && $title = lang::get("Controller::debug");
		$url == '' && $url = "javascript:history.go(-1);";
		ob_start();
		if(is_file(APPPATH."error/debug.php")) include_once(APPPATH."error/debug.php");
		else include_once(SYSTEMPATH."error/debug.php");
		ob_end_flush();
		exit;
	}
	
}
?>