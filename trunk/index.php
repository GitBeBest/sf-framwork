<?php
error_reporting(E_ALL & ~E_NOTICE);
//网站基本目录
define('APPPATH', realpath(dirname(__FILE__)).'/application/');
//库文件基本目录
define('SYSTEMPATH', realpath(dirname(__FILE__)).'/system/');
//引擎文件
require_once(SYSTEMPATH.'sf/mvc.class.php');
?>