<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>home</title>
<link href="<?=site_path("images/admin/admin.css")?>" rel="stylesheet" type="text/css" />
<script language="javascript" src="<?=site_path("js/jquery.js")?>" type="text/javascript"></script>
<script language="javascript" src="<?=site_path("js/jquery.form.js")?>" type="text/javascript"></script>
<script language="javascript" src="<?=site_path("js/validate/jquery.validate.js")?>" type="text/javascript"></script>
<script language="javascript" src="<?=site_path("js/jquery.datePicker.js")?>" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="<?=site_path("js/loadbox.js")?>"></script>
<script language="javascript" type="text/jscript">
$(document).ready(function() {
    $("#selectAll").click( function() {
        $("input[name='select_id[]']").each( function() { $(this).attr("checked",!this.checked); })
    });
	$("#validateForm").validate({errorElement: "em"});
	$('.date-pick').datePicker();
});
</script>

</head>
<body>
<div class="head">
<div class="log"></div>
<div class="copyright">
Copyright 2008<br />sf version 0.1.0
</div>
<div class="navbar">
<menu>
<li class="active"><a href="<?=site_url("admin/home")?>">管理首页</a></li>
<li><a href="<?=site_url("admin/category_controller")?>">分类管理</a></li>
<li><a href="<?=site_url("admin/usermanager")?>">会员管理</a></li>
<li><a href="<?=site_url("admin/files")?>">附件管理</a></li>
</menu>
</div>
</div>
<div class="body">
<div class="body_left">
<div class="body_left_functions">
<h1>Admin Functions</h1>
<ul>
<li><a href="#">Category</a></li>
<li><a href="#">Setting</a></li>
</ul>
</div>
<div class="body_left_links">
<h1>Quick Links</h1>
<ul>
<li><a href="#">Category</a></li>
<li><a href="#">Setting</a></li>
</ul>
</div>
</div>
<div class="body_right">
<?=$inc_body?>
</div>
<div style="clear:both;"></div>
</div>
<div class="footer"></div>
</body>
</html>
