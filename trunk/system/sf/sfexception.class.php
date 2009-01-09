<?php
/**
 * 类名：错误处理
 * 功能：处理系统错误
 *
 */
class sfException extends Exception
{
    public function __toString() {
        return $this->halt();
    }
	
	/**
	 * 显示错误信息，程序继续执行
	 *
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
	 * 显示错误信息，程序停止执行
	 *
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