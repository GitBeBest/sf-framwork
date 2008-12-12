<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>article</title>
</head>

<body>
<div>
<h1>article</h1>
<ul>
<?php while($news = $pager->getObject()):?>
<li><?=$news->getSubject()?></li>
<?php endwhile;?>
</ul>
<div class="pager_bar"><?=$pager->fromto().$pager->navbar(6).$pager->pagejump()?></div>
</div>
</body>
</html>
