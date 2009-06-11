<?php
/**
 * 类名：sfException
 * 功能：错误友好处理
 */
class sfException extends Exception
{
    /**
	 * 以字符串输出对象
	 */
	public function __toString() {
        return $this->halt();
    }
	
	/**
	 * 显示错误信息
	 */
	public function show()
	{
		$title = lang::get("System notes:");
		$msg = $this->getMessage();
		$more = $this->getFile().":".$this->getLine();
		$trace = nl2br($this->getTraceAsString());
		ob_start();
		if(is_file(APPPATH."error/error.php")) include_once(APPPATH."error/error.php");
		else include_once(SYSTEMPATH."error/error.php");
		ob_end_flush();
	}
	
	/**
	 * 显示错误信息并停止程序执行
	 */
	public function halt()
	{
		$title = lang::get("System notes:");
		$msg = $this->getMessage();
		$more = $this->getFile().":".$this->getLine();
		$trace = nl2br($this->getTraceAsString());
		ob_start();
		if(is_file(APPPATH."error/error.php")) include_once(APPPATH."error/error.php");
		else include_once(SYSTEMPATH."error/error.php");
		ob_end_flush();
		exit;
	}
}

?>