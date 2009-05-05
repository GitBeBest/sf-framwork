<?php

/**
 * 类名：数据模型扩展类
 * 说明：提供数据模型扩展方法。
 * $Id$
 */

loader::model("BaseUsers");;
class Users extends BaseUsers
{
	function encode_password($password='')
	{
		$str = substr(md5(uniqid()),-3);
		return md5($password.$str).":".$str;
	}
	
	function setUserPassword($v)
	{
		parent::setUserPassword($this->encode_password($v));
	}
	
	function selectByName($userName='')
	{
		$db = sf::getLib("db");
		$result = $db->fetch_first("SELECT * FROM ".$this->table." WHERE `user_name` = '".$userName."'");
		if($result){
			$this->fillObject($result);
			return $this;
		}else return false;
	}
	
	function setLoginNum()
	{
		parent::setLoginNum($this->getLoginNum() + 1);
	}
	
	function hasUser($userName='')
	{
		if($this->selectByName($userName)) return true;
		else return false;
	}
	
	function check($password='',$oldpass='')
	{
		$oldpass == '' && $oldpass = $this->getUserPassword();
		$pass_array = explode(":",$oldpass);
		if(count($pass_array) > 1){
			$oldpass = $pass_array[0];
			$tempstr = $pass_array[1];
			if($oldpass == md5($password.$tempstr)) return true;
			else return false;
		}else{
			if($oldpass == $password) return true;
			else return false;
		}
	}
	
	function getUserGroupName()
	{
		return sf::getModel("user_groups",parent::getUserGroupId())->getUserGroupName();
	}
	
	
	function getState()
	{
		if(parent::getIsLock() == 1) return lang::get("Is normal!");
		else return lang::get("Is lock!");
	}
}