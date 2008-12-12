<?php
class welcome extends controller
{	
	function index()
	{
		$this->view->set("title","Welcome!");
		$this->view->load("welcome");
		$this->view->display();
	}
}
?>
