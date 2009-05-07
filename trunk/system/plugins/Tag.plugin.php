<?php
/**
 * 标签管理插件
 */
class Tag
{	
	function outTag($template_id = 0)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//取得模板内容
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
	
	/**
	 * 取得分类树(新闻\产品等有分类的都可以调用)
	 */
	public static function selectTreeByTypeStr($tpl=0,$type='article',$showMax=0)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//取得模板内容
		$addWhere = $addSql = $htmlStr = '';//初始化
		//取得分类信息
		$result = sf::getModel("categorys",0,$type)->selectAll($addWhere,$addSql,$showMax);
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得页面列表
	 */
	public static function selectPageByTypeStr($tpl=0,$type='default',$showMax=5)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//取得模板内容
		$addWhere = $addSql = $htmlStr = '';
		$type && $addWhere .= "`type_str` = '".$type."' ";
		$addSql = "ORDER BY `updated_at` DESC";
		$result = sf::getModel("pages")->selectAll($addWhere,$addSql,$showMax);
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得指定分类的文章列表
	 */
	public static function selectArticleByCategoryId($tpl=0,$category_id=0,$showMax=5)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//取得模板内容
		$addWhere = $addSql = $htmlStr = '';//初始化
		$category = sf::getModel("categorys",$category_id);//取得分类信息
		//取得文章列表
		$addWhere .= "`is_public` > 0 ";
		$category_id && $addWhere .= "AND `category_id` = '".$category_id."' ";
		$addSql = "ORDER BY `is_top` DESC,`updated_at` DESC";
		$result = sf::getModel("articles")->selectAll($addWhere,$addSql,$showMax);
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得置顶文章列表
	 */
	public static function selectArticleTopByTypeStr($tpl=0,$type='default',$showMax=5)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//取得模板内容
		$addWhere = $addSql = '';
		$type && $addWhere .= "`type_str` = '".$type."' ";
		$addSql = "ORDER BY is_top DESC,updated_at DESC";
		$result = sf::getModel("articles")->selectAll($addWhere,$addSql,$showMax);
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得热点文章列表
	 */
	public static function selectArticleHotByTypeStr($tpl=0,$type='default',$showMax=5)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//取得模板内容
		$addWhere = $addSql = '';
		$type && $addWhere .= "`type_str` = '".$type."' ";
		$addSql = "ORDER BY is_hot DESC,updated_at DESC";
		$result = sf::getModel("articles")->selectAll($addWhere,$addSql,$showMax);
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得最新文章列表
	 */
	public static function selectArticleByTypeStr($tpl=0,$type='default',$showMax=5)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//取得模板内容
		$addWhere = $addSql = '';
		$type && $addWhere .= "`type_str` = '".$type."' ";
		$addSql = "ORDER BY `updated_at` DESC";
		$result = sf::getModel("articles")->selectAll($addWhere,$addSql,$showMax);
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得图片文章列表
	 */
	public static function selectImageArticleByTypeStr($tpl=0,$type='default',$showMax=5)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//取得模板内容
		$addWhere = $addSql = '';
		$type && $addWhere .= "`type_str` = '".$type."' ";
		$addSql = "ORDER BY `cover` DESC,`updated_at` DESC";
		$result = sf::getModel("articles")->selectAll($addWhere,$addSql,$showMax);
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得置顶产品列表
	 */
	public static function selectProductTopByTypeStr($tpl=0,$type='default',$showMax=5)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//取得模板内容
		$addWhere = $addSql = $htmlStr = '';
		$type && $addWhere .= "`type_str` = '".$type."' ";
		$addSql = "ORDER BY `is_top` DESC,`updated_at` DESC";
		$result = sf::getModel("products")->selectAll($addWhere,$addSql,$showMax);
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得热点产品列表
	 */
	public static function selectProductHotByTypeStr($tpl=0,$type='default',$showMax=5)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//取得模板内容
		$addWhere = $addSql = $htmlStr = '';
		$type && $addWhere .= "`type_str` = '".$type."' ";
		$addSql = "ORDER BY `is_hot` DESC,`updated_at` DESC";
		$result = sf::getModel("products")->selectAll($addWhere,$addSql,$showMax);
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得最新产品列表
	 */
	public static function selectProductByTypeStr($tpl=0,$type='default',$showMax=5)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//取得模板内容
		$addWhere = $addSql = $htmlStr = '';
		$type && $addWhere .= "`type_str` = '".$type."' ";
		$addSql = "ORDER BY `updated_at` DESC";
		$result = sf::getModel("products")->selectAll($addWhere,$addSql,$showMax);
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得指定分类产品列表
	 */
	public static function selectProductByCategoryId($categoryId='0',$showMax=5,$subjectLen=10)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//取得模板内容
		$addWhere = $addSql = '';
		$type && $addWhere .= "`type_str` = '".$type."' ";
		$categoryId && $addWhere .= "`category_id` = '".$categoryId."' ";
		$addSql = "ORDER BY `updated_at` DESC";
		$result = sf::getModel("products")->selectAll($addWhere,$addSql,$showMax);
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
}
?>