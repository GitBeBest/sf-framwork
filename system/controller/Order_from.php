<?php
class order_from extends controller
{		
	public $auth = false;
	
	/**
	 * ·¢ËÍ¼òÀú
	 */
	function index()
	{
		if(input::getInput("post"))
		{
			$order = sf::getModel("order_froms");
			$order->setSubject(input::getInput("post.subject"));
			$order->setNumber(input::getInput("post.number"));
			$order->setPrice(input::getInput("post.price"));
			$order->setUserId(input::getInput("session.userid"));
			$order->setUserName(input::getInput("post.user_name"));
			$order->setUserSex(input::getInput("post.user_sex"));
			$order->setUserMobile(input::getInput("post.user_mobile"));
			$order->setUserPhone(input::getInput("post.user_phone"));
			$order->setUserFax(input::getInput("post.user_fax"));
			$order->setUserEmail(input::getInput("post.user_email"));
			$order->setUserAddress(input::getInput("post.user_address"));
			$order->setNotebook(input::getInput("post.notebook"));
			$order->setUpdatedAt(date("Y-m-d H:i:s"));
			$order->save();
			$this->page_debug(lang::get("Has been saved!"),getFromUrl());
		}
		view::set("subject",input::getInput("get.subject"));
		view::apply("inc_body","template/order_from");
		view::display("template/page");
	}

}
?>