<?php
class string
{
	function getRandString()
	{
		$str = strtoupper(md5(time().mt_rand(1000,9999)));
		return substr($str,0,8).'-'.substr($str,8,4).'-'.substr($str,12,4).'-'.substr($str,16,4).'-'.substr($str,20);
	}
}
?>