<?php
class user extends controller
{	
	/**
	 * 数据列表
	 */
	function index()
	{
		$user = sf::getModel("managers");
		$addWhere = $addSql = '';
		$orderfield = input::getInput("get.orderfield") ? input::getInput("get.orderfield") : 'id';
		$ordermode = input::getInput("get.ordermode") ? input::getInput("get.ordermode") : 'DESC';
		$addSql .= 'ORDER BY '.$orderfield.' '.$ordermode.' ';
		$addWhere .= '`user_group_id` <> 1 ';
		
		input::getInput("post.search") && $addWhere .= "AND user_name like '%".input::getInput("post.search")."%' ";
		view::set("pager",$user->getPager($addWhere ,$addSql ,20));
		view::apply("inc_body","admin/user/index");
		view::display("admin/page");
	}
	
	/**
	 * 数据编辑
	 */
	function edit()
	{
		$user = sf::getModel("managers",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"));
		if(input::getInput("post.user_username"))
		{
			input::getInput("post.user_name") && $user->setUserName(input::getInput("post.user_name"));
			input::getInput("post.user_username") && $user->setUserUsername(input::getInput("post.user_username"));
			input::getInput("post.user_password") && $user->setUserPassword(input::getInput("post.user_password"));
			input::getInput("post.user_email") && $user->setUserEmail(input::getInput("post.user_email"));
			input::getInput("post.user_group_id") && $user->setUserGroupId(input::getInput("post.user_group_id"));
			$user->setIsLock(input::getInput("post.is_lock") ? 1 : 0);
			$user->setUpdatedAt(date("Y-m-d H:i:s"));
			$user->save();
			$this->page_debug(lang::get("Has been saved!"),getFromUrl(site_url("home/left"),site_url("admin/user/index")));
		}
		$data["user"] = $user;
		$data['pager']  = sf::getModel("user_groups")->selectAll("","ORDER BY id ASC");
		view::set($data);
		view::apply("inc_body","admin/user/edit");
		view::display("admin/page");
	}
	
	/**
	 * 删除数据
	 */
	function delete()
	{
		if(input::getInput("post.select_id")){
			$ids = implode("','",input::getInput("post.select_id"));
		}else $ids = input::getInput("get.id"); 
		
		sf::getModel("managers")->remove("`user_id` in('".$ids."')");
		$this->page_debug(lang::get("Has been deleted!"),getFromUrl());
	}
	
	function group_list()
	{
		$user_group = sf::getModel("user_groups");
		$addWhere = $addSql = '';
		
		$orderfield = input::getInput("get.orderfield") ? input::getInput("get.orderfield") : 'id';
		$ordermode = input::getInput("get.ordermode") ? input::getInput("get.ordermode") : 'DESC';
		$addSql .= 'ORDER BY '.$orderfield.' '.$ordermode.' ';
		
		view::set("pager",$user_group->getPager($addWhere ,$addSql ,20));
		view::apply("inc_body","admin/user/group_list");
		view::display("admin/page");
	}
	
	function group_edit()
	{
		$user_group = sf::getModel("user_groups",input::getInput("get.id") ? input::getInput("get.id") : input::getInput("post.id"));
		if(input::getInput("post.user_group_name")){
			$user_group->setUserGroupName(input::getInput("post.user_group_name"));
			if($user_group->save()) 
				$this->page_debug(lang::get("Has been saved!"),getFromUrl(site_url("home/left"),site_url("admin/user/group_list")));
		}
		
		$data['group'] = $user_group;
		view::set($data);
		view::apply("inc_body","admin/user/group_edit");
		view::display("admin/page");
	}
	
	function group_delete()
	{
		if(input::getInput("post.select_id")){
			$ids = implode("','",input::getInput("post.select_id"));
		}else $ids = input::getInput("get.id"); 
		sf::getModel("user_groups")->remove("`id` in('".$ids."')");
		$this->page_debug(lang::get("Has been deteted!"),getFromUrl());
	}
}
?>