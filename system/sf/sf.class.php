<?php
class sf
{
	private static $sfObject = array('model'=>array(),'lib'=>array(),'controller'=>array(),'plugin'=>array());
	
	public function __construct(){}
	
	private static function set($object,$type = "controller")
	{
		if(!in_array(get_class($object),self::$sfObject[$type]))
			self::$sfObject[$type][get_class($object)] = $object;
	}
	
	public static function get($object,$type = "controller")
	{
		if(self::has($object,$type))
			return self::$sfObject[$type][$object];
		else return false;
	}
	
	public static function getObjects()
	{
		return self::$sfObject;
	}
	
	private static function has($object,$type = "controller")
	{
		return self::$sfObject[$type][$object];
	}
	
	public static function getController()
	{
		$agrs = func_get_args();
		$class = array_shift($agrs);
		return self::_load_class($class,"controller",$agrs);
	}
	
	public static function getLib()
	{
		$agrs = func_get_args();
		$class = array_shift($agrs);
		return self::_load_class($class,"lib",$agrs);
	}
	
	public static function getModel()
	{
		$agrs = func_get_args();
		$class = array_shift($agrs);
		return self::_load_class($class,"model",$agrs);
	}
	
	public static function getPlugin()
	{
		$agrs = func_get_args();
		$class = array_shift($agrs);
		return self::_load_class($class,"plugin",$agrs);
	}
	
	private static function _load_class($class,$type,$agrs=array())
	{
		$_class = explode("/",$class);
		if(count($_class) > 1){
			$class = array_pop($_class);
			$path = implode("/",$_class)."/";
		}else $path = '';
		
		if(self::has($class , $type)){
			$object = self::get($class , $type);
			method_exists($object , "__construct") && call_user_func_array(array($object , "__construct") , $agrs);
			return $object;
		}
		
		try{
			if(!loader::$type($path.$class)) throw new sfException(sprintf(lang::get("%s was not loaded!"),$type));
			$$class = new $class();
			
			method_exists($$class , "__construct") && call_user_func_array(array($$class , "__construct") ,$agrs);
			self::set($$class , $type);
			return $$class;
		}catch(sfException $e){
			$e->show();
		}
	}
	
}
