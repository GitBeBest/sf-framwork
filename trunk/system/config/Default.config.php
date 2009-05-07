<?php
return array(
			'lib_dir'=> APPPATH.'lib/',
			'model_dir'=> APPPATH.'model/',
			'view_dir'=> APPPATH.'view/',
			'plugin_dir'=> APPPATH.'plugins/',
			'helper_dir'=> APPPATH.'helper/',
			'controller_dir'=> APPPATH.'controller/',
			'default_lang'=> 'english',
			'controller_tag'=> 'module',
			'method_tag'=> 'act',
			'controller_ext'=> '.php',
			'lib_ext'=> '.lib.php',
			'model_ext'=> '.model.php',
			'config_ext'=> '.config.php',
			'plugins_ext'=> '.plugin.php',
			'helper_ext'=> '.helper.php',
			'language_ext'=> '.lang.php',
			'base_url'=> 'http://127.0.0.1/sf/',
			'index_page'=>'',
			'router' =>array(
						'default_controller' => 'welcome',
						'default_method' => 'index'
					),
			'auto_load_helper'=> array('url','global'),
			'auto_load_plugin'=> array('Tag'),
			'mysql' =>array(
						'hostname'=>'localhost',
						'user'=>'root',
						'passwd'=>'root',
						'database'=>'tf'
					)
			);
