<?php
class files extends controller
{	
	/**
	 * 数据列表
	 */
	function index()
	{
		$filemanager = sf::getModel("filemanager");
		$addWhere = $addSql = '';
		input::getInput("post.Search") && $addWhere .= "`".input::getInput("post.filed")."` like '%".input::getInput("post.Search")."%' ";
		view::set("pager",$filemanager->getPager($addWhere ,$addSql ,20));
		view::apply("inc_body","filemanager/index");
		view::display("page");
	}
	
	/**
	 * 数据编辑
	 */
	function edit()
	{
		$filemanager = sf::getModel("filemanager",input::getInput("post.id") ? input::getInput("post.id") : input::getInput("get.id"));
		if(input::getInput("post.file_note"))
		{
			input::getInput("post.file_note") && $filemanager->setFileNote(input::getInput("post.file_note"));
			input::getInput("post.file_name") && $filemanager->setFileName(input::getInput("post.file_name"));
			$filemanager->save();
			$this->page_debug(lang::get("Has been saved!"),getFromUrl());
		}
		view::set("filemanager",$filemanager);
		view::apply("inc_body","filemanager/edit");
		view::display("page");
	}
	
	/**
	 * 删除数据
	 */
	function delete()
	{
		if(input::getInput("post.select_id")){
			$ids = implode("','",input::getInput("post.select_id"));
		}else $ids = input::getInput("get.id"); 
		
		sf::getModel("filemanager")->remove($ids);
		$this->page_debug(lang::get("Has been deleted!"),getFromUrl());
	}
	
	function show()
	{
		!input::getInput("get.id") && $this->page_debug(lang::get("Lack of parameters!"));
		header("location:".site_path("up_files/".sf::getModel("filemanager",input::getInput("get.id"))->getFilePath()));
	}
}
?>