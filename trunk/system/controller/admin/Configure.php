<?php
class configure extends controller
{		
	function index()
	{
		if(input::getInput("post.site"))
		{
			$htmlStr = $this->getHtmlStr(input::getInput("post.site"));
			file_put_contents(APPPATH."config/Config.config.php","<?php\r\n".'return '.$htmlStr.";\r\n?>");
			$this->page_debug(lang::get('Has been save!'),getFromUrl());
		}
		view::apply("inc_body","admin/configure/index");
		view::display("admin/page");
	}
	
	function getHtmlStr($array,$level=1)
	{
		$space = '';
		for($i=0;$i<$level;$i++) $space .= '	';
		$htmlStr = "array(\r\n";
		foreach($array as $key => $val)
		{
			if(is_array($val)){
				$htmlStr .= $space ."'$key' => ".$this->getHtmlStr($val,$level+1).",\r\n";
			}else{
				$htmlStr .= $space ."'$key' => '$val',\r\n";	
			}
		}
		$htmlStr .= $space .")";
		return $htmlStr;
	}
	
}
?>