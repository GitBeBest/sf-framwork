<?php

/**
 * 类名：数据模型扩展类
 * 说明：提供数据模型扩展方法。
 * $Id: init-model.php 151 2008-10-20 17:20:26Z meetcd $
 */

include_once("BaseFilemanager.php");
class Filemanager extends BaseFilemanager
{
	function getLink($str="")
	{
		$str = $str ? $str : $this->getFileName();
		return '<a href="'.site_url("files/show/id/".parent::getId()).'">'.$str.'</a>';
	}
	
	function deleteFile($file='')
	{
		$file = $file ? $file : parent::getFilePath();
		$file = "./up_files/".$file;
		if(is_file($file)) return @unlink($file);
		else return false;
	}
	
	function remove($ids)
	{
		$result = $this->selectAll("`id` IN ('$ids')",'',0);
		while($file = $result->getObject())
		{
			if($file->getUsed() > 0) continue;
			$file->deleteFile();
			$file->delete();
		}
	}
}