<?php

class config
{
	private static $sfConfig = array();
	
	public function __construct(){}
	
	/**
	 * ����ָ���������ļ�
	 */
	public static function load()
	{
		$agrs = func_get_args();
		for($i=0,$n=count($agrs);$i<$n;$i++)
			($config = loader::config($agrs[$i])) && self::$sfConfig = config::array_merges(self::$sfConfig,(array)$config);
	}
	
	/**
	 * �����ÿ����������µ�����
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
	 * ��ȡ���ò���,���ò�����������$val����
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
	 * �ݹ�ϲ�2������
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
