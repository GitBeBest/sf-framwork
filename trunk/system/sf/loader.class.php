<?php
/**
 * ������loader
 * ���ܣ�����ϵͳ�ļ����Թ���
 * $Id$
 */
class loader
{
	public function __construct(){}
	
	/**
	 * ��������ģ��
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
	 * �������
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
	 * ���Կ�������
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
	 * ���������ļ�
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
	 * ���Բ��
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
	 * �������֣����ú������ļ�
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
	 * ���������ļ�
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
	 * ������ͼ�ļ�
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
	 * ����ָ���ļ�
	 */
	private static function loadfile($file,$type='lib')
	{
		if($file = self::fileExist($file,$type)) return include_once($file);
		else return false;
	}	
	
	/**
	 * ����ָ���ļ���
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
	 * �ж�ָ���ļ��Ƿ����
	 */
	public static function fileExist($file,$type='lib')
	{
		$_file = explode("/",$file);
		$file = ucfirst(array_pop($_file));
		$dir = $_file ? implode("/",$_file)."/" : '';
		if(is_file(config::get($type."_dir",APPPATH.$type."/").$dir.ucfirst($file).config::get($type."_ext",'.config.php')))//������APPPATHĿ¼
			return config::get($type."_dir",APPPATH.$type."/").$dir.ucfirst($file).config::get($type."_ext",'.config.php');
		elseif(is_file(SYSTEMPATH.$type."/".$dir.ucfirst($file).config::get($type."_ext",'.config.php')))//SYSTEMPATH
			return SYSTEMPATH.$type."/".$dir.ucfirst($file).config::get($type."_ext",'.config.php');
		else return false;
	}
	
	/**
	 * �ж�ָ�������Ƿ�Ϊ�ļ���
	 */
	public static function folderExist($dir='',$type='lib')
	{
		if(is_dir($folder = config::get($type."_dir",APPPATH.$type."/").$dir)) return $folder;
		else if(is_dir($folder = SYSTEMPATH.$type."/".$dir)) return $folder;
		else return false;
	}
	
}