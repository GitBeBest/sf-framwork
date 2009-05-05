<?php
class build extends controller
{		

	function index()
	{
		view::apply("inc_body","admin/build/index");
		view::display("admin/page");
	}
	
	/**
	 * 生成文章页面
	 */
	function article()
	{
		//读取总数
		if(!$_SESSION['article']['total']){
			$_SESSION['article']['total'] = (int)sf::getModel("articles")->getTotal("`is_html` = 0");
			$_SESSION['article']['num'] = 0;
		}
		//生成静态页面
		if($_SESSION['article']['total'] == 0 || $_SESSION['article']['num'] >= $_SESSION['article']['total']){
			$_SESSION['article']['num'] = 0;
			$_SESSION['article']['total'] = 0;
			exit('{total:1,num:1}');
		}
		$result = sf::getModel("articles")->selectAll("is_html = 0",'',1);
		while($article = $result->getObject()){
			view::set("article",$article);
			view::apply("inc_body","template/article_show");
			$htmlStr = view::parse("template/page");
			$path = WEBROOT."/html/".$article->getTypeStr();
			if(!is_dir($path)){
				sf::getLib("Files")->mDir($path);
				exit('{total:'.$_SESSION['article']['total'].',num:0}');
			}
			sf::getLib("Files")->write($path."/article-show-".$article->getId().".html",$htmlStr);
			$article->setIsHtml(1);
			$article->save();
			$_SESSION['article']['num']++;
		}
		exit('{total:'.$_SESSION['article']['total'].',num:'.$_SESSION['article']['num'].'}');
	}
	
}
?>