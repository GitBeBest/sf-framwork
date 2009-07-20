<?php
/** 
 * ������������
 * ���ܣ����ϵͳ�Ļ��湦��
 * $Id$
 */ 

class Cache
{

    private static $cache_dir;// ����Ŀ¼
	private static $cache_time = 3600;// ����ʱ��

    /**
     * ���캯��
     *
     */
    function __construct($cache_dir = 'cache',$cache_time = 3600)
    {
        self::setCacheDir($cache_dir);
		self::setCacheTime($cache_time);
    }

    /**
     * ���û���Ŀ¼
     *
     * @param    string   $cache_dir   ����Ŀ¼
     */
    public static function setCacheDir($cache_dir)
    {
        self::$cache_dir = $cache_dir;
    }
	
	/**
     * ���û���ʱ��
     *
     * @param    string   $cache_dir   ����Ŀ¼
     */
    public static function setCacheTime($cache_time)
    {
        self::$cache_time = $cache_time;
    }

    /**
     * ȡ�����л���
     *
     * @param    string   $type   ��������
     */
    public static function getCache($type)
    {
        $file_path = self::$cache_dir.'/'.$type.".cache.php";

        if(!file_exists($file_path)) return false;
		//�����������������
		if(time() - filemtime($file_path) > 3600) return false;
        
		require_once($file_path);
        return $_CACHE[$type];
    }

    /**
     * ���û���
     *
     * @param    string   $type   ��������
     * @param    array    $data   ��������
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