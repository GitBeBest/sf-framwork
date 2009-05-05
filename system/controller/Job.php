<?php
class job extends controller
{		
	public $auth = false;
	
	/**
	 * 职位列表
	 */
	function index()
	{
		$addWhere = $addSql = '';
		$addSql = 'ORDER BY updated_at DESC ';
		//处理搜索
		input::getInput("post.search") && $addWhere .= "`subject` LIKE '%".trim(input::getInput("post.search"))."%' ";
		//取得带翻页的数据集
		$from_vars = array('field','search');
		view::set("pager",sf::getModel("jobs")->getPager($addWhere ,$addSql ,12,'','',$from_vars));
		view::apply("inc_body","template/job_home");
		view::display("template/page");
	}
	
	/**
	 * 查看职位
	 */
	function show()
	{
		view::set("job",sf::getModel("jobs",input::getInput("get.id")));
		view::apply("inc_body","template/job_show");
		view::display("template/page");
	}
	
	/**
	 * 发送简历
	 */
	function send()
	{
		if(input::getInput("post"))
		{
			$back = sf::getModel("backs");
			$back->setSubject(input::getInput("post.subject"));
			$back->setUserName(input::getInput("post.user_name"));
			$back->setUserSex(input::getInput("post.user_sex"));
			$back->setUserAge(input::getInput("post.user_age"));
			$back->setUserDegree(input::getInput("post.user_degree"));
			$back->setIdcard(input::getInput("post.idcard"));
			$back->setUserPhone(input::getInput("post.user_phone"));
			$back->setUserIm(input::getInput("post.user_im"));
			$back->setUserEmail(input::getInput("post.user_email"));
			$back->setUserAddress(input::getInput("post.user_address"));
			$back->setPostCode(input::getInput("post.post_code"));
			$back->setWorkAt(input::getInput("post.work_at"));
			$back->setStudyList(input::getInput("post.study_list"));
			$back->setWorkList(input::getInput("post.work_list"));
			$back->setUpdatedAt(date("Y-m-d H:i:s"));
			$back->save();
			$this->page_debug(lang::get("Has been saved!"),site_url("job/index"));
		}
		view::set("job",sf::getModel("jobs",input::getInput("get.id")));
		view::apply("inc_body","template/job_send");
		view::display("template/page");
	}

}
?>