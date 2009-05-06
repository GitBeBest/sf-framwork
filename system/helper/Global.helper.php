<?php
/**
 * 取得分类的SELECT控件
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
 * 取得页面列表
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
  * 取得指定分类的文章列表
  */
 function selectArticleListHtmlByCategoryId($name='',$category_id=0,$showMax=5)
 {
	$addWhere = $addSql = $htmlStr = '';//初始化
	!$name && $name = time().rand(1,99);//取得层id
	//取得分类信息
	$category = sf::getModel("categorys",$category_id);
	$htmlStr .= '<div id="'.$name.'" class="ArticleListHtmlByCategoryId">'."\r\n";
	$htmlStr .= '	<h1><em>'.link_to("article/category/type/".$category->getType()."/id/".$category->getId(),lang::get('more')).'</em>'.$category->getSubject()."</h1>\r\n<ul>\r\n";
	//取得文章列表
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
  * 取得新闻分类
  */
 function selectArticleTreeByTypeStr($name='',$type='',$showMax=0)
 {
	!$name && $name = time().rand(1,99);//取得层id
	//取得分类信息
	$result = sf::getModel("categorys",0,$type)->selectAll('','',$showMax);
	$htmlStr .= '<ul class="selectTreeByTypeStr">'."\r\n";
	while($category = $result->getObject()){
        $htmlStr .= '	<li class="category_level_'.$category->getLevel().'">'.link_to("article/category/type/".$category->getType()."/id/".$category->getId(),$category->getSubject())."</li>\r\n";
	}
	$htmlStr .= "</ul>";
	return $htmlStr;
 }
 
 /**
 * 取得置顶文章
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
 * 取得头板头条新闻(热点新闻)
 */
 function selectArticleForHomeFirst($type='default',$showMax=9,$subjectLen=12)
 {
 	$addWhere = $addSql = '';
	$type && $addWhere .= "`type_str` = '".$type."' ";
	$addSql = "ORDER BY `cover` DESC,is_hot DESC,updated_at DESC";
	
	$result = sf::getModel("articles")->selectAll($addWhere,$addSql,$showMax);
	//取出第一条
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
  * 取得产品分类
  */
 function selectProductTreeByTypeStr($name='',$type='',$showMax=0)
 {
	!$name && $name = time().rand(1,99);//取得层id
	//取得分类信息
	$result = sf::getModel("categorys",0,$type)->selectAll('','',$showMax);
	$htmlStr .= '<ul class="selectTreeByTypeStr">'."\r\n";
	while($category = $result->getObject()){
        $htmlStr .= '	<li class="category_level_'.$category->getLevel().'">'.link_to("product/index/type/".$category->getType()."/id/".$category->getId(),$category->getSubject())."</li>\r\n";
	}
	$htmlStr .= "</ul>";
	return $htmlStr;
 }
 
 /**
 * 取得置顶产品
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
 * 取得置顶产品
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