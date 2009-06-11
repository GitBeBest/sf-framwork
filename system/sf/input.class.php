<?php
/**
 * ������input
 * ���ܣ�����Լ������
 */
class input
{
	private static $sfInput = array();//�洢����ϵͳ����
	private static $is_do = false;//�Ƿ���ΪTRUE�ǲ��ڴ���INIT����
	
	/**
	 * �ݹ鴦��(���ˡ�����)���б���ֵ
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
		//������ϱ���
		self::$sfInput['mix'] = array();
		self::$sfInput['mix'] = array_merge(self::$sfInput['mix'], self::$sfInput['get']);
		self::$sfInput['mix'] = array_merge(self::$sfInput['mix'], self::$sfInput['post']);
		self::$is_do = true;
	}
	
	/**
	 * ��.��ʽȡ�����κ�ı���ֵ
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
	 * ȡ�����κ�Ļ�ϱ���ֵ,��GET��ʽֵ����,POSTֵ���.
	 */
	public static function getMix($key='')
	{
		if(self::getInput("get.".$key)) return self::getInput("get.".$key);
		else if(self::getInput("post.".$key)) return self::getInput("post.".$key);
		else return '';
	}
	
	/**
	 * ȡ��POST��ԭʼֵ
	 */
	public static function post($key='')
	{
		if(!$key) return $_POST;
		return $_POST[$key];
	}
	
	/**
	 * ȡ��GET��ԭʼֵ
	 */
	public static function get($key='')
	{
		if(!$key) return $_GET;
		return $_GET[$key];
	}
	
	/**
	 * ȡ��SESSION��ԭʼֵ
	 */
	public static function session($key='')
	{
		if(!$key) return $_SESSION;
		return $_SESSION[$key];
	}
	
	/**
	 * ȡ��SERVER��ԭʼֵ
	 */
	public static function server($key='')
	{
		if(!$key) return $_SERVER;
		return $_SERVER[$key];
	}
	
	/**
	 * ȡ�ÿͻ���IP
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
 * �ݹ鴦�����ֵ
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
