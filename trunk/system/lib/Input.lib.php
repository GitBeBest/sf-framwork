<?php

class input
{
	private static $sfInput = array();
	
	public function __construct()
	{
		self::$sfInput['post'] = $_POST;
		self::$sfInput['get'] = $_GET;
		self::$sfInput['cookie'] = $_COOKIE;
		self::$sfInput['env'] = $_ENV;
		self::$sfInput['files'] = $_FILES;
		self::$sfInput['request'] = $_REQUEST;
		self::$sfInput['session'] = $_SESSION;
		self::$sfInput['server'] = $_SERVER;
	}
	
	public static function getInput($key='')
	{
		if(!$key) return self::$sfInput;
		$keys = explode(".",$key);
		$result = self::$sfInput;
		foreach($keys as $key){
			$result = $result[$key];
		}
		if($result){
			array_walk_recursive($result,"processVariables");
			return $result;
		}else return false;
	}
	
	public static function post($key='')
	{
		if(!$key) return $_POST;
		return $_POST[$key];
	}
	
	public static function get($key='')
	{
		if(!$key) return $_GET;
		return $_GET[$key];
	}
	
	public static function session($key='')
	{
		if(!$key) return $_SESSION;
		return $_SESSION[$key];
	}
	
	public static function server($key='')
	{
		if(!$key) return $_SERVER;
		return $_SERVER[$key];
	}
	
	public static function getIp()
	{
		if ($_SERVER('REMOTE_ADDR') AND $_SERVER('HTTP_CLIENT_IP'))
		{
			 return $_SERVER['HTTP_CLIENT_IP'];
		}
		elseif ($_SERVER('REMOTE_ADDR'))
		{
			 return $_SERVER['REMOTE_ADDR'];
		}
		elseif ($_SERVER('HTTP_CLIENT_IP'))
		{
			 return $_SERVER['HTTP_CLIENT_IP'];
		}
		elseif ($_SERVER('HTTP_X_FORWARDED_FOR'))
		{
			 return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else return false;
	}
	
}

function processVariables(&$var, $key)
{
	if(!get_magic_quotes_gpc())
	{
		if(is_array($var))
		{
			foreach($var as $k => $v)
				self::processVariables($var[$k], $k);
		}else $var = addslashes($var);
	}
}
