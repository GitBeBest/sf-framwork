<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>顶部位置</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.STYLE1 {
	font-size: 12px;
	color: #000000;
}
.STYLE5 {font-size: 12}
.STYLE7 {font-size: 12px; color: #FFFFFF; }
/*链接样式*/
a{text-decoration: none;}   /* 链接无下划线,有为underline */ 
a:link {color: #FFF;}    /* 未访问的链接 */
a:visited {color: #FFF;} /* 已访问的链接 */
a:hover{color: #ff0000;}   /* 鼠标在链接上 */ 
a:active {color: #454545;}  /* 点击激活链接 */
-->
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="57" background="<?=site_url("images/admin/main2.jpg")?>"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="378" height="57"><div style="font-size:18px; font-weight:900; color:#FFFFFF; padding:5px 20px;">SF内容管理系统</div></td>
        <td>&nbsp;</td>
        <td width="285" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="33" height="27"><img src="<?=site_url("images/admin/main_05.gif")?>" width="33" height="27" /></td>
            <td width="285" background="<?=site_url("images/admin/main_06.gif")?>"><table width="225" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="17"><div align="right"><a href="<?=site_url("admin/login/password")?>" target="fraMain"><img src="<?=site_url("images/admin/pass.gif")?>" width="69" height="17" border="0" /></a></div></td>
                <td><div align="right"><a href="<?=site_url("help/index")?>" target="fraMain"><img src="<?=site_url("images/admin/user.gif")?>" width="69" height="17" border="0" /></a></div></td>
                <td><div align="right"><a href="<?=site_url("admin/login/logout")?>" target="_top"><img src="<?=site_url("images/admin/quit.gif")?>" width="69" height="17" border="0" /></a>
                </div></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="40" background="<?=site_url("images/admin/main_10.gif")?>"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="194" height="40" background="<?=site_url("images/admin/main_10.gif")?>">&nbsp;</td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="21"><img src="<?=site_url("images/admin/main_13.gif")?>" width="19" height="14" /></td>
            <td width="35" class="STYLE7"><div align="center"><a href="<?=site_url("/")?>" target="_top">首页</a></div></td>
            <td width="21" class="STYLE7"><img src="<?=site_url("images/admin/main_15.gif")?>" width="19" height="14" /></td>
            <td width="35" class="STYLE7"><div align="center"><a href="javascript:history.go(-1);">后退</a></div></td>
            <td width="21" class="STYLE7"><img src="<?=site_url("images/admin/main_17.gif")?>" width="19" height="14" /></td>
            <td width="35" class="STYLE7"><div align="center"><a href="javascript:history.go(1);">前进</a></div></td>
            <td width="21" class="STYLE7"><img src="<?=site_url("images/admin/main_19.gif")?>" width="19" height="14" /></td>
            <td width="35" class="STYLE7"><div align="center"><a href="javascript:window.parent.location.reload();">刷新</a></div></td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td width="248" background="<?=site_url("images/admin/main_11.gif")?>"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="16%"><span class="STYLE5"></span></td>
            <td width="75%"><div align="center" class="STYLE7">今天是：<script language="javascript" type="text/jscript">var today=new Date();document.write(today.getFullYear() + ' 年 ' + (today.getMonth() + 1) + ' 月 ' + today.getDate() + ' 日');</script></div></td>
            <td width="9%">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="30" background="<?=site_url("images/admin/main_31.gif")?>"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="8" height="30"><img src="<?=site_url("images/admin/main_28.gif")?>" width="8" height="30" /></td>
        <td width="147" background="<?=site_url("images/admin/main_29.gif")?>"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="24%">&nbsp;</td>
            <td width="43%" height="20" valign="bottom" class="STYLE1">管理菜单</td>
            <td width="33%">&nbsp;</td>
          </tr>
        </table></td>
        <td width="39"><img src="<?=site_url("images/admin/main_30.gif")?>" width="39" height="30" /></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="20" valign="bottom"><span class="STYLE1">当前登录用户：<em style="color:#F00;"><?=$user->getUserUsername()?></em> &nbsp;用户角色：<em style="color:#F00;"><?=$user->getUserGroupName()?></em></span></td>
            <td valign="bottom" class="STYLE1"><div align="right"></div></td>
          </tr>
        </table></td>
        <td width="17"><img src="<?=site_url("images/admin/main_32.gif")?>" width="17" height="30" /></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>