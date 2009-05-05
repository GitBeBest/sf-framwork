<?php
return array(
	'site_name' => '精简企业形象站演示',
	'default_lang' => 'chinese',
	'keyword' => '企业形象，精简，演示',
	'describe' => '精简企业形象站演示',
	'base_url' => 'http://127.0.0.1/sf/',
	'index_page' => '',
	'mysql' => array(
		'hostname' => 'localhost',
		'user' => 'root',
		'passwd' => 'root',
		'database' => 'sf',
		),
	'router' => array(
		'default_controller' => 'home',
		'default_method' => 'index',
		'rule' => array(
						'html/article/article_(.*)_show_(.*).html'=> 'article/show/type/$1/id/$2',
						),

		),
	);
?>