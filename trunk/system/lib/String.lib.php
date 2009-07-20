<?php
/** 
 * 类名：支付处理类
 * 功能：完成一些支付处理功能
 * $Id$
 */ 
 
class string
{
	function getRandString()
	{
		$str = strtoupper(md5(time().mt_rand(1000,9999)));
		return substr($str,0,8).'-'.substr($str,8,4).'-'.substr($str,12,4).'-'.substr($str,16,4).'-'.substr($str,20);
	}
}
?>