<?php
/**
 * 类名：loader
 * 功能：处理系统文件加栽管理
 * $Id$
 */
class loader
{
	public function __construct(){}
	
	/**
	 * 加栽数据模型
	 */
	public static function model($files)
	{
		if(is_array($files)){
			foreach($files as $file)
				self::loadfile($file,"model");
			return true;
		}
		return self::loadfile($files,"model");
	}
	
	/**
	 * 加栽类库
	 */
	public static function lib($files)
	{
		if(is_array($files)){
			foreach($files as $file)
				self::loadfile($file,"lib");
			return true;
		}
		return self::loadfile($files,"lib");
	}
	
	/**
	 * 加栽控制器类
	 */
	public static function controller($files)
	{
		if(is_array($files)){
			foreach($files as $file)
				self::loadfile($file,"controller");
			return true;
		}
		return self::loadfile($files,"controller");
	}
	
	/**
	 * 加栽语言文件
	 */
	public static function language($files)
	{
		$lang = lang::getLang();
		if(is_array($files)){
			foreach($files as $file)
				self::loadfile($lang."/".$file,"language");
			return true;
		}
		return self::loadfile($lang."/".$files,"language");
	}
	
	/**
	 * 加栽插件
	 */
	public static function plugin($files)
	{
		if(is_array($files)){
			foreach($files as $file)
				self::loadfile($file,"plugins");
			return true;
		}
		return self::loadfile($files,"plugins");
	}
	
	/**
	 * 加栽助手（功用函数）文件
	 */
	public static function helper($files)
	{
		if(is_array($files)){
			foreach($files as $file)
				self::loadfile($file,"helper");
			return true;
		}
		return self::loadfile($files,"helper");
	}
	
	/**
	 * 加栽配置文件
	 */
	public static function config($files)
	{
		if(is_array($files)){
			foreach($files as $file)
				self::loadfile($file,"config");
			return true;
		}
		return self::loadfile($files,"config");
	}
	
	/**
	 * 加栽视图文件
	 */
	public static function view($files)
	{
		if(is_array($files)){
			foreach($files as $file)
				self::loadfile($file,"view");
			return true;
		}
		return self::loadfile($files,"view");
	}
	
	/**
	 * 加栽指定文件
	 */
	private static function loadfile($file,$type='lib')
	{
		if($file = self::fileExist($file,$type)) return include_once($file);
		else return false;
	}	
	
	/**
	 * 加栽指定文件夹
	 */
	public static function loadfolder($dir,$type='config')
	{
		if($folder = self::folderExist($dir,$type)){
			$d = dir($folder);
			while (false !== ($file = $d->read()))
			   !in_array('.','..') && include_once($folder.'/'.$file);
			$d->close();
			return true;
		}else return false;
	}
	
	/**
	 * 判断指定文件是否存在
	 */
	public static function fileExist($file,$type='lib')
	{
		$_file = explode("/",$file);
		$file = ucfirst(array_pop($_file));
		$dir = $_file ? implode("/",$_file)."/" : '';
		if(is_file(config::get($type."_dir",APPPATH.$type."/").$dir.ucfirst($file).config::get($type."_ext",'.config.php')))//先搜索APPPATH目录
			return config::get($type."_dir",APPPATH.$type."/").$dir.ucfirst($file).config::get($type."_ext",'.config.php');
		elseif(is_file(SYSTEMPATH.$type."/".$dir.ucfirst($file).config::get($type."_ext",'.config.php')))//SYSTEMPATH
			return SYSTEMPATH.$type."/".$dir.ucfirst($file).config::get($type."_ext",'.config.php');
		else return false;
	}
	
	/**
	 * 判断指定内容是否为文件夹
	 */
	public static function folderExist($dir='',$type='lib')
	{
		if(is_dir($folder = config::get($type."_dir",APPPATH.$type."/").$dir)) return $folder;
		else if(is_dir($folder = SYSTEMPATH.$type."/".$dir)) return $folder;
		else return false;
	}
	
}