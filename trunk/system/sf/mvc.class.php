<?php
//包含核心文件
require_once(SYSTEMPATH.'sf/sf.class.php');
require_once(SYSTEMPATH.'sf/config.class.php');
require_once(SYSTEMPATH.'sf/sfexception.class.php');
require_once(SYSTEMPATH.'sf/router.class.php');
require_once(SYSTEMPATH.'sf/loader.class.php');
require_once(SYSTEMPATH.'sf/language.class.php');
require_once(SYSTEMPATH.'sf/input.class.php');
//加载配置文件
config::load('default');
//加载必要库文件
loader::lib(array("controller","model"));
//加载默认helper
loader::helper(config::get("auto_load_helper",'url'));
//加载默认插件
config::get("auto_load_plugin") && loader::plugin(config::get("auto_load_plugin"));
//初始化pathinfo
router::parse();
//加载语言文件
lang::setLang(config::get("default_lang","chinese"));
lang::load("global");
//执行控制器
$controller = sf::getController(router::getController());
try{
	method_exists($controller , "load") && $controller->load();//存在LOAD方法执行LOAD方法（页面执行开始执行）
	if(!method_exists($controller , router::getMethod())) 
		throw new sfException(sprintf(lang::get("Call to undefined method %s::%s"),get_class($controller),router::getMethod()));
	$controller->{router::getMethod()}();
	method_exists($controller , "shutdown") && $controller->shutdown();//存在SHUTDOWN方法执行他（页面执行完成执行）
	
}catch(tfException $e){
	method_exists($controller , "shutdown") && $controller->shutdown();//发生意外执行shutdown方法
	$e->halt();
}
?>
