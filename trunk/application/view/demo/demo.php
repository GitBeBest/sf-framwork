<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Demo</title>
</head>

<body>
<div>
<h1>Demo::list</h1>
<?=$search?>
<ul>
<?php while($demo = $pager->getObject()):?>
<li>
[<a href="<?=site_url("demo_controller/edit/id/".$demo->getId())?>">edit</a>]
[<a href="<?=site_url("demo_controller/delete/id/".$demo->getId())?>">delete</a>]
<?=$demo->getId()?>
<a href="<?=site_url("demo_controller/show/id/".$demo->getId())?>"><?=$demo->getSubject()?></a>
<em><?=$demo->getCreatedAt("Y/m/d")?></em>
</li>
<?php endwhile;?>
</ul>
<!--不带翻页信息的数据集没有一下方法-->
<div class="pager_bar"><?=$pager->fromto().$pager->navbar(6).$pager->pagejump()?></div>
</div>
</body>
</html>
