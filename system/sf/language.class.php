<?php

class lang
{
	private static $sfLang = array();
	private static $lang = '';
	
	public function __construct(){}
	
	public static function load()
	{
		$agrs = func_get_args();
		for($i=0,$n=count($agrs);$i<$n;$i++)
			($lang = loader::language($agrs[$i])) && self::$sfLang = array_merge(self::$sfLang,(array)$lang);
	}
	
	public static function setLang($lang='english')
	{
		if($lang){
			$_COOKIE[config::get("lang_cookie_name","sflang")] = $lang;
			return self::$lang = $lang;
		}
		if($_COOKIE[config::get("lang_cookie_name","sflang")]) return self::$lang = $_COOKIE[config::get("lang_cookie_name","sflang")];
		else return self::$lang = config::get("default_lang","english");
	}
	
	public static function getLang()
	{
		!self::$lang && self::setLang();
		return self::$lang;
	}
	
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
	
	public static function get($key='')
	{
		if(!$key) return self::$sfLang;
		$keys = explode(".",$key);
		$result = self::$sfLang;
		foreach($keys as $key){
			$result = $result[$key];
		}
		if($result) return $result;
		else{
			/*self::set($key,$key);
			$str = '<?php return array('."\r\n";
			foreach(self::$sfLang as $k => $v)
				$str .= '	"'.str_replace('\\\'','\\\\\'',$k).'" => "'.$v.'",'."\r\n";
			$str .= ');?>';
			$h = fopen("D:/www/kjtn/application/language/chinese/global.lang.php",'w+');
			fwrite($h,$str);
			fclose($h);*/
			return $key;
		}
	}
}
