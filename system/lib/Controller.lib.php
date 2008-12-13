<?php
class controller
{
	public static $view = NULL;
	
	public function __construct()
	{
		sf::getLib("view");
	}
	
	public function shutdown(){}
	
}
