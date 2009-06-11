<?php
/**
 * ������sf
 * ���ܣ����������ϵͳ����ϵͳ�����ж��󶼼��з����������ϵͳ������ʹ�ã�
 */
class sf
{
	//�������ף�����ģ�͡���⡢�������Ͳ���Ƿֿ���ŵģ�
	private static $sfObject = array('model'=>array(),
									 'lib'=>array(),
									 'controller'=>array(),
									 'plugin'=>array());
	private static $version = '0.8.0';//��ǰ��ܰ汾
	
	public function __construct(){}
	
	/**
	 * ���ؿ�ܰ汾
	 */
	public static function version()
	{
		return self::$version;
	}
	
	/**
	 * �洢һ������
	 */
	private static function set($object,$type = "controller")
	{
		if(!in_array(get_class($object),self::$sfObject[$type]))
			self::$sfObject[$type][get_class($object)] = $object;
	}
	
	/**
	 * ȡ��һ������
	 */
	public static function get($object,$type = "controller")
	{
		if(self::has($object,$type))
			return self::$sfObject[$type][$object];
		else return false;
	}
	
	/**
	 * ȡ�����ж���
	 */
	public static function getObjects()
	{
		return self::$sfObject;
	}
	
	/**
	 * �ж�һ�������Ƿ����
	 */
	private static function has($object,$type = "controller")
	{
		return self::$sfObject[$type][$object];
	}
	
	/**
	 * ����һ������������
	 */
	public static function getController()
	{
		$agrs = func_get_args();
		$class = array_shift($agrs);
		return self::_load_class($class,"controller",$agrs);
	}
	
	/**
	 * ����һ��������
	 */
	public static function getLib()
	{
		$agrs = func_get_args();
		$class = array_shift($agrs);
		return self::_load_class($class,"lib",$agrs);
	}
	
	/**
	 * ����һ������ģ�Ͷ���
	 */
	public static function getModel()
	{
		$agrs = func_get_args();
		$class = array_shift($agrs);
		return self::_load_class($class,"model",$agrs);
	}
	
	/**
	 * ����һ���������
	 */
	public static function getPlugin()
	{
		$agrs = func_get_args();
		$class = array_shift($agrs);
		return self::_load_class($class,"plugin",$agrs);
	}
	
	/**
	 * ����һ������
	 */
	private static function _load_class($class,$type,$agrs=array())
	{
		$_class = explode("/",$class);
		if(count($_class) > 1){
			$class = array_pop($_class);
			$path = implode("/",$_class)."/";
		}else $path = '';
		
		if(self::has($class , $type)){//������ڶ����򷵻ض��󣨷���ǰ���³�ʼ����
			$object = self::get($class , $type);
			method_exists($object , "__construct") && call_user_func_array(array($object , "__construct") , $agrs);
			return $object;
		}
		//��������ڶ������Ҫ���¹��첢��ʼ��
		try{
			if(!loader::$type($path.$class)) throw new sfException(sprintf(lang::get("%s was not loaded!"),$type));
			$$class = new $class();
			//��ʼ��
			method_exists($$class , "__construct") && call_user_func_array(array($$class , "__construct") ,$agrs);
			self::set($$class , $type);
			return $$class;
		}catch(sfException $e){
			$e->show();
		}
	}
	
}
