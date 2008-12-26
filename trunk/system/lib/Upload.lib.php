<?php

class upload
{
    /**
     * 上传的文件信息
     * @var array
     */
    public $uploadFiles = array();
    /**
     * 保存文件路径
     * @var string
     */
    public $saveFilePath;
    /**
     * 最大文件大小
     * @var int
     */
    public $maxFileSize;
    /**
     * 错误信息
     * @var string
     */
    public $lastError;
    /**
     * 默认充许上传的文件类型
     * @var array
     */
    public $allowType = array('gif','jpg','png','bmp');
    /**
     * 最终保存的文件名称
     * @var string
     */
    public $finalFilePath;
    /**
     * 返回已经上传文件的详细信息
     * @var array
     */
    public $saveFileInfo = array();
    /**
     * 构造函数,初始化相关信息,包括文件内容,上传地址,文件最大限制,文件类型
     */
    public function __construct($file="upload",$path="./up_files/",$size= '2097152',$type = '')
    {
        $this->uploadFiles	= $_FILES[$file];
        $this->saveFilePath	= trim($path,"/");
        $this->maxFileSize	= $size;
        ($type != '') && $this->allowType = $type;
    }
	
    public function upload()
    {
        for($i=0;$i<count($this->uploadFiles['name']);$i++)
        {
            if($this->uploadFiles['error'][$i] == 0)
            {
                $name		= $this->uploadFiles['name'][$i];
                $tmpname	= $this->uploadFiles['tmp_name'][$i];
                $size		= $this->uploadFiles['size'][$i];
                $minetype	= $this->uploadFiles['type'][$i];
                $type		= $this->getFileExt($this->uploadFiles['name'][$i]);

                if(!$this->checkSize($size))
                {
                    return new sfException(lang::get("Exceeds the maximum limit!"));
                }
                //检查文件扩展名是否合法
                if(!$this->checkType($type))
                {
                    echo new sfException(lang::get("File type does not allow!"));
                }
                //检测当前文件是否非法提交
                if(!is_uploaded_file($tmpname))
                {
                    echo new sfException(lang::get("Please correct upload!"));
                }
                //移动后的文件名称
                $basename = $this->getBaseName($name,'.'.$type);
                //上传文件重新命名,格式为 UNIX时间戳+4位随机数,生成一个14位文件名
                $savename = time().mt_rand(1000,9999).'.'.$type;
                //创建上传文件的文件夹
                @mkdir($this->saveFilePath);
                $file_name1 = $this->saveFilePath.'/'.date('Y');
                @mkdir($file_name1);
                $file_name2 = $this->saveFilePath.'/'.date('Y').'/'.date('m');
                @mkdir($file_name2);
                //最终组合的文件路径
                $this->finalFilePath = $file_name2.'/'.$savename;
                //把上传的文件从临时目录移到目标目录
                if(!move_uploaded_file($tmpname,$this->finalFilePath))
                {
                    echo new sfException(lang::get("Save error!"));
                }
                //存储已经上传的文件信息
                $this->saveFileInfo[] = array(
                    'name'            => $name,
                    'type'            => $type,
                    'minetype'        => $minetype,
                    'size'            => $size,
                    'savename'    	  => $savename,
                    'path'            => date('Y').'/'.date('m').'/'.$savename,
                );
            }
        }
        //返回上传的文件数量
        return count($this->saveFileInfo);
    }
    /**
     * 取出已上传文件信息,以便进行其它操作
     *
     * @return array
     */
    public function getSaveFileInfo()
    {
        return $this->saveFileInfo;
    }
    /**
     * 检查上传文件大小是否合法
     *
     * @param int $size
     * @return boolean
     */
    private function checkSize($size)
    {
        return ($size > $this->maxFileSize) ? false : true;
    }
    /**
     * 检查文件类型是否合法
     *
     * @param string $etype
     * @return boolean
     */
    private function checkType($etype)
    {
        foreach($this->allowType as $type)
        {
            if(strcasecmp($etype,$type) == 0) return true;
        }
        return false;
    }
    /**
     * 打印信息
     *
     * @param string $msg
     */
    private function printMsg($msg)
    {
        return $msg;
    }
    /**
     * 获取文件的扩展名
     *
     * @param string $filename
     * @return string
     */
    private function getFileExt($filename)
    {
		$ext = pathinfo($filename);
        return $ext['extension'];
    }
    /**
     * 获取文件名
     *
     * @param string $filename
     * @param string $type
     * @return string
     */
    private function getBaseName($filename,$type)
    {
        $basename = basename($filename,$type);
        return $basename;
    }
}
?>