<?php
class Authentic
{	
	function login($username,$password)
	{
		$user = sf::getModel("user");
		if($username && $password){
			$user->selectByName($username);
			if($user->check($password))
			{
				if($user->getIsLock()) exit(new sfException(lang::get("You has been lock!")));
				$user->setLoginNum();
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