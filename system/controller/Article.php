<?php
class article extends controller
{		
	public $type = 'article';
	public $auth = false;
	
	function load()
	{
		$this->type = input::getInput("get.type") ? input::getInput("get.type") : 'article';
		view::set("type",$this->type);
	}
	
	/**
	 * ����Ƶ��ҳ
	 */
	function index()
	{
		//����ҳ��title
		config::set('title',lang::get("Home for the article"));
		//��ָ�������ķ��ൽҳ��
		view::set("pager",sf::getModel("categorys",0,$this->type)->selectAll("`is_home` > 0 ","ORDER BY updated_at DESC ",config::get('article_category_max',8)));
		view::apply("inc_body","template/article_home");
		view::display("template/page");
	}
	
	/**
	 * ��������ʾ�б�
	 */
	function category()
	{
		if(input::getInput("get.id")){//��ID����ʾָ��ID
			$category = sf::getModel("categorys",input::getInput("get.id"));
			$res[] = $category->getId();
			//����ҳ��title
			config::set('title',$category->getSubject());
			$result = $category->selectSonTree($category);
			while($cat = $result->getObject()){
				$res[] = $cat->getId();
			}
			$ids = implode("','",(array)$res);
		}
		//��������
		$addWhere .= "`type_str` = '".$this->type."' ";
		$ids && $addWhere .= "AND `category_id` in ('".$ids."') ";
		input::getInput("post.search") && $addWhere .= " AND `".input::getInput("mix.field")."` LIKE '%".trim(input::getInput("post.search"))."%' ";
		//ȡ�ô���ҳ�����ݼ�
		$from_vars = array('field','search','type');
		view::set("pager",sf::getModel("articles")->getPager($addWhere ,$addSql ,16,'','',$from_vars));
		view::apply("inc_body","template/article_category");
		view::display("template/page");
	}
	
	/**
	 * ��ʾ�ö������б�
	 */
	function top()
	{
		config::set('title',lang::get('List for the top'));
		//��������
		$addWhere .= "`type_str` = '".$this->type."' ";
		$ids && $addWhere .= "AND `is_top` > 0 ";
		input::getInput("post.search") && $addWhere .= " AND `".input::getInput("mix.field")."` LIKE '%".trim(input::getInput("post.search"))."%' ";
		//ȡ�ô���ҳ�����ݼ�
		$from_vars = array('field','search','type');
		view::set("pager",sf::getModel("articles")->getPager($addWhere ,$addSql ,16,'','',$from_vars));
		view::apply("inc_body","template/article_category");
		view::display("template/page");
	}
	
	/**
	 * �鿴����
	 */
	function show()
	{
		$article = sf::getModel("articles",input::getInput("get.id"));
		//����ҳ��title
		config::set('title',$article->getSubject());
		view::set("article",$article);
		view::apply("inc_body","template/article_show");
		view::display("template/page");
	}

}
?>