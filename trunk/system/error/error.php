<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<style type="text/css">
.error_box { border: solid 1px #999;  padding:5px 10px;}
.error_msg { font-size:14px;border: solid 1px #999; background-color:#efefef;padding:10px 10px;}
.error_more { font-size:12px; font-style:italic;}
.error_trace {border: solid 1px #999; background-color:#efefef;padding:5px 5px;}
h1 { margin-top:5px;}
.error_navbar { text-align:center;}
</style>
</head>
<body>
<div class="error_box">
<h1><?=$title?></h1>
<p class="error_msg"><?=$msg?></p>
<?php if(config::get("is_debug",false)):?>
<p class="error_more"><?=$more?></p>
<p class="error_trace"><?=$trace?></p>
<?php endif;?>
<p class="error_navbar"> [ <a href="javascript:history.go(-1);">BACK</a> ]</p>
</div>
</body>
</html>
