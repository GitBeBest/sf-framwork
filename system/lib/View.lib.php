<?php

class view
{
	private $viewData = array();
	private $viewTpl = array();
	
	public function __construct(){}
	
	public function set($key,$val='')
	{
		if(is_array($key)) $this->viewData = array_merge_recursive($this->viewData,$key);
		else $this->viewData[$key] = $val;
	}
	
	public function load($tpl,$data=array())
	{
		$data && $this->set($data);
		$tpl && $this->viewTpl[] = $tpl;
	}
	
	public function display()
	{
		extract($this->viewData);
		ob_start();
		foreach($this->viewTpl as $file)
		{
			if(is_file(config::get("view_dir").$file.".php")){
				@include_once(config::get("view_dir").$file.".php");
			}elseif(is_file(SYSTEMPATH."view/".$file.".php")){
				@include_once(SYSTEMPATH."view/".$file.".php");
			}
		}
		$str = ob_get_contents();
		ob_end_clean();
		echo $str;
	}
}
?>