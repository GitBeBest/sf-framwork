<?php
/**
 * ������lang
 * ���ܣ��������ԵĹ��ʻ��������ԣ�
 */
class lang
{
	private static $sfLang = array();//���Կ�
	private static $lang = '';//��ǰ����
	
	public function __construct(){}
	
	/**
	 * ���������ļ�
	 */
	public static function load()
	{
		$agrs = func_get_args();
		for($i=0,$n=count($agrs);$i<$n;$i++)
			($lang = loader::language($agrs[$i])) && self::$sfLang = array_merge(self::$sfLang,(array)$lang);
	}
	
	/**
	 * ����ǰ���������ͱ�����������û�и�����������֮ǰ��Ĭ�ϲ��õ�ǰ����
	 */
	public static function setLang($lang='english')
	{
		if($lang){
			$_COOKIE[config::get("lang_cookie_name","sflang")] = $lang;
			return self::$lang = $lang;
		}
		if($_COOKIE[config::get("lang_cookie_name","sflang")]) return self::$lang = $_COOKIE[config::get("lang_cookie_name","sflang")];
		else return self::$lang = config::get("default_lang","english");
	}
	
	/**
	 * ȡ�õ�ǰ��������
	 */
	public static function getLang()
	{
		if($_COOKIE[config::get("lang_cookie_name","sflang")])//�Ѿ����������Ծ�ֱ�ӷ�����������
			return $_COOKIE[config::get("lang_cookie_name","sflang")];
		!self::$lang && self::setLang();//û�����������ֱ�Ӳ���Ĭ����������
		return self::$lang;
	}
	
	/**
	 * �����Կ�����µ����Է���
	 */
	public static function set()
	{
		$agrs = func_get_args();
		if(is_array($agrs[0]))
			self::$tfConfig = array_merge(self::$sfLang,$agrs[0]);
		elseif($agrs[1]){
			$keys = array_reverse(explode(".",$agrs[0]));
			$val = $agrs[1];
			foreach($keys as $key){
				$result = array();
				$result[$key] = $val;
				$val = $result;
			}
			self::$sfLang = array_merge(self::$sfLang,$result);
		}
	}
	
	/**
	 * ȡ��ָ��ֵ�ĵ�ǰ���Է���
	 */
	public static function get($key='')
	{
		if(!$key) return self::$sfLang;
		$keys = explode(".",$key);
		$result = self::$sfLang;
		foreach($keys as $key){
			$result = $result[$key];
		}
		if($result) return $result;
		else return $key;//û�з����ֱ�ӷ��ص�ǰ�ַ�
	}
}
