<?php
class common extends controller
{	
	/**
	 * 数据列表
	 */
	function index()
	{
		exit("不允许访问");
	}
	
	function upload()
	{
		$json = $msg = '';
		if($_FILES){
			$upload = sf::getLib("upload","upload",config::get("upload_path","./up_files/"),config::get("upload_size","2097152"),config::get("upload_type",array('jpg','bmp','gif','bmp','rar','doc','xls','zip')));
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
					$file_id = $filemanager->save();
					$a_json[]  = "{file_name:'".$files['name']."',file_savename:'".$files['savename']."',path:'".$files['path']."',id:'".$file_id."'}";
				}
				$json = "[".implode(",",$a_json)."]";
			}else $msg = lang::get("Failure to upload files!");
		}
		$data["result"] = $result;
		$data["json"] = $json;
		$data["msg"] = $msg;
		$data["item_id"] = input::getInput("get.item_id") ? input::getInput("get.item_id") : 0;
		view::set($data);
		view::apply("inc_body","common/upload");
		view::display("page");
	}
	
	function addComment()
	{
		$comment = sf::getModel("comment");
		if(input::getInput("post.content"))
		{
			input::getInput("post.content") && $comment->setContent(input::getInput("post.content"));
			input::getInput("post.item_id") && $comment->setItemId(input::getInput("post.item_id"));
			input::getInput("post.item_type") && $comment->setItemType(input::getInput("post.item_type"));
			$comment->setUserName(input::getInput("session.username"));
			$comment->setUserId(input::getInput("seesion.userid"));
			$comment->setCreatedAt(date("Y-m-d H:i:s"));
			if($comment->save()) $this->page_debug("Has been saved!","javascript:parent.location.reload();");
		}
		$data['item_id'] = input::getInput("get.item_id");
		$data['item_type'] = input::getInput("get.item_type");
		$addWhere = "item_id = '".input::getInput("get.item_id")."' AND item_type = '".input::getInput("get.item_type")."' ";
		$data['pager'] = $comment->getPager($addWhere,'ORDER BY created_at DESC',5);
		view::set($data);
		view::apply("inc_body","common/comment_add");
		view::display("page");
	}

}
?>