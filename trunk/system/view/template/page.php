<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Robots" content="index,follow" />
<meta name="keywords" content="<?=config::get('keyword')?>" />
<meta name="description" content="<?=config::get('describe')?>" />
<meta name="copyright" content="Copyright (C) 2009 meetcd@gmail.com" />
<meta name="author" content="meetcd,meetcd@gmail.com" />
<title>
<?=config::get('title',config::get('site_name'))?>
--
<?=config::get('site_name')?>
</title>
<link href="<?=site_path("images/design.css")?>" rel="stylesheet" type="text/css" />
<script language="javascript" src="<?=site_path("js/jquery.js")?>" type="text/javascript"></script>
<script language="javascript" src="<?=site_path("js/jquery.form.js")?>" type="text/javascript"></script>
<script language="javascript" src="<?=site_path("js/validate/jquery.validate.js")?>" type="text/javascript"></script>
<script language="javascript" src="<?=site_path("js/jquery.datePicker.js")?>" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="<?=site_path("js/loadbox.js")?>"></script>
<script language="javascript" type="text/jscript">
$(document).ready(function() {
	$("#validateForm").validate({errorElement: "em"});
	$('.menubar li[class!="active"]').mouseover(function(){$(this).addClass("active");});
	$('.menubar li[class!="active"]').mouseout(function(){$(this).removeClass("active");});
});
</script>
</head>
<body>
<div class="header">
  <div class="logo">快速建站</div>
  <div class="banner">baner</div>
</div>
<div class="menubar"> <menu>
  <li><a href="<?=site_url("/")?>">首&nbsp;&nbsp;页</a></li>
  <li><a href="<?=site_url("article/index")?>">新闻中心</a></li>
  <li><a href="<?=site_url("product/index")?>">产品中心</a></li>
  <li><a href="<?=site_url("page/index/type/default/id/1")?>">公司简介</a></li>
  <li><a href="<?=site_url("job/index")?>">人才招聘</a></li>
  <li><a href="<?=site_url("book/index")?>">在线留言</a></li>
  <li class="active"><a href="<?=site_url("page/index/type/default/id/2")?>">联络我们</a></li>
  </menu>
  <p style="clear:both"></p>
</div>
<div class="warp">
  <?=$inc_body?>
  <div class="footer">
    <div class="link"></div>
    <div class="copyright"><br /><br />
      Copyright © 2009 All Rights Reserved. </div>
  </div>
</div>
</body>
</html>
