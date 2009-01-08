<?php

/**
 * 类名：数据模型扩展类
 * 说明：提供数据模型扩展方法。
 * $Id: init-model.php 151 2008-10-20 17:20:26Z meetcd $
 */

include_once("BaseComment.php");
class Comment extends BaseComment
{
	function selectByItem($item_id,$type="project")
	{
		$addWhere = "item_id = '".$item_id."' AND item_type = '".$type."' ";
		return $this->selectAll($addWhere);
	}
	
	function selectByUserId($user_id)
	{
		$addWhere = "user_id = '".$user_id."' ";
		return $this->selectAll($addWhere);	
	}
}
?>