<?php
class home extends controller
{	
	function index()
	{
		view::apply("inc_right","admin/home");
		view::apply("inc_left","admin/left");
		view::display("admin/page");
	}
}