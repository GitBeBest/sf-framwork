<?php

/**
 * 类名：数据模型扩展类
 * 说明：提供数据模型扩展方法。
 * $Id$
 */

loader::model("BasePages");
class Pages extends BasePages
{
	function getIsPublicStr()
	{
		if(parent::getIsPublic() == 1) return '显示';
		else return '隐藏';
	}
	
	function getIsDefaultStr()
	{
		if(parent::getIsDefault() == 1) return '默认';
		else return '正常';
	}
	
	function showPage($type='default',$id=0)
	{
		$result = sf::getModel("pages",$id);
		if($result->isNew()) return sf::getModel("pages")->selectAll("","ORDER BY is_default DESC",1)->getObject();
		else return $result;
	}
	
}