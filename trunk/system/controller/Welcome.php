<?php
class welcome extends controller
{	
	function index()
	{
		view::set("title","Thanks for you to use the sf!");
		view::display("welcome");
	}
}
?>