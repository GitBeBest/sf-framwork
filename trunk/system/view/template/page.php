<html>
<head>
<meta name="Robots" content="index,follow" />
<meta name="keywords" content="<?=config::get('keyword')?>" />
<meta name="description" content="<?=config::get('describe')?>" />
<meta name="copyright" content="Copyright (C) 2009 meetcd@gmail.com" />
<meta name="author" content="meetcd,meetcd@gmail.com" />
<title><?=config::get('title',config::get('site_name'))?>--<?=config::get('site_name')?></title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="<?=site_path("images/design.css")?>" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
.STYLE14 {color: #926B44}
-->
</style>
<script language="javascript" src="<?=site_path("js/jquery.js")?>" type="text/javascript"></script>
<script language="javascript" src="<?=site_path("js/jquery.form.js")?>" type="text/javascript"></script>
<script language="javascript" src="<?=site_path("js/validate/jquery.validate.js")?>" type="text/javascript"></script>
<script language="javascript" src="<?=site_path("js/jquery.datePicker.js")?>" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="<?=site_path("js/loadbox.js")?>"></script>
<script language="javascript" type="text/jscript">
$(document).ready(function() {
	$("#validateForm").validate({errorElement: "em"});
});
</script>
</head>
<body>
<table width="1000" height="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><table width="998" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="84" valign="bottom"><a href="index.html"><img src="<?=site_path("images/logo_fangfacms.gif")?>" alt="Fangfacms,方法CMS" width="297" height="69" border="0" title="方法CMS(FangfaCMS)官方网站" /></a></td>
          <td width="457" valign="bottom">&nbsp;</td>
        </tr>
      </table>
      <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','1000','height','600','src','flash/sy','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/sy' ); //end AC code
</script>
      <table width="998" height="33" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td background="<?=site_path("images/menu_bg.png")?>" class="nav_title"><table width="70%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="20">&nbsp;</td>
                <td align="center" class="nav_title"><a href="<?=site_url("home/index")?>">首&nbsp;&nbsp;页</a></td>
                <td align="center"><img src="<?=site_path("images/nav_line.gif")?>" width="5" height="33"></td>
                <td align="center" class="nav_title"><a href="<?=site_url("article/index")?>">新闻中心</a></td>
                <td align="center"><img src="<?=site_path("images/nav_line.gif")?>" width="5" height="33"></td>
                <td align="center" class="nav_title"><a href="<?=site_url("product/index")?>">产品中心</a></td>
                <td align="center"><img src="<?=site_path("images/nav_line.gif")?>" width="5" height="33"></td>
                <td align="center" class="nav_title"><a href="<?=site_url("page/index/type/default/id/1")?>">公司简介</a></td>
                <td align="center"><img src="<?=site_path("images/nav_line.gif")?>" width="5" height="33"></td>
                <td align="center" class="nav_title"><a href="<?=site_url("job/index")?>">人才招聘</a></td>
                <td align="center"><img src="<?=site_path("images/nav_line.gif")?>" width="5" height="33"></td>
                <td align="center" class="nav_title"><a href="<?=site_url("book/index")?>">在线留言</a></td>
                <td align="center"><img src="<?=site_path("images/nav_line.gif")?>" width="5" height="33"></td>
                <td align="center" class="nav_title"><a href="<?=site_url("page/index/type/default/id/2")?>">联络我们</a></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="998" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="top" bgcolor="#62666F"><table width="100%" height="32" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td>&nbsp;</td>
                <form action="<?=site_url("login/index")?>" method="post">
                  <td align="right" class="denglu"><?php if(input::getInput("session.username")):?>欢迎你 “<?=input::getInput("session.username")?>” ，你可以<a href="<?=site_url("login/logout")?>">点这里安全退出</a>。<?php else:?><span>昵称：
                    <INPUT name="username" size="8"  style="border:1px dotted #333333;">
                    </span> <span>&nbsp;密码：
                    <INPUT name="password" value="" size="8" style="border:1px dotted #333333;">
                    &nbsp;验证码：</span><span>&nbsp;
                    <input name="SafetyCode" type="text" id="SafetyCode" size="5" maxlength="5" style="border:1px dotted #333333;" />
                    &nbsp;<img src="<?=site_url("common/index")?>" align="absmiddle" />  </span>
                    <INPUT class="submit" type="submit" value="登录" name="subjectuser">
                    <a href="<?=site_url("login/edit")?>">注册用户</a><?php endif;?></td>
                </form>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="998" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="8"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1"></td>
        </tr>
      </table>
      <?=$inc_body?>
      <table width="998" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="28" align="center" valign="top" bgcolor="#EBEBEB" class="yqlj"><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">
              <tr>
                <td><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1"></td>
              </tr>
            </table>
            <table width="96%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="39%" height="32" class="line28">By Meetcd,meetcd@gmail.com</td>
                <td width="24%">&nbsp;</td>
                <td width="37%">&copy;&nbsp;2008-2009&nbsp;</td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
