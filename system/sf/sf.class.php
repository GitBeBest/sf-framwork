<?php
/**
 * 类名：sf
 * 功能：处理和容纳系统对象（系统中所有对象都集中放在这里，方便系统处理是使用）
 */
class sf
{
	//对象容易（数据模型、类库、控制器和插件是分开存放的）
	private static $sfObject = array('model'=>array(),
									 'lib'=>array(),
									 'controller'=>array(),
									 'plugin'=>array());
	private static $version = '0.8.0';//当前框架版本
	
	public function __construct(){}
	
	/**
	 * 返回框架版本
	 */
	public static function version()
	{
		return self::$version;
	}
	
	/**
	 * 存储一个对象
	 */
	private static function set($object,$type = "controller")
	{
		if(!in_array(get_class($object),self::$sfObject[$type]))
			self::$sfObject[$type][get_class($object)] = $object;
	}
	
	/**
	 * 取回一个对象
	 */
	public static function get($object,$type = "controller")
	{
		if(self::has($object,$type))
			return self::$sfObject[$type][$object];
		else return false;
	}
	
	/**
	 * 取得所有对象
	 */
	public static function getObjects()
	{
		return self::$sfObject;
	}
	
	/**
	 * 判断一个对象是否存在
	 */
	private static function has($object,$type = "controller")
	{
		return self::$sfObject[$type][$object];
	}
	
	/**
	 * 返回一个控制器对象
	 */
	public static function getController()
	{
		$agrs = func_get_args();
		$class = array_shift($agrs);
		return self::_load_class($class,"controller",$agrs);
	}
	
	/**
	 * 返回一个类库对象
	 */
	public static function getLib()
	{
		$agrs = func_get_args();
		$class = array_shift($agrs);
		return self::_load_class($class,"lib",$agrs);
	}
	
	/**
	 * 返回一个数据模型对象
	 */
	public static function getModel()
	{
		$agrs = func_get_args();
		$class = array_shift($agrs);
		return self::_load_class($class,"model",$agrs);
	}
	
	/**
	 * 返回一个插件对象
	 */
	public static function getPlugin()
	{
		$agrs = func_get_args();
		$class = array_shift($agrs);
		return self::_load_class($class,"plugin",$agrs);
	}
	
	/**
	 * 加载一个对象
	 */
	private static function _load_class($class,$type,$agrs=array())
	{
		$_class = explode("/",$class);
		if(count($_class) > 1){
			$class = array_pop($_class);
			$path = implode("/",$_class)."/";
		}else $path = '';
		
		if(self::has($class , $type)){//如果存在对象，则返回对象（返回前重新初始化）
			$object = self::get($class , $type);
			method_exists($object , "__construct") && call_user_func_array(array($object , "__construct") , $agrs);
			return $object;
		}
		//如果不存在对象就需要重新构造并初始化
		try{
			if(!loader::$type($path.$class)) throw new sfException(sprintf(lang::get("%s was not loaded!"),$type));
			$$class = new $class();
			//初始化
			method_exists($$class , "__construct") && call_user_func_array(array($$class , "__construct") ,$agrs);
			self::set($$class , $type);
			return $$class;
		}catch(sfException $e){
			$e->show();
		}
	}
	
}
