<?php
class user_manager extends controller
{	
	function index()
	{
		view::apply("inc_right","admin/user_manager");
		view::apply("inc_left","admin/left");
		view::display("admin/page");
	}
}