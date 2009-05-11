<?php
/**
 * 标签管理插件
 */
class Tag
{
	/**
	 * 取得数字型参数
	 */
	public static function getInt($num=0,$default=0,$agrs=array())
	{
		!$agrs && $agrs = func_get_args();
		if($result = (int)$agrs[$num]) return $result;
		else return $default;
	}
	
	/**
	 * 取得字符型参数
	 */
	public static function getChar($num=0,$default='',$agrs=array())
	{
		!$agrs && $agrs = func_get_args();
		if($result = $agrs[$num]) return $result;
		else return $default;
	}
	/**
	 * 取得分类树(新闻、产品等有分类的都可以调用)
	 */
	public static function selectTreeByTypeStr()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//取得模板内容
		$addWhere = $addSql = $htmlStr = '';//初始化
		//取得分类信息
		$result = sf::getModel("categorys",0,Tag::getChar(1,'article',$agrs))->selectAll($addWhere,$addSql,Tag::getInt(2,5,$agrs));
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得页面列表
	 */
	public static function selectPageByTypeStr()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//取得模板内容
		$addWhere = $addSql = $htmlStr = '';
		Tag::getChar(1,'',$agrs) && $addWhere .= "`type_str` = '".Tag::getChar(1,'',$agrs)."' ";
		$addSql = "ORDER BY `updated_at` DESC";
		$result = sf::getModel("pages")->selectAll($addWhere,$addSql,Tag::getInt(2,5,$agrs));
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得指定分类的文章列表
	 */
	public static function selectArticleByCategoryId()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//取得模板内容
		$addWhere = $addSql = $htmlStr = '';//初始化
		$category = sf::getModel("categorys",Tag::getInt(1,0,$agrs));//取得分类信息
		//取得文章列表
		$addWhere .= "`is_public` > 0 ";
		Tag::getInt(1,0,$agrs) && $addWhere .= "AND `category_id` = '".Tag::getInt(1,0,$agrs)."' ";
		$addSql = "ORDER BY `is_top` DESC,`updated_at` DESC";
		$result = sf::getModel("articles")->selectAll($addWhere,$addSql,Tag::getInt(2,5,$agrs));
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得置顶文章列表
	 */
	public static function selectArticleTopByTypeStr()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//取得模板内容
		$addWhere = $addSql = '';
		Tag::getChar(1,'',$agrs) && $addWhere .= "`type_str` = '".Tag::getChar(1,'',$agrs)."' ";
		$addSql = "ORDER BY is_top DESC,updated_at DESC";
		$result = sf::getModel("articles")->selectAll($addWhere,$addSql,Tag::getInt(2,5,$agrs));
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得热点文章列表
	 */
	public static function selectArticleHotByTypeStr()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//取得模板内容
		$addWhere = $addSql = '';
		Tag::getChar(1,'',$agrs) && $addWhere .= "`type_str` = '".Tag::getChar(1,'',$agrs)."' ";
		$addSql = "ORDER BY is_hot DESC,updated_at DESC";
		$result = sf::getModel("articles")->selectAll($addWhere,$addSql,Tag::getInt(2,5,$agrs));
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得最新文章列表
	 */
	public static function selectArticleByTypeStr()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//取得模板内容
		$addWhere = $addSql = '';
		Tag::getChar(1,'',$agrs) && $addWhere .= "`type_str` = '".Tag::getChar(1,'',$agrs)."' ";
		$addSql = "ORDER BY `updated_at` DESC";
		$result = sf::getModel("articles")->selectAll($addWhere,$addSql,Tag::getInt(2,5,$agrs));
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得图片文章列表
	 */
	public static function selectImageArticleByTypeStr()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//取得模板内容
		$addWhere = $addSql = '';
		Tag::getChar(1,'',$agrs) && $addWhere .= "`type_str` = '".Tag::getChar(1,'',$agrs)."' ";
		$addSql = "ORDER BY `cover` DESC,`updated_at` DESC";
		$result = sf::getModel("articles")->selectAll($addWhere,$addSql,Tag::getInt(2,5,$agrs));
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得置顶产品列表
	 */
	public static function selectProductTopByTypeStr()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//取得模板内容
		$addWhere = $addSql = $htmlStr = '';
		Tag::getChar(1,'',$agrs) && $addWhere .= "`type_str` = '".Tag::getChar(1,'',$agrs)."' ";
		$addSql = "ORDER BY `is_top` DESC,`updated_at` DESC";
		$result = sf::getModel("products")->selectAll($addWhere,$addSql,Tag::getInt(2,5,$agrs));
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得热点产品列表
	 */
	public static function selectProductHotByTypeStr()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//取得模板内容
		$addWhere = $addSql = $htmlStr = '';
		Tag::getChar(1,'',$agrs) && $addWhere .= "`type_str` = '".Tag::getChar(1,'',$agrs)."' ";
		$addSql = "ORDER BY `is_hot` DESC,`updated_at` DESC";
		$result = sf::getModel("products")->selectAll($addWhere,$addSql,Tag::getInt(2,5,$agrs));
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得最新产品列表
	 */
	public static function selectProductByTypeStr()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//取得模板内容
		$addWhere = $addSql = $htmlStr = '';
		Tag::getChar(1,'',$agrs) && $addWhere .= "`type_str` = '".Tag::getChar(1,'',$agrs)."' ";
		$addSql = "ORDER BY `updated_at` DESC";
		$result = sf::getModel("products")->selectAll($addWhere,$addSql,Tag::getInt(2,5,$agrs));
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * 取得指定分类产品列表
	 */
	public static function selectProductByCategoryId()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//取得模板内容
		$addWhere = $addSql = '';
		Tag::getInt(1,0,$agrs) && $addWhere .= "`category_id` = '".Tag::getInt(1,0,$agrs)."' ";
		$addSql = "ORDER BY `updated_at` DESC";
		$result = sf::getModel("products")->selectAll($addWhere,$addSql,Tag::getInt(2,5,$agrs));
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
}
?>