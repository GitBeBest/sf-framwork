<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
//网站基本目录
define('WEBROOT', realpath(dirname(__FILE__)));
//网站基本目录
define('APPPATH', WEBROOT.'/application/');
//库文件基本目录
define('SYSTEMPATH', WEBROOT.'/system/');
//引擎文件
require_once(SYSTEMPATH.'sf/mvc.class.php');
?>