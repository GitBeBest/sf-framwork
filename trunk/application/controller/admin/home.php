<?php
class home extends controller
{	
	function index()
	{
		$this->view->load("admin/home");
		$this->view->display();
	}
}