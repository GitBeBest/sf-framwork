<?php
class Authentic
{	
	public $user = NULL;
	
	function __construct($type='users')
	{
		$this->user = sf::getModel($type);
	}
	
	function login($username,$password)
	{
		$user = $this->user;
		if($username && $password){
			$user->selectByName($username);
			if($user->check($password))
			{
				if($user->getIsLock() != 1) exit(new sfException(lang::get("You has been lock!")));
				$user->setLoginNum();
				$user->setLastloginAt(date("Y-m-d H:i:s"));
				$user->setUserIp(input::getIp());
				$user->save();
				$_SESSION['userid'] =  $user->getId();
				$_SESSION['username'] =  $user->getUserName();
				$_SESSION['userlevel'] =  $user->getUserGroupId();
				return true;
			}
		}
		return false;
	}
	 
	function logout()
	{
		unset($_SESSION);
		session_destroy();
		return true;
	}
	
	function isLogin($ids)
	{
		if($_SESSION['userid'] && $_SESSION['username'] && $_SESSION['userlevel']){
			$id_array = explode(",",$ids);
			if(in_array($_SESSION['userlevel'],$id_array)) return true;
			else return false;
		}else return false;
	}
}