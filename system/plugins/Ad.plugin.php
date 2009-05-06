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
	
	function getImageHtmlStr()
	{
		$content = $this->ads->getContent();
		$html  = '<ul class="ad_image">';
		for($i=0,$n=count($content);$i<$n;$i++){
			$html .= '	<li><a href="'.$content[$i][url].'" target="_blank"><img src="'.site_path("up_files/".$content[$i][image]).'" alt="'.$content[$i][des].'" border="0" width="'.$content["config"]["width"].'" height="'.$content["config"]["height"].'" /></a></li>';
		}
		$html .= '</ul>';	
	}
}
?>