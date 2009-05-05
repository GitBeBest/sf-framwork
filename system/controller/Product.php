<?php
class product extends controller
{		
	public $type = 'product';
	public $auth = false;
	
	function load()
	{
		$this->type = input::getInput("get.type") ? input::getInput("get.type") : 'product';
		view::set("type",$this->type);
	}
	
	function index()
	{
		if(input::getInput("get.id")){//有ID则显示指定ID
			$category = sf::getModel("categorys",input::getInput("get.id"));
			$res[] = $category->getId();
			//设置页面title
			config::set('title',$category->getSubject());
			$result = $category->selectSonTree($category);
			while($cat = $result->getObject()){
				$res[] = $cat->getId();
			}
			$ids = implode("','",(array)$res);
		}
		//处理搜索
		$addWhere .= "`type_str` = '".$this->type."' ";
		$ids && $addWhere .= "AND `category_id` in ('".$ids."') ";
		input::getInput("post.search") && $addWhere .= " AND `".input::getInput("mix.field")."` LIKE '%".trim(input::getInput("post.search"))."%' ";
		//取得带翻页的数据集
		$from_vars = array('field','search','type');
		view::set("pager",sf::getModel("products")->getPager($addWhere ,$addSql ,10,'','',$from_vars));
		view::apply("inc_body","template/product_category");
		view::display("template/page");
	}
	
	/**
	 * 显示置顶新闻列表
	 */
	function top()
	{
		config::set('title',lang::get('List for the top'));
		//处理搜索
		$addWhere .= "`type_str` = '".$this->type."' ";
		$ids && $addWhere .= "AND `is_top` > 0 ";
		input::getInput("post.search") && $addWhere .= " AND `".input::getInput("mix.field")."` LIKE '%".trim(input::getInput("post.search"))."%' ";
		//取得带翻页的数据集
		$from_vars = array('field','search','type');
		view::set("pager",sf::getModel("products")->getPager($addWhere ,$addSql ,16,'','',$from_vars));
		view::apply("inc_body","template/product_category");
		view::display("template/page");
	}
	
	/**
	 * 查看产品
	 */
	function show()
	{
		$product = sf::getModel("products",input::getInput("get.id"));
		//设置页面title
		config::set('title',$product->getSubject());
		view::set("product",$product);
		view::apply("inc_body","template/product_show");
		view::display("template/page");
	}

}
?>