<?php
return array(
			'lib_dir'=> APPPATH.'lib/',
			'model_dir'=> APPPATH.'model/',
			'view_dir'=> APPPATH.'view/',
			'controller_dir'=> APPPATH.'controller/',
			'plugin_dir'=> APPPATH.'plugins/',
			'base_url'=> 'http://127.0.0.1/sf/',
			'index_page'=> '',
			'router' =>array(
						'default_controller' => 'welcome',
						'default_method' => 'index',
						'rule' => array(
										'admin'=> 'admin/index',
										'news'=> 'article/index',
										//'shownews(:num)id(:num)(:any).html'=> 'article/index/pagenum/$1/id/$2/pid/$3',
										)
					),
			'mysql' =>array(
						'hostname'=>'localhost',
						'user'=>'root',
						'passwd'=>'root',
						'database'=>'tf'
					)
			);
