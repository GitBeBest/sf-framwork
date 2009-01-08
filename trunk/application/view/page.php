<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>home</title>
<link href="<?=site_path("images/base.css")?>" rel="stylesheet" type="text/css" />
<script language="javascript" src="<?=site_path("js/jquery.js")?>" type="text/javascript"></script>
<script language="javascript" src="<?=site_path("js/jquery.form.js")?>" type="text/javascript"></script>
<script language="javascript" src="<?=site_path("js/validate/jquery.validate.js")?>" type="text/javascript"></script>
<script language="javascript" src="<?=site_path("js/jquery.datePicker.js")?>" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="<?=site_path("js/loadbox.js")?>"></script>
<script language="javascript" type="text/jscript">
$(document).ready(function() {
	$("#validateForm").validate({errorElement: "em"});
	$('.date-pick').datePicker();
});
</script>

</head>
<body>
<div class="head">
<div class="log"></div>
<div class="navbar">
<menu>
<li class="active"><a href="<?=site_url("home")?>">首页</a></li>
<li><a href="<?=site_url("product")?>">产品</a></li>
<li><a href="<?=site_url("news")?>">新闻</a></li>
<li><a href="<?=site_url("other")?>">其他</a></li>
</menu>
</div>
</div>
<div class="body">
<?=$inc_body?>
<div style="clear:both;"></div>
</div>
<div class="footer"></div>
</body>
</html>
