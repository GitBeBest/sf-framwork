<?php

/**
 * 类名：数据模型扩展类
 * 说明：提供数据模型扩展方法。
 * $Id$
 */

loader::model("BaseAds");
class Ads extends BaseAds
{
	function getIsPublicStr()
	{
		if(parent::getIsPublic() > 0) return lang::get('Is public');
		else return lang::get('Is wait');
	}
	
	function setContent($v)
	{
		if(is_array($v)) parent::setContent(base64_encode(serialize($v)));
		else parent::setContent($v);
	}
	
	function getContent()
	{
		return (array)unserialize(base64_decode(parent::getContent()));	
	}
}