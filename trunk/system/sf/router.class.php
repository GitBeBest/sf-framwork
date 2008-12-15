<?php

/**
 * ·�ɿ���
 */
class router
{
	private static $uri_string = '';
	private static $get = array();
	private static $folder = '';
	
	public static function getFolder()
	{
		return self::$folder;
	}
	
	public static function getController()
	{
		return self::$get['controller'];
	}
	
	public static function get($key)
	{
		return self::$get[$key];
	}
	
	public static function getMethod()
	{
		return self::$get['method'];
	}
	
	public static function getUri()
	{
		return self::$uri_string;
	}
	
	public static function parse()
	{
		self::get_uri_string();
		self::parse_routes(self::$uri_string);
		$_GET = array_merge($_GET,self::$get);
		return self::$get;
	}
	
	private static function set_request($get=array())
	{
		try{
			if(loader::fileExist(self::$folder.$get[0],'controller')){
				self::$get['controller'] = self::$folder.array_shift($get);
				self::$get['method'] = $get[0] ? array_shift($get) : config::get("router.default_method",'index');
			}elseif(loader::folderExist($get[0],'controller')){
				self::$folder = array_shift($get)."/";
				self::set_request($get);
				return ;
			}else throw new sfException(lang::get("Controller not find!"));
			
			for($i=0,$n=count($get);$i<$n;$i+=2)
				self::$get[$get[$i]] = $get[($i+1)];
		}catch(sfException $e){
			$e->halt();
		}
	}
	
	private static function get_uri_string()
	{			
		$path = (isset($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : @getenv('PATH_INFO');			
		if (trim($path, '/') != '' && $path != "/".SELF)
		{
			self::$uri_string = $path;
			return;
		}
					
		$path =  (isset($_SERVER['QUERY_STRING'])) ? $_SERVER['QUERY_STRING'] : @getenv('QUERY_STRING');	
		if (trim($path, '/') != '')
		{
			self::$uri_string = $path;
			return;
		}
			
		$path = (isset($_SERVER['ORIG_PATH_INFO'])) ? $_SERVER['ORIG_PATH_INFO'] : @getenv('ORIG_PATH_INFO');	
		if (trim($path, '/') != '' && $path != "/".SELF)
		{
			self::$uri_string = str_replace($_SERVER['SCRIPT_NAME'], '', $path);
			return;
		}
		
		self::$uri_string = '';
	}
	
	private static function parse_routes($path)
	{
		$path = trim($path,"/");
		if($path == '')
		{
			self::$get['controller'] = config::get("router.default_controller",'welcome');
			self::$get['method'] = config::get("router.default_method",'index');
		}else{
			if(strpos($path,"&") || strpos($path,"=") || count($_GET) > 0)
			{
				self::$get['controller'] = $_GET[config::get("controller_tag","module")] ? $_GET[config::get("controller_tag","module")] : config::get("router.default_controller",'welcome');
				self::$get['method'] = $_GET[config::get("method_tag","act")] ? $_GET[config::get("method_tag","act")] : config::get("router.default_method",'index');
			}else{
				
				$router = config::get("router.rule");

				if(isset($router[$path]))
				{
					self::set_request(explode("/",$router[$path]));
					return ;
				}

				foreach((array)$router as $key => $val)
				{
					$key = str_replace(':any', '.+', str_replace(':num', '[0-9]+', $key));
					if (preg_match('#^'.$key.'$#', $path))
					{	
						if (strpos($val, '$') !== FALSE AND strpos($key, '(') !== FALSE)
						{
							$val = preg_replace('#^'.$key.'$#', $val, $path);
						}
						self::set_request(explode('/', $val));		
						return;
					}
				}
				
				self::set_request(explode('/', $path));
			}
		}
	}
	
	public static function create_routes($uri)
	{
		$router = array_flip(config::get("router.rule"));
		$uri = trim($uri,"/");
		if(isset($router[$uri]))
		{
			return $router[$uri];
		}

		foreach((array)$router as $key => $val)
		{
			$key = preg_replace('#\\$+\d{1,2}#', '([^/]+)', $key);
			
			if (preg_match_all('#^'.$key.'$#', $uri ,$out))
			{
				$_val = preg_split('#\([^_\(\)]*\)#',$val);
				for($i=0,$n=count($_val);$i<$n;$i++)
				{
					$str .= $_val[$i].$out[$i+1][0];
				}
				return $str;
			}
		}
				
		return $uri;
	}
	
}
?>