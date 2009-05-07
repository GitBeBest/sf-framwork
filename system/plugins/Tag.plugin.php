<?php
/**
 * ��ǩ������
 */
class Tag
{	
	function outTag($template_id = 0)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//ȡ��ģ������
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
	 * ȡ�÷�����(����\��Ʒ���з���Ķ����Ե���)
	 */
	public static function selectTreeByTypeStr($tpl=0,$type='article',$showMax=0)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//ȡ��ģ������
		$addWhere = $addSql = $htmlStr = '';//��ʼ��
		//ȡ�÷�����Ϣ
		$result = sf::getModel("categorys",0,$type)->selectAll($addWhere,$addSql,$showMax);
		ob_start();
		eval("?>$content<?php ");
		$htmlStr = ob_get_contents();
		ob_end_clean();
		return $htmlStr;
	}
	
	/**
	 * ȡ��ҳ���б�
	 */
	public static function selectPageByTypeStr($tpl=0,$type='default',$showMax=5)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//ȡ��ģ������
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
	 * ȡ��ָ������������б�
	 */
	public static function selectArticleByCategoryId($tpl=0,$category_id=0,$showMax=5)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//ȡ��ģ������
		$addWhere = $addSql = $htmlStr = '';//��ʼ��
		$category = sf::getModel("categorys",$category_id);//ȡ�÷�����Ϣ
		//ȡ�������б�
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
	 * ȡ���ö������б�
	 */
	public static function selectArticleTopByTypeStr($tpl=0,$type='default',$showMax=5)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//ȡ��ģ������
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
	 * ȡ���ȵ������б�
	 */
	public static function selectArticleHotByTypeStr($tpl=0,$type='default',$showMax=5)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//ȡ��ģ������
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
	 * ȡ�����������б�
	 */
	public static function selectArticleByTypeStr($tpl=0,$type='default',$showMax=5)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//ȡ��ģ������
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
	 * ȡ��ͼƬ�����б�
	 */
	public static function selectImageArticleByTypeStr($tpl=0,$type='default',$showMax=5)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//ȡ��ģ������
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
	 * ȡ���ö���Ʒ�б�
	 */
	public static function selectProductTopByTypeStr($tpl=0,$type='default',$showMax=5)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//ȡ��ģ������
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
	 * ȡ���ȵ��Ʒ�б�
	 */
	public static function selectProductHotByTypeStr($tpl=0,$type='default',$showMax=5)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//ȡ��ģ������
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
	 * ȡ�����²�Ʒ�б�
	 */
	public static function selectProductByTypeStr($tpl=0,$type='default',$showMax=5)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//ȡ��ģ������
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
	 * ȡ��ָ�������Ʒ�б�
	 */
	public static function selectProductByCategoryId($categoryId='0',$showMax=5,$subjectLen=10)
	{
		$content = stripslashes(sf::getModel("templates",$tpl)->getContent());//ȡ��ģ������
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