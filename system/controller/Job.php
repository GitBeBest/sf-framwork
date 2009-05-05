<?php
class job extends controller
{		
	public $auth = false;
	
	/**
	 * ְλ�б�
	 */
	function index()
	{
		$addWhere = $addSql = '';
		$addSql = 'ORDER BY updated_at DESC ';
		//��������
		input::getInput("post.search") && $addWhere .= "`subject` LIKE '%".trim(input::getInput("post.search"))."%' ";
		//ȡ�ô���ҳ�����ݼ�
		$from_vars = array('field','search');
		view::set("pager",sf::getModel("jobs")->getPager($addWhere ,$addSql ,12,'','',$from_vars));
		view::apply("inc_body","template/job_home");
		view::display("template/page");
	}
	
	/**
	 * �鿴ְλ
	 */
	function show()
	{
		view::set("job",sf::getModel("jobs",input::getInput("get.id")));
		view::apply("inc_body","template/job_show");
		view::display("template/page");
	}
	
	/**
	 * ���ͼ���
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