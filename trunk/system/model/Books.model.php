<?php

/**
 * 类名：数据模型扩展类
 * 说明：提供数据模型扩展方法。
 * $Id$
 */

loader::model("BaseBooks");
class Books extends BaseBooks
{
	function getIsPublicStr()
	{
		if(parent::getIsPublic() > 0) return lang::get('Is public');
		else return lang::get('Is wait');
	}
}