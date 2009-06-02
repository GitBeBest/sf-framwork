<?php

class config
{
	private static $sfConfig = array();
	
	public function __construct(){}
	
	/**
	 * 加载指定的配置文件
	 */
	public static function load()
	{
		$agrs = func_get_args();
		for($i=0,$n=count($agrs);$i<$n;$i++)
			($config = loader::config($agrs[$i])) && self::$sfConfig = config::array_merges(self::$sfConfig,(array)$config);
	}
	
	/**
	 * 向配置库里面增加新的配置
	 */
	public static function set()
	{
		$agrs = func_get_args();
		if(is_array($agrs[0]))
			self::$sfConfig = array_merge(self::$sfConfig,$agrs[0]);
		elseif($agrs[1]){
			$keys = array_reverse(explode(".",$agrs[0]));
			$val = $agrs[1];
			foreach($keys as $key){
				$result = array();
				$result[$key] = $val;
				$val = $result;
			}
			self::$sfConfig = array_merge(self::$sfConfig,$result);
		}
	}
	
	/**
	 * 获取配置参数,配置参数不存在用$val代替
	 */
	public static function get($key='',$val=NULL)
	{
		if(!$key) return self::$sfConfig;
		$keys = explode(".",$key);
		$result = self::$sfConfig;
		foreach($keys as $key){
			$result = $result[$key];
		}
		if($result) return $result;
		else return $val;
	}
	
	/**
	 * 递归合并2个数组
	 */
	public static function array_merges($array1=array(),$array2=array())
	{
		foreach($array1 as $key => $val){
			if(isset($array2[$key])){
				if(is_array($val)) $array1[$key] = config::array_merges($val,$array2[$key]);
				else{
					$array1[$key] = $array2[$key];
					unset($array2[$key]);
				}
			}	
		}
		return $array1 + $array2;
	}
}
