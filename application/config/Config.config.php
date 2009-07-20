<?php
/**
 * $Author$
 */
config::set(array(
	'site_name' => 'xcvxc',
	'default_lang' => 'english',
	'keyword' => 'xcvxcv',
	'describe' => 'xcvxcv',
	'base_url' => 'http://127.0.0.1/sf/',
	'index_page' => '',
	'mysql' => array(
		'hostname' => 'localhost',
		'user' => 'root',
		'passwd' => 'root',
		'database' => 'sf',
		),
	'router' => array(
		'default_controller' => 'welcome',
		'default_method' => 'index',
		)
	)
);
?>