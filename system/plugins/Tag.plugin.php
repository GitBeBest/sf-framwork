<?php
/**
 * ��ǩ������
 */
class Tag
{
	/**
	 * ȡ�������Ͳ���
	 */
	public static function getInt($num=0,$default=0,$agrs=array())
	{
		!$agrs && $agrs = func_get_args();
		if($result = (int)$agrs[$num]) return $result;
		else return $default;
	}
	
	/**
	 * ȡ���ַ��Ͳ���
	 */
	public static function getChar($num=0,$default='',$agrs=array())
	{
		!$agrs && $agrs = func_get_args();
		if($result = $agrs[$num]) return $result;
		else return $default;
	}
	/**
	 * ȡ�÷�����(���š���Ʒ���з���Ķ����Ե���)
	 */
	public static function selectTreeByTypeStr()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//ȡ��ģ������
		$addWhere = $addSql = $htmlStr = '';//��ʼ��
		//ȡ�÷�����Ϣ
		$result = sf::getModel("categorys",0,Tag::getChar(1,'article',$agrs))->selectAll($addWhere,$addSql,Tag::getInt(2,5,$agrs));
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * ȡ��ҳ���б�
	 */
	public static function selectPageByTypeStr()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//ȡ��ģ������
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
	 * ȡ��ָ������������б�
	 */
	public static function selectArticleByCategoryId()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//ȡ��ģ������
		$addWhere = $addSql = $htmlStr = '';//��ʼ��
		$category = sf::getModel("categorys",Tag::getInt(1,0,$agrs));//ȡ�÷�����Ϣ
		//ȡ�������б�
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
	 * ȡ���ö������б�
	 */
	public static function selectArticleTopByTypeStr()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//ȡ��ģ������
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
	 * ȡ���ȵ������б�
	 */
	public static function selectArticleHotByTypeStr()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//ȡ��ģ������
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
	 * ȡ�����������б�
	 */
	public static function selectArticleByTypeStr()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//ȡ��ģ������
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
	 * ȡ��ͼƬ�����б�
	 */
	public static function selectImageArticleByTypeStr()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//ȡ��ģ������
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
	 * ȡ���ö���Ʒ�б�
	 */
	public static function selectProductTopByTypeStr()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//ȡ��ģ������
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
	 * ȡ���ȵ��Ʒ�б�
	 */
	public static function selectProductHotByTypeStr()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//ȡ��ģ������
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
	 * ȡ�����²�Ʒ�б�
	 */
	public static function selectProductByTypeStr()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//ȡ��ģ������
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
	 * ȡ��ָ�������Ʒ�б�
	 */
	public static function selectProductByCategoryId()
	{
		$agrs = func_get_args();
		$content = stripslashes(sf::getModel("templates",Tag::getInt(0,0,$agrs))->getContent());//ȡ��ģ������
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