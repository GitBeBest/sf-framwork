<?php
/**
 * 类名：router
 * 功能：处理系统访问路由（解析URL含义）
 * $Id$
 */
class router
{
	private static $uri_string = '';
	private static $get = array();//存放解析的URL内容
	private static $folder = '';//控制器目录
	
	/**
	 * 返回控制器目录
	 */
	public static function getFolder()
	{
		return self::$folder;
	}
	
	/**
	 * 返回控制器名称
	 */
	public static function getController()
	{
		return self::$get['controller'];
	}
	
	/**
	 * 返回指定参数值
	 */
	public static function get($key='')
	{
		if($key) return self::$get[$key];
		else return self::$get;
	}
	
	/**
	 * 返回控制器当前方法
	 */
	public static function getMethod()
	{
		return self::$get['method'];
	}
	
	/**
	 * 取得PATH_INFO以备使用
	 */
	public static function getUri()
	{
		return self::$uri_string;
	}
	
	/**
	 * 解吸PATH_INFO
	 */
	public static function parse()
	{
		self::get_uri_string();
		self::parse_routes(self::$uri_string);
		$_GET = array_merge($_GET,self::$get);//将解析内容放置到GET变量中
		return self::$get;
	}
	
	/**
	 * 将PATH_INFO解析结果放到指定容器中
	 */
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
	
	/**
	 * 获取URI-STRING
	 */
	public static function get_uri_string()
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
	
	/**
	 * 解析路由配置表
	 */
	private static function parse_routes($path)
	{
		$path = trim($path,"/");
		if($path == '')//如果没有传递参数，直接调用默认控制器和默认方法
		{
			self::$get['controller'] = config::get("router.default_controller",'welcome');
			self::$get['method'] = config::get("router.default_method",'index');
		}else{//解析QUERY——STRING方式的传递参数
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
				//正则URL，解析出真实的参数
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
						config::set("auto_create_html",true);//如果是为静态也面，则标记可以生成静态页面	
						return;
					}
				}
				
				self::set_request(explode('/', $path));//将解析参数设置到指定的容器
			}
		}
	}
	
	/**
	 * 根据路由表创建路由连接
	 */
	public static function create_routes($uri)
	{
		$router = array_flip((array)config::get("router.rule"));//取得路由表
		$uri = trim($uri,"/");//过滤末尾的/
		if(isset($router[$uri]))
		{
			return $router[$uri];//如果直接匹配就直接返回
		}
		//以下是正则路由匹配路由
		foreach((array)$router as $key => $val)
		{
			$key = preg_replace('#\\$+\d{1,2}#', '([^/]+)', $key);
			
			if (preg_match_all('#^'.$key.'$#', $uri ,$out))//如果正则匹配成功，则处理路由匹配
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