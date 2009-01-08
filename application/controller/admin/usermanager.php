<?php
class usermanager extends controller
{	
	/**
	 * 数据列表
	 */
	function index()
	{
		$user = sf::getModel("user");
		$addWhere = $addSql = '';
		view::set("pager",$user->getPager($addWhere ,$addSql ,20));
		view::apply("inc_left","admin/left");
		view::apply("inc_right","admin/user/index");
		view::display("admin/page");
	}
	
	/**
	 * 数据编辑
	 */
	function edit()
	{
		$user = sf::getModel("user",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"));
		if(input::getInput("post.user_username"))
		{
			input::getInput("post.user_name") && $user->setUserName(input::getInput("post.user_name"));
			input::getInput("post.user_username") && $user->setUserUsername(input::getInput("post.user_username"));
			input::getInput("post.user_password") && $user->setUserPassword(input::getInput("post.user_password"));
			input::getInput("post.user_duty") && $user->setUserDuty(input::getInput("post.user_duty"));
			input::getInput("post.user_group_id") && $user->setUserGroupId(input::getInput("post.user_group_id"));
			$user->setIsLock(input::getInput("post.is_lock") ? 1 : 0);
			$user->setUpdatedAt(date("Y-m-d H:i:s"));
			$user->save();
			$this->page_debug(lang::get("Has been saved!"),site_url("admin/usermanager/index"));
		}
		$data["user"] = $user;
		$data['pager']  = sf::getModel("user_group")->selectAll("","ORDER BY id ASC",0);
		view::set($data);
		view::apply("inc_left","admin/left");
		view::apply("inc_right","admin/user/edit");
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
		
		sf::getModel("user")->remove($ids);
		$this->page_debug(lang::get("Has been deleted!"),site_url("admin/usermanager/index"));
	}
	
	function group_list()
	{
		$user_group = sf::getModel("user_group");
		$addWhere = $addSql = '';
		
		view::set("pager",$user_group->getPager($addWhere ,$addSql ,10));
		view::apply("inc_left","admin/left");
		view::apply("inc_right","admin/user/group_list");
		view::display("admin/page");
	}
	
	function group_edit()
	{
		$user_group = sf::getModel("user_group",input::getInput("get.id") ? input::getInput("get.id") : input::getInput("post.id"));
		if(input::getInput("post.user_group_name")){
			$user_group->setUserGroupName(input::getInput("post.user_group_name"));
			if($user_group->save()) 
				$this->page_debug(lang::get("Has been saved!"),site_url("admin/usermanager/group_list"));
		}
		
		$data['group'] = $user_group;
		view::set($data);
		view::apply("inc_left","admin/left");
		view::apply("inc_right","admin/user/group_edit");
		view::display("admin/page");
	}
	
	function group_delete()
	{
		if(input::getInput("post.select_id")){
			$ids = implode("','",input::getInput("post.select_id"));
		}else $ids = input::getInput("get.id"); 
		sf::getModel("user_group")->remove($ids);
		$this->page_debug(lang::get("Has been deteted!"),site_url("admin/user/group_list"));
	}
}
?>