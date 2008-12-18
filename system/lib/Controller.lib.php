<?php
class controller
{
	public static $view = NULL;
	
	public function __construct()
	{
		sf::getLib("view");
	}
	
	public function shutdown(){}
	
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
