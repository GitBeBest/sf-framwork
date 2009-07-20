<?php
/** 
 * 类名：缓存类
 * 功能：完成系统的缓存功能
 * $Id$
 */ 

class Cache
{

    private static $cache_dir;// 缓存目录
	private static $cache_time = 3600;// 缓存时间

    /**
     * 构造函数
     *
     */
    function __construct($cache_dir = 'cache',$cache_time = 3600)
    {
        self::setCacheDir($cache_dir);
		self::setCacheTime($cache_time);
    }

    /**
     * 设置缓存目录
     *
     * @param    string   $cache_dir   缓存目录
     */
    public static function setCacheDir($cache_dir)
    {
        self::$cache_dir = $cache_dir;
    }
	
	/**
     * 设置缓存时间
     *
     * @param    string   $cache_dir   缓存目录
     */
    public static function setCacheTime($cache_time)
    {
        self::$cache_time = $cache_time;
    }

    /**
     * 取得所有缓存
     *
     * @param    string   $type   缓存名称
     */
    public static function getCache($type)
    {
        $file_path = self::$cache_dir.'/'.$type.".cache.php";

        if(!file_exists($file_path)) return false;
		//缓存过期则重新生成
		if(time() - filemtime($file_path) > 3600) return false;
        
		require_once($file_path);
        return $_CACHE[$type];
    }

    /**
     * 设置缓存
     *
     * @param    string   $type   缓存名称
     * @param    array    $data   缓存数据
     */
    public static function setCache($type, $data)
    {
        $file_path = trim(self::$cache_dir,"/").'/'.$type.".cache.php";
        
        $str = var_export($data,true);
        $out  = "<?php\r\n";
        $out .= "//cachetime ".date("Y-m-d H:i:s")."\r\n";
        $out .= "\$_CACHE['$type'] = ".$str.";\r\n";
        $out .= "?>";

        $fp = fopen($file_path, 'w');
        fwrite($fp, $out);
        fclose($fp);

        return $file_path;
    }
}
?>