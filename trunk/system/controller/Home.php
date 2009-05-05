<?php
class home extends controller
{	
	public $auth = false;
	/**
	 * 数据列表
	 */
	function index()
	{
		view::apply("inc_body","template/home");
		view::display("template/page");
	}
	
}
?>