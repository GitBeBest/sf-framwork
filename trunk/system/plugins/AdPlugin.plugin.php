<?php
class AdPlugin
{
	private $ads = NULL;
	
	function generate($id=0)
	{
		$this->ads = sf::getModel("ads",$id);
		switch($this->ads->getTypeStr())
		{
			case 'image':
				return $this->getImageHtmlStr();
			break;
			case 'text':
				return $this->getTextHtmlStr();
			break;
			case 'flash':
				return $this->getFlashHtmlStr();
			break;
			case 'magic':
				return $this->getMagicHtmlStr();
			break;
			case 'code':
				return $this->getCodeHtmlStr();
			break;
			default:
				return '';
			break;
		}
	}
	
	/**
	 * 图片型广告
	 */
	function getImageHtmlStr()
	{
		$content = $this->ads->getContent();
		$htmlStr  = '<ul class="ad_image">';
		for($i=0,$n=count($content);$i<$n;$i++){
			if(!$content[$i][image]) continue;
			$htmlStr .= '	<li><a href="'.$content[$i][url].'" target="_blank"><img src="'.site_path("up_files/".$content[$i][image]).'" alt="'.$content[$i][des].'" border="0" width="'.$content["config"]["width"].'" height="'.$content["config"]["height"].'" /></a></li>';
		}
		$htmlStr .= '</ul>';
		return $htmlStr;
	}
	
	/**
	 * 文字型
	 */
	function getTextHtmlStr()
	{
		$content = $this->ads->getContent();
		$htmlStr  = '<ul class="ad_text">';
		for($i=0,$n=count($content);$i<$n;$i++){
			if(!$content[$i][text]) continue;
			$htmlStr .= '	<li><a href="'.$content[$i][url].'" target="_blank" title="'.$content[$i]["des"].'">'.$content[$i]["text"].'</a></li>';
		}
		$htmlStr .= '</ul>';
		return $htmlStr;
	}
	
	/**
	 * flash
	 */
	function getFlashHtmlStr()
	{
		$content = $this->ads->getContent();
		if(!$content["flash"]) return;
		
		$htmlStr  = '<div class="ad_flash">';
		$htmlStr .= '	<embed menu="true" loop="true" play="true" type="application/x-shockwave-flash" height="'.$content["config"]["height"].'" width="'.$content["config"]["width"].'" src="'.site_path("up_files/".$content["flash"]).'"></embed>';
		$htmlStr .= '</div>';
		return $htmlStr;
	}
	
	/**
	 * 幻灯型
	 */
	function getMagicHtmlStr()
	{
		$pic = $link = $text = $content = array();
		$content = $this->ads->getContent();
		
		for($i=0,$n=count($content);$i<$n;$i++)
		{
			if(!$content[$i]["image"]) continue;
			$pic[] = site_path("up_files/".$content[$i]["image"]);
			$link[] = $content[$i]["url"];
			$text[] = $content[$i]["des"];
		}
		$str = 'pics='.implode("|",$pic).'&'.implode("|",$link).'&'.implode("|",$text).'&&borderwidth='.$content["config"]["width"].'&borderheight='.$content["config"]["height"].'&textheight='.$content["config"]["textheight"];
		$htmlStr  = '<div class="ad_magic">';
		$htmlStr .= '<embed src="'.site_path("images/tools/pix.swf").'" wmode="opaque" FlashVars="'.$str.'" menu="false" bgcolor="'.$content["config"]["bgcolor"].'" quality="high" width="'.$content["config"]["width"].'" height="'.$content["config"]["height"].'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />';
		$htmlStr .= '</div>';
		return $htmlStr;
	}
	
	/**
	 * 代码类型
	 */
	function getCodeHtmlStr()
	{
		$content = $this->ads->getContent();
		if(!$content["code"]) return;
		return str_replace("\'","'",str_replace('\"','"',$content["code"]));
	}
}
?>