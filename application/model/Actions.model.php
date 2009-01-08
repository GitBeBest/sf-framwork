<?php

/**
 * 类名：数据模型扩展类
 * 说明：提供数据模型扩展方法。
 * $Id: init-model.php 151 2008-10-20 17:20:26Z meetcd $
 */

include_once("BaseActions.php");
class Actions extends BaseActions
{
	function isAuth()
	{
		$db = sf::getLib("db");
		$result = $db->fetch_first("SELECT * FROM ".$this->table." WHERE `controller` = '".router::getController()."' AND method = '".router::getMethod()."'");
		if($result){
			if(sf::getLib("authentic")->isLogin($result['user_group_ids'])) return true;
			else return false;	
		}else{
			$this->setController(router::getController());
			$this->setControllerName(router::getController());
			$this->setMethod(router::getMethod());
			$this->setUserGroupIds("1");
			$this->save();
			return false;
		}
	}
	
	function getUserGroupName($dv=',',$is_array = false)
	{
		$ids = explode(",",parent::getUserGroupIds());
		
		foreach((array)$ids as $id)
			$result[] = sf::getModel("user_group",$id)->getUserGroupName();
		
		if($is_array) return $result;
		else return implode($dv,$result);
	}
	
	function setUserGroupIds($actions=array())
	{
		return parent::setUserGroupIds(implode(",",(array)$actions));
	}
	
	function getUserGroupIds($is_array=false)
	{
		if($is_array) return explode(",",parent::getUserGroupIds());
		else return parent::getUserGroupIds();
	}
}