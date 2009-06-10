<?php
config::set(array(
	'site_name' => '快速建站',
	'default_lang' => 'chinese',
	'keyword' => '快速建站',
	'describe' => '快速建站',
	'base_url' => 'http://127.0.0.1/sf/',
	'index_page' => '',
	'mysql' => array(
		'hostname' => 'localhost',
		'user' => 'root',
		'passwd' => 'root',
		'database' => 'sf',
		),
	'router' => array(
		'default_controller' => 'admin/login',
		'default_method' => 'index',
		'rule' => array(
						'html/article/article_(.*)_show_(.*).html'=> 'article/show/type/$1/id/$2',
						),

		),
	)
);
?>