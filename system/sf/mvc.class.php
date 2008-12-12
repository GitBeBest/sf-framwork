<?php
//���������ļ�
require_once(SYSTEMPATH.'sf/sf.class.php');
require_once(SYSTEMPATH.'sf/config.class.php');
require_once(SYSTEMPATH.'sf/sfexception.class.php');
require_once(SYSTEMPATH.'sf/router.class.php');
require_once(SYSTEMPATH.'sf/loader.class.php');
require_once(SYSTEMPATH.'sf/language.class.php');
//���������ļ�
config::load('default','config');
//���ر�Ҫ���ļ�
loader::lib(array("controller","model"));
loader::helper("url");
//��ʼ��pathinfo
router::parse();
//���������ļ�
//lang::setLang("chinese");
lang::load("global");
//ִ�п�����
$controller = sf::getController(router::getController());
try{
	method_exists($controller , "load") && $controller->load();
	if(!method_exists($controller , router::getMethod())) 
		throw new sfException(sprintf(lang::get("Call to undefined method %s::%s"),get_class($controller),router::getMethod()));
	$controller->{router::getMethod()}();
	method_exists($controller , "shutdown") && $controller->shutdown();
	
}catch(tfException $e){
	method_exists($controller , "shutdown") && $controller->shutdown();
	$e->halt();
}
?>
