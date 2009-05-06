<?php
class common extends controller
{	
	public $auth = false;
	
	/**
	* 产生验证码
	*/
	function index()
	{
		sf::getLib("Image")->createSafetyCode();
	}
	
	/**
	* 上传文件
	*/
	function upload()
	{
		$json = $msg = '';
		if($_FILES){
			$upload_type = input::getInput("post.upload_type") ? explode(",",input::getInput("post.upload_type")) : config::get("upload_type",array('jpg','bmp','gif','bmp','rar','doc','xls','zip','swf'));
			$upload_size = input::getInput("post.upload_size") ? input::getInput("post.upload_size") : config::get("upload_size","2097152");
			$upload = sf::getLib("upload","upload",config::get("upload_path","./up_files/"),$upload_size,$upload_type);
			if($upload->upload())
			{
				$result = $upload->getSaveFileInfo();
				foreach($result as $files)
				{
					$filemanager = sf::getModel("filemanager");
					$filemanager->setFileName($files['name']);
					$filemanager->setFileSavename($files['savename']);
					$filemanager->setFilePath($files['path']);
					$filemanager->setFileSize($files['size']);
					$filemanager->setFileExt($files['type']);
					$filemanager->setFileMinetype($files['minetype']);
					$filemanager->setUserId(input::session('userid'));
					$filemanager->setUserName(input::session('username'));
					$filemanager->setCreatedAt(date("Y-m-d H:i:s"));
					input::getInput("post.file_note") && $filemanager->setFileNote(input::getInput("post.file_note"));
					input::getInput("post.item_id") && $filemanager->setItemId(input::getInput("post.item_id"));
					input::getInput("post.item_type") && $filemanager->setItemType(input::getInput("post.item_type"));
					$file_id = $filemanager->save();
					$a_json[]  = "{file_name:'".$files['name']."',file_savename:'".$files['savename']."',path:'".$files['path']."',id:'".$file_id."'}";
				}
				$a_json && $json = "[".implode(",",$a_json)."]";
			}else $msg = lang::get("Failure to upload files!");
		}
		$data["result"] = $result;
		$data["json"] = $json;
		$data["msg"] = $msg;
		$data["item_id"] = input::getInput("get.item_id") ? input::getInput("get.item_id") : 0;
		$data["item_type"] = input::getInput("get.item_type") ? input::getInput("get.item_type") : 'project';
		$data["upload_type"] = input::getInput("get.type") ? input::getInput("get.type") : "jpg,png,gif,doc,xls,swf";
		$data["upload_size"] = input::getInput("get.size") ? input::getInput("get.size") : "2097152";
		view::set($data);
		view::apply("inc_body","common/upload");
		view::display("admin/page");
	}
	
   /**
	* 评论
	*/
	function comment()
	{
		$comment = sf::getModel("comments");
		$type = input::getInput("post.type") ? input::getInput("post.type") : 'common';
		if(input::getInput("post.content")){
			if(config::get('comment_must_login',false) && !input::getInput("session.userid")) exit('{state:false,msg:"'.lang::get("You do not have permission to visit!").'"}');
			$comment->setTypeStr($type);
			input::getInput("post.subject") && $comment->setSubject(input::getInput("post.subject"));
			input::getInput("post.content") && $comment->setContent(input::getInput("post.content"));
			$comment->setUserId(input::getInput("session.userid") ? input::getInput("session.userid") : 0);
			$comment->setUserName(input::getInput("session.username") ? input::getInput("session.username") : 'Guest');
			$comment->setUpdatedAt(date("Y-m-d H:i:s"));
			if($comment->save()) exit('{state:true,msg:"'.lang::get('Has been save!').'",subject:"'.$comment->getSubject().'",content:"'.$comment->getContent().'",username:"'.$comment->getUserName().'",date:"'.$comment->getUpdatedAt("Y/m/d").'"}');
			else exit('{state:false,msg:"'.lang::get('Save error!').'"}');
		}
		view::set("pager",$comment->selectAll("type_str = '".$type."' ",'ORDER BY `updated_at` DESC',config::get('comment_show_max_in_page',5)));
		$htmlStr = view::getContent("common/comment");
		exit("{state:true,htmlStr:'".$htmlStr."'}");
	}

}
?>