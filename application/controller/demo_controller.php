<?php
class demo_controller extends controller
{	
	/**
	 * �����б�
	 */
	function index()
	{
		$demo = sf::getModel("demo");
		$addWhere = $addSql = '';
		$addSql .= "ORDER BY id DESC";
		input::getInput("post.Search") && $addWhere .= "`subject` like '%".input::getInput("post.Search")."%'";
		//ȡ�ô���ҳ�����ݼ�
		view::set("pager",$demo->getPager($addWhere ,$addSql ,10));
		//Ҳ����ȡ�ò�����ҳ�����ݼ�
		//view::set("pager",$demo->selectAll($addWhere ,$addSql ,10));
		view::apply("search","demo/search");
		view::display("demo/demo");
	}
	
	/**
	 * ���ݱ༭
	 */
	function edit()
	{
		//����demo����ģ�ͣ���������idΪ�գ����ʾ�������ݣ�����Ϊ��������
		$demo = sf::getModel("demo",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"));
		if(input::getInput("post.subject"))
		{
			$demo->setSubject(input::getInput("post.subject"));
			$demo->setCreatedAt(date("Y-m-d H:i:s"));
			$demo->save();
			$this->page_debug(lang::get("Has been saved!"),site_url("demo_controller/index"));
		}
		view::set("demo",$demo);
		view::display("demo/edit");
	}
	
	/**
	 * ȡ�õ�������
	 */
	function show()
	{
		//����demo����ģ��
		$demo = sf::getModel("demo",input::getInput("get.id"));
		//Ҳ��������
		//$demo = sf::getModel("demo");
		//$demo->selectByPk(input::getInput("get.id"));
		view::set("demo",$demo);
		view::apply("search","demo/search");
		view::display("demo/show");
	}
	
	/**
	 * ɾ������
	 */
	function delete()
	{
		sf::getModel("demo",input::getInput("get.id"))->delete();
		//Ҳ��������ɾ��
		//$demo = sf::getModel("demo");
		//$ids = input::getInput("get.id");//$ids�����Ƕ���id���磺1��2��3
		//$demo->remove($ids);
		$this->page_debug(lang::get("Has been deleted!"),site_url("demo_controller/index"));
	}
}