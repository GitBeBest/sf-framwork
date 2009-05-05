<?php
class home extends controller
{	
	/**
	 * 数据列表
	 */
	function index()
	{
		view::display("admin/home");
	}
	
	function left()
	{
		view::set("menu",sf::getModel("menus")->selectAllForGroup(input::getInput("session.userlevel")));
		view::display("admin/left");
	}
	
	function top()
	{
		$data['user'] = sf::getModel("managers",input::getInput("session.userid"));
		view::set($data);
		view::display("admin/top");
	}
	
	function center()
	{
		view::display("admin/center");
	}
	
	function buttom()
	{
		view::display("admin/buttom");
	}
	
	function main()
	{
		$data['user'] = sf::getModel("managers",input::getInput("session.userid"));
		view::set($data);
		view::apply("inc_body","admin/main");
		view::display("admin/page");
	}
	
}
?>