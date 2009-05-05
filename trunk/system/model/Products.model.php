<?php

/**
 * 类名：数据模型扩展类
 * 说明：提供数据模型扩展方法。
 * $Id$
 */

loader::model("BaseProducts");
class Products extends BaseProducts
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
	
	function setImages($v)
	{
		if(is_array($v)) parent::setImages(implode("|",$v));
		else parent::setImages($v);
	}
	
	function getImages($num=0)
	{
		$result = explode("|",parent::getImages());
		if($num) return $result[$num - 1];
		else return $result;
	}
	
}