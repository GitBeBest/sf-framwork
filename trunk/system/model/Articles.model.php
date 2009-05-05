<?php

/**
 * 类名：数据模型扩展类
 * 说明：提供数据模型扩展方法。
 * $Id$
 */

loader::model("BaseArticles");
class Articles extends BaseArticles
{
	function getCategoryName()
	{
		return sf::getModel("categorys",parent::getCategoryId())->getSubject();
	}
	
	function getIsPublicStr()
	{
		if(parent::getIsPublic() > 0) return lang::get('Is public');
		else return lang::get('Is wait');
	}
	
	function getIsTopStr()
	{
		if(parent::getIsTop() > 0) return lang::get('Is top');
		//else return lang::get('Is normal');
	}
	
	function getIsHotStr()
	{
		if(parent::getIsHot() > 0) return lang::get('Is hot');
		//else return lang::get('Is normal');
	}
	
	function getTotal($where='')
	{
		$db = sf::getLib("db");
		$sql = 'SELECT `id` FROM `'.$this->table.'` ';
		$where && $sql .= 'WHERE '.$where;
		$query = $db->query($sql);
		return $db->num_rows($query);
	}
	
}