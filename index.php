<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
//��վ����Ŀ¼
define('WEBROOT', realpath(dirname(__FILE__)));
//��վ����Ŀ¼
define('APPPATH', WEBROOT.'/application/');
//���ļ�����Ŀ¼
define('SYSTEMPATH', WEBROOT.'/system/');
//�����ļ�
require_once(SYSTEMPATH.'sf/mvc.class.php');
?>