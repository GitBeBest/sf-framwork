<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
ul,li {list-style:none; margin:0px auto; padding: 5px 5px;}
code { border:solid 1px #CCC; background:#efefef; padding:10px 10px; width:99%;}
-->
</style></head>
<body>
<div>
<h1><?=$title?></h1>
<code>
<?php 
for($i=0,$n=count($result);$i<$n;$i++)
	echo sprintf(lang::get('Creatting model for %s!'),$result[$i]);
?>
</code>
<form action="" method="post" name="table">
<ul>
<?php for($i=0,$n=count($tables);$i<$n;$i++):?>
<li><label><input name="tables[]" type="checkbox" value="<?=$tables[$i];?>" /><?=$tables[$i];?></label></li>
<?php endfor;?>
<li><input name="submit" type="submit" value="submit" /></li>
</ul>
</form>
</div>
<p><?=round(memory_get_usage()/1024/1024,2)?>M</p>
</body>
</html>