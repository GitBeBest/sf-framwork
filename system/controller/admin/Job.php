<?php
class job extends controller
{
	
	function index()
	{
		$addWhere = $addSql = '';
		//处理排序
		$orderfield = input::getInput("get.orderfield") ? input::getInput("get.orderfield") : 'id';
		$ordermode = input::getInput("get.ordermode") ? input::getInput("get.ordermode") : 'DESC';
		$addSql = 'ORDER BY '.$orderfield.' '.$ordermode.' ';
		//处理搜索
		input::getInput("post.search") && $addWhere .= "`".input::getInput("mix.field")."` LIKE '%".trim(input::getInput("post.search"))."%' ";
		//取得带翻页的数据集
		$from_vars = array('field','search');
		view::set("pager",sf::getModel("jobs")->getPager($addWhere ,$addSql ,30,'','',$from_vars));
		view::apply("inc_body","admin/job/index");
		view::display("admin/page");
	}
	
	function back()
	{
		$addWhere = $addSql = '';
		//处理排序
		$orderfield = input::getInput("get.orderfield") ? input::getInput("get.orderfield") : 'id';
		$ordermode = input::getInput("get.ordermode") ? input::getInput("get.ordermode") : 'DESC';
		$addSql = 'ORDER BY '.$orderfield.' '.$ordermode.' ';
		//处理搜索
		input::getInput("post.search") && $addWhere .= "`".input::getInput("mix.field")."` LIKE '%".trim(input::getInput("post.search"))."%' ";
		//取得带翻页的数据集
		$from_vars = array('field','search');
		view::set("pager",sf::getModel("backs")->getPager($addWhere ,$addSql ,30,'','',$from_vars));
		view::apply("inc_body","admin/job/back");
		view::display("admin/page");
	}
	
	/**
	 * 数据编辑
	 */
	function edit()
	{
		$job = sf::getModel("jobs",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"));
		if(input::getInput("post.subject"))
		{
			$job->setSubject(input::getInput("post.subject"));
			$job->setContent(input::getInput("post.content"));
			$job->setGuerdon(input::getInput("post.guerdon"));
			$job->setDepartment(input::getInput("post.department"));
			$job->setAge(input::getInput("post.age"));
			$job->setNumber(input::getInput("post.number"));
			$job->setWorkAddress(input::getInput("post.work_address"));
			$job->setDegree(input::getInput("post.degree"));
			$job->setLinkman(input::getInput("post.linkman"));
			$job->setLinkmanPhone(input::getInput("post.linkman_phone"));
			$job->setLinkmanEmail(input::getInput("post.linkman_email"));
			$job->setLinkmanIm(input::getInput("post.linkman_im"));
			$job->setAddress(input::getInput("post.address"));
			$job->setUpdatedAt(date("Y-m-d H:i:s"));
			$job->save();
			$this->page_debug(lang::get("Has been saved!"),site_url("admin/job/index"));
		}
		view::set("job",$job);
		view::apply("inc_body","admin/job/edit");
		view::display("admin/page");
	}
	
	function edit_back()
	{
		$back = sf::getModel("backs",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"));
		if(input::getInput("post.note"))
		{
			$back->setNote(input::getInput("post.note"));
			$back->save();
			$this->page_debug(lang::get("Has been saved!"),site_url("admin/job/back"));
		}
		view::set("back",$back);
		view::apply("inc_body","admin/job/edit_back");
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
		if(sf::getModel("jobs")->remove("`id` IN ('".$ids."')")) $this->page_debug(lang::get("Has been deleted!"),getFromUrl());
		else $this->page_debug(lang::get("Nothing to do!"),getFromUrl());
	}
	
	function delete_back()
	{
		if(input::getInput("post.select_id")){
			$ids = implode("','",input::getInput("post.select_id"));
		}else $ids = input::getInput("get.id");
		if(sf::getModel("backs")->remove("`id` IN ('".$ids."')")) $this->page_debug(lang::get("Has been deleted!"),getFromUrl());
		else $this->page_debug(lang::get("Nothing to do!"),getFromUrl());
	}
}
?>