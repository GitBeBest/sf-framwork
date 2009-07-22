<?php

/**
 * 类名：数据模型扩展类
 * 说明：提供数据模型扩展方法。
 * $Id$
 */

loader::model("BaseFilemanager");
class Filemanager extends BaseFilemanager
{	
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