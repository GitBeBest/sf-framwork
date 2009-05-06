<?php
/**
 * ȡ�÷����SELECT�ؼ�
 */
 function getSelectForCategory($type='default',$name='select',$selectValue='',$extStr='')
 {
 	$htmlStr  = '<select name="'.$name.'" id="'.$name.'" '.$extStr.'>';
	$htmlStr .= '	<option value="0">'.lang::get("--Select a category--").'</option>';
	$result = sf::getModel("categorys",0,$type)->selectAll();
	while($category = $result->getObject()){
		if($category->getId() == $selectValue) $htmlStr .= '	<option value="'.$category->getId().'" selected="selected">'.$category->getSubject().'</option>';
		else $htmlStr .= '	<option value="'.$category->getId().'">'.$category->getHeadStr().$category->getSubject().'</option>';
	}
	$htmlStr .= '</select>';
	return $htmlStr;
 }
 
 /**
 * ȡ��ҳ���б�
 */
 function selectPageListByTypeStr($type='default',$showMax=5)
 {
 	$addWhere = $addSql = $htmlStr = '';
	$type && $addWhere .= "`type_str` = '".$type."' ";
	$addSql = "ORDER BY updated_at DESC";
	$pages = sf::getModel("pages")->selectAll($addWhere,$addSql,$showMax);
	$htmlStr .= '<ul class="selectPageListByTypeStr">'."\r\n";
	while($page = $pages->getObject()){
        $htmlStr .= '	<li>'.link_to("page/index/type/".$page->getTypeStr()."/id/".$page->getId(),$page->getSubject(12)).'</li>';
	}
	$htmlStr .= '</ul>';
	return $htmlStr;
 }
 
 /**
  * ȡ��ָ������������б�
  */
 function selectArticleListHtmlByCategoryId($name='',$category_id=0,$showMax=5)
 {
	$addWhere = $addSql = $htmlStr = '';//��ʼ��
	!$name && $name = time().rand(1,99);//ȡ�ò�id
	//ȡ�÷�����Ϣ
	$category = sf::getModel("categorys",$category_id);
	$htmlStr .= '<div id="'.$name.'" class="ArticleListHtmlByCategoryId">'."\r\n";
	$htmlStr .= '	<h1><em>'.link_to("article/category/type/".$category->getType()."/id/".$category->getId(),lang::get('more')).'</em>'.$category->getSubject()."</h1>\r\n<ul>\r\n";
	//ȡ�������б�
	$addWhere .= "`is_public` > 0 ";
	$category_id && $addWhere .= "AND `category_id` = '".$category_id."' ";
	$addSql = "ORDER BY `is_top` DESC,`updated_at` DESC";
	$result = sf::getModel("articles")->selectAll($addWhere,$addSql,$showMax);
	while($article = $result->getObject()){
        $htmlStr .= '	<li>'.link_to("article/show/type/".$article->getTypeStr()."/id/".$article->getId(),$article->getSubject(),array('target'=>'_blank'))."</li>\r\n";
	}
	$htmlStr .= "</ul>\r\n";
	$htmlStr .= "</div>";
	return $htmlStr;
 }
 
 /**
  * ȡ�����ŷ���
  */
 function selectArticleTreeByTypeStr($name='',$type='',$showMax=0)
 {
	!$name && $name = time().rand(1,99);//ȡ�ò�id
	//ȡ�÷�����Ϣ
	$result = sf::getModel("categorys",0,$type)->selectAll('','',$showMax);
	$htmlStr .= '<ul class="selectTreeByTypeStr">'."\r\n";
	while($category = $result->getObject()){
        $htmlStr .= '	<li class="category_level_'.$category->getLevel().'">'.link_to("article/category/type/".$category->getType()."/id/".$category->getId(),$category->getSubject())."</li>\r\n";
	}
	$htmlStr .= "</ul>";
	return $htmlStr;
 }
 
 /**
 * ȡ���ö�����
 */
 function selectArticleTopByTypeStr($type='default',$showMax=5,$subjectLen=12)
 {
 	$addWhere = $addSql = '';
	$type && $addWhere .= "`type_str` = '".$type."' ";
	$addSql = "ORDER BY is_top DESC,updated_at DESC";
	
	$result = sf::getModel("articles")->selectAll($addWhere,$addSql,$showMax);
	$htmlStr .= '<ul class="selectArticleTopByTypeStr">'."\r\n";
	while($article = $result->getObject())
	{
		$htmlStr .= '	<li>'.link_to("article/show/type/".$article->getTypeStr()."/id/".$article->getId(),$article->getSubject($subjectLen),array('target'=>'_blank'))."</li>\r\n";
	}
	$htmlStr .= "</ul>";
	return $htmlStr;
 }
 
/**
 * ȡ��ͷ��ͷ������(�ȵ�����)
 */
 function selectArticleForHomeFirst($type='default',$showMax=9,$subjectLen=12)
 {
 	$addWhere = $addSql = '';
	$type && $addWhere .= "`type_str` = '".$type."' ";
	$addSql = "ORDER BY `cover` DESC,is_hot DESC,updated_at DESC";
	
	$result = sf::getModel("articles")->selectAll($addWhere,$addSql,$showMax);
	//ȡ����һ��
	if($first = $result->getObject())
	{
		$htmlStr .= '<div class="selectArticleForHomeFirstFirst">'."\r\n";
		$htmlStr .= '<img src="'.site_path("up_files/".$first->getCover()).'"/>'."\r\n";
		$htmlStr .= '<h1>'.link_to("article/show/type/".$first->getTypeStr()."/id/".$first->getId(),$first->getSubject($subjectLen),array('target'=>'_blank')).'</h1>'."\r\n";
		$htmlStr .= "</div>\r\n";
	}
	$htmlStr .= '<ul class="selectArticleForHomeFirstList">'."\r\n";
	while($article = $result->getObject())
	{
		$htmlStr .= '	<li>'.link_to("article/show/type/".$article->getTypeStr()."/id/".$article->getId(),$article->getSubject($subjectLen),array('target'=>'_blank'))."</li>\r\n";
	}
	$htmlStr .= "</ul>";
	return $htmlStr;
 }
 
 /**
  * ȡ�ò�Ʒ����
  */
 function selectProductTreeByTypeStr($name='',$type='',$showMax=0)
 {
	!$name && $name = time().rand(1,99);//ȡ�ò�id
	//ȡ�÷�����Ϣ
	$result = sf::getModel("categorys",0,$type)->selectAll('','',$showMax);
	$htmlStr .= '<ul class="selectTreeByTypeStr">'."\r\n";
	while($category = $result->getObject()){
        $htmlStr .= '	<li class="category_level_'.$category->getLevel().'">'.link_to("product/index/type/".$category->getType()."/id/".$category->getId(),$category->getSubject())."</li>\r\n";
	}
	$htmlStr .= "</ul>";
	return $htmlStr;
 }
 
 /**
 * ȡ���ö���Ʒ
 */
 function selectProductTopByTypeStr($type='default',$showMax=5,$subjectLen=8)
 {
 	$addWhere = $addSql = '';
	$type && $addWhere .= "`type_str` = '".$type."' ";
	$addSql = "ORDER BY is_top DESC,updated_at DESC";
	
	$result = sf::getModel("products")->selectAll($addWhere,$addSql,$showMax);
	$htmlStr .= '<ul class="selectProductTopByTypeStr">'."\r\n";
	while($product = $result->getObject())
	{
		$htmlStr .= '	<li><img src="'.site_path("up_files/".$product->getCover()).'" width="84" height="58" onerror="this.src=\''.site_path("images/cp01.jpg").'\'" /><h1>'.link_to("product/show/type/".$product->getTypeStr()."/id/".$product->getId(),$product->getSubject($subjectLen),array('target'=>'_blank'))."</h1><p>".$product->getBrief()."</p></li>\r\n";
	}
	$htmlStr .= "</ul>";
	return $htmlStr;
 }
 
/**
 * ȡ���ö���Ʒ
 */
 function selectProductWithImgAndSubjectByCategoryId($categoryId='0',$showMax=5,$subjectLen=10)
 {
 	$addWhere = $addSql = '';
	$type && $addWhere .= "`type_str` = '".$type."' ";
	$categoryId && $addWhere .= "`category_id` = '".$categoryId."' ";
	$addSql = "ORDER BY updated_at DESC";
	
	$result = sf::getModel("products")->selectAll($addWhere,$addSql,$showMax);
	$htmlStr .= '<ul class="selectProductWithImgAndSubjectByCategoryId">'."\r\n";
	while($product = $result->getObject())
	{
		$htmlStr .= '	<li><img src="'.site_path("up_files/".$product->getCover()).'" onerror="this.src=\''.site_path("images/cp01.jpg").'\'" /><h1>'.link_to("product/show/type/".$product->getTypeStr()."/id/".$product->getId(),$product->getSubject($subjectLen),array('target'=>'_blank'))."</h1></li>\r\n";
	}
	$htmlStr .= "</ul>";
	return $htmlStr;
 }
 
 function test($tpl=1,$showMax=6)
 {
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
 
?>