<?php

class view
{
	private static $viewData = array();
	private static $viewTpl = array();
	
	public static function set($key,$val='')
	{
		if(is_array($key)) self::$viewData = array_merge_recursive(self::$viewData,$key);
		else self::$viewData[$key] = $val;
	}
	
	public static function apply($name,$tpl)
	{
		$tpl && self::$viewTpl[$name] = $tpl;
	}
	
	public static function getContent($tpl,$key='')
	{
		extract(self::$viewData);
		ob_start();
		if(is_file(config::get("view_dir").$tpl.".php")){
			@include_once(config::get("view_dir").$tpl.".php");
		}elseif(is_file(SYSTEMPATH."view/".$tpl.".php")){
			@include_once(SYSTEMPATH."view/".$tpl.".php");
		}
		self::$viewData[$key] = ob_get_contents();
		ob_end_clean();
		return self::$viewData[$key];
	}
	
	public static function display($tpl)
	{
		foreach(self::$viewTpl as $key => $file)
			self::getContent($file,$key);
		exit(self::getContent($tpl));
	}
}
?>