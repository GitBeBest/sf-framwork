<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>菜单管理</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<base target="fraMain" >
<script language="javascript" src="<?=site_path("js/jquery.js")?>" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
$(function(){
	$('ul[id*=menu]').hide();
	$('#menu_0').show();
	$("li").mouseover(function(){
		$(this).addClass("mouseover");
	});
	$("li").mouseout(function(){
		$(this).removeClass("mouseover");
	});
});
</script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
/*链接样式*/
a{text-decoration: none;}   /* 链接无下划线,有为underline */ 
a:link {color: #454545;}    /* 未访问的链接 */
a:visited {color: #454545;} /* 已访问的链接 */
a:hover{color: #ff0000;}   /* 鼠标在链接上 */ 
a:active {color: #454545;}  /* 点击激活链接 */
menu {padding:0px 0px; margin:0px 0px;}
menu h3 { margin:0px 0px;font-size:12px;background:url(<?=site_path("images/admin/main_34_1.gif")?>) no-repeat; padding:5px 16px;}
menu li { margin:0px 0px;padding:2px 16px; list-style:none; background:url(<?=site_path("images/admin/menu_ico.gif")?>) no-repeat; background-position:0px 6px;}
menu ul { margin:0px 0px;padding:0px 0px;}
body,td,th {
	font-size: 12px;
}
.mouseover { border:solid 1px #adb9c2; background:url(<?=site_url("images/admin/tab_bg.gif")?>) repeat-x;}
-->
</style>
</HEAD>
<BODY>
<?//=$inc_body?>
<?=$menu?>
<menu>
<h3 onClick="$('ul[id*=menu]').hide();$('#menu_0').show();">个人信息管理</h3>
<ul id="menu_0">
<li><a href="<?=site_url("admin/login/password")?>">修改密码</a></li>
<li><a href="<?=site_url("admin/login/logout")?>" target="_top">安全退出系统</a></li>
</ul>
</menu>
</BODY>
</HTML>
