<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>home</title>
<link href="<?=site_path("images/admin/admin.css")?>" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="head">
<div class="log"></div>
<div class="copyright">
Copyright 2008<br />sf version 0.1.0
</div>
<div class="navbar">
<menu>
<li class="active"><a href="<?=site_url("admin/home")?>">Home</a></li>
<li><a href="<?=site_url("admin/functions")?>">Functions</a></li>
<li><a href="<?=site_url("admin/dir_manager")?>">Category</a></li>
<li><a href="<?=site_url("admin/setting")?>">Setting</a></li>
<li><a href="<?=site_url("admin/user_manager")?>">User Manager</a></li>
<li><a href="<?=site_url("admin/template_manager")?>">Template Manager</a></li>
<li><a href="<?=site_url("admin/plug_in")?>">Plug_In's</a></li>
<li><a href="<?=site_url("admin/to_do")?>">To-DO</a></li>
</menu>
</div>
</div>
<div class="body">
<div class="body_left">
<?=$inc_left?>
</div>
<div class="body_right">
<?=$inc_right?>
</div>
<div style="clear:both;"></div>
</div>
<div class="footer"></div>
</body>
</html>
