<?php
/**
 * 类名：input
 * 功能：处理约束变量
 */
class input
{
	private static $sfInput = array();//存储所有系统变量
	private static $is_do = false;//是否处理，为TRUE是不在处理INIT方法
	
	/**
	 * 递归处理(过滤、整理)所有变量值
	 */
	public function init()
	{
		self::$sfInput['post'] = &$_POST;
		self::$sfInput['get'] = &$_GET;
		self::$sfInput['cookie'] = &$_COOKIE;
		self::$sfInput['env'] = &$_ENV;
		self::$sfInput['files'] = &$_FILES;
		self::$sfInput['request'] = &$_REQUEST;
		self::$sfInput['session'] = &$_SESSION;
		self::$sfInput['server'] = &$_SERVER;
		array_walk_recursive(self::$sfInput,"processVariables");
		//产生混合变量
		self::$sfInput['mix'] = array();
		self::$sfInput['mix'] = array_merge(self::$sfInput['mix'], self::$sfInput['get']);
		self::$sfInput['mix'] = array_merge(self::$sfInput['mix'], self::$sfInput['post']);
		self::$is_do = true;
	}
	
	/**
	 * 用.方式取得整形后的变量值
	 */
	public static function getInput($key='')
	{
		!self::$is_do && self::init();
		if(!$key) return self::$sfInput;
		$keys = explode(".",$key);
		$result = self::$sfInput;
		foreach($keys as $key){
			$result = $result[$key];
		}
		return $result;
	}
	
	/**
	 * 取得整形后的混合变量值,以GET方式值优先,POST值其次.
	 */
	public static function getMix($key='')
	{
		if(self::getInput("get.".$key)) return self::getInput("get.".$key);
		else if(self::getInput("post.".$key)) return self::getInput("post.".$key);
		else return '';
	}
	
	/**
	 * 取得POST的原始值
	 */
	public static function post($key='')
	{
		if(!$key) return $_POST;
		return $_POST[$key];
	}
	
	/**
	 * 取得GET的原始值
	 */
	public static function get($key='')
	{
		if(!$key) return $_GET;
		return $_GET[$key];
	}
	
	/**
	 * 取得SESSION的原始值
	 */
	public static function session($key='')
	{
		if(!$key) return $_SESSION;
		return $_SESSION[$key];
	}
	
	/**
	 * 取得SERVER的原始值
	 */
	public static function server($key='')
	{
		if(!$key) return $_SERVER;
		return $_SERVER[$key];
	}
	
	/**
	 * 取得客户端IP
	 */
	public static function getIp()
	{
		if ($_SERVER['REMOTE_ADDR'])
		{
			 return $_SERVER['REMOTE_ADDR'];
		}
		elseif ($_SERVER['REMOTE_ADDR'])
		{
			 return $_SERVER['REMOTE_ADDR'];
		}
		elseif ($_SERVER['HTTP_CLIENT_IP'])
		{
			 return $_SERVER['HTTP_CLIENT_IP'];
		}
		elseif ($_SERVER['HTTP_X_FORWARDED_FOR'])
		{
			 return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else return false;
	}
	
}

/**
 * 递归处理变量值
 */
function processVariables(&$var, $key)
{
	if(!get_magic_quotes_gpc())
	{
		if(is_array($var))
		{
			foreach($var as $k => $v)
				processVariables($var[$k], $k);
		}else $var = addslashes($var);
	}
}
