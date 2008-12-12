<?php
class controller
{
	public static $view = NULL;
	
	public function __construct()
	{
		$this->view = sf::getLib("view");
	}
	
	public function shutdown(){}
	
}
