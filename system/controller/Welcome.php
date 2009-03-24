<?php
class welcome extends controller
{	
	function index()
	{
		view::set("title","Welcome!");
		view::display("welcome");
	}
}
?>