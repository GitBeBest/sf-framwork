<?php
error_reporting(E_ALL & ~E_NOTICE);
//��վ����Ŀ¼
define('APPPATH', realpath(dirname(__FILE__)).'/application/');
//���ļ�����Ŀ¼
define('SYSTEMPATH', realpath(dirname(__FILE__)).'/system/');
//�����ļ�
require_once(SYSTEMPATH.'sf/mvc.class.php');
?>