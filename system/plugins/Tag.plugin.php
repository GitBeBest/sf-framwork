<?php
/**
 * ��ǩ������
 */
class Tag
{	
	function outTag($template_id = 0)
	{
		//ȡ��ģ������
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());
		$addWhere = $addSql = '';
		$type && $addWhere .= "`type_str` = '".$type."' ";
		$addSql = "ORDER BY `cover` DESC,is_hot DESC,updated_at DESC";
		
		$result = sf::getModel("articles")->selectAll($addWhere,$addSql,$showMax);
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
}
?>