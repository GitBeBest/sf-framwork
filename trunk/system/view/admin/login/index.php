<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>网站管理员登陆</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #1D3647;
}
.login_top_bg {
	background-image: url(<?=site_path("images/admin/login-top-bg.gif")?>);
	background-repeat: repeat-x;
}

.login-buttom-bg {
	background-image: url(<?=site_path("images/admin/login-buttom-bg.gif")?>);
	background-repeat: repeat-x;
}
.login-buttom-txt {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #ABCAD3;
	text-decoration: none;
	line-height: 20px;
}
.login_txt {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 25px;
	color: #333333;
}
.Submit {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #629DAE;
	text-decoration: none;
	background-image: url(<?=site_path("images/admin/Submit_bg.gif")?>);
	background-repeat: repeat-x;
}
.login_bg {
	background-image: url(<?=site_path("images/admin/login_bg.jpg")?>);
	background-repeat: repeat-x;
}
.login_bg2 {
	background-image: url(<?=site_path("images/admin/login-content-bg.gif")?>);
	background-repeat: no-repeat;
	background-position: right;
}

.admin_txt {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FFFFFF;
	text-decoration: none;
	height: 38px;
	width: 100%;
	position: 固定;
	line-height: 38px;
}
.login_txt_bt {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	line-height: 25px;
	color: #666666;
	font-weight: bold;
}
.admin_topbg {
	background-image: url(<?=site_path("images/admin/top-right.gif")?>);
	background-repeat: repeat-x;
}
.txt_bt {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 25px;
	font-weight: bold;
	color: #000000;
	text-decoration: none;
}
.left_topbg {
	background-image: url(<?=site_path("images/admin/content-bg.gif")?>);
	background-repeat: repeat-x;
}
.admin_toptxt {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #4A8091;
	height: 18px;
	width: 100%;
	overflow: hidden;
	position: 固定;
}

.left_bt {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
	color: #395a7b;
}
.left_bt2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 25px;
	font-weight: bold;
	color: #333333;
}
.titlebt {
	font-size: 12px;
	line-height: 26px;
	font-weight: bold;
	color: #000000;
	background-image: url(<?=site_path("images/admin/top_bt.jpg")?>);
	background-repeat: no-repeat;
	display: block;
	text-indent: 15px;
	padding-top: 5px;
}

.left_txt {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 25px;
	color: #666666;
}
.left_txt2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 25px;
	color: #000000;
}
.nowtable {
	background-color: #e1e5ee;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-top-color: #bfc4ca;
	border-right-color: #bfc4ca;
	border-bottom-color: #bfc4ca;
	border-left-color: #bfc4ca;
}
.left_txt3 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 25px;
	color: #003366;
	text-decoration: none;
}



.left_ts {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 25px;
	font-weight: bold;
	color: #FF6600;
}
.line_table {
	border: 1px solid #CCCCCC;
}
.sec1 {
	CURSOR: hand;
	COLOR: #000000;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 25px;
	border: 1px solid #B5D0D9;
	background-image: url(right_smbg.jpg);
	background-repeat: repeat-x;
}
.sec2 {
	FONT-WEIGHT: bold;
	CURSOR: hand;
	COLOR: #000000;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 25px;
	background-color: #e2e7ed;
	border: 1px solid #e2e7ed;
}
.main_tab {
	COLOR: #000000;
	BACKGROUND-COLOR: #e2e7ed;
	border: 1px solid #e2e7ed;
}
.MM a {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 26px;
	color: #666666;
	background-image: url(menu_bg.gif);
	background-repeat: no-repeat;
	list-style-type: none;
	list-style-image: none;
}
a:link {
	font-size: 12px;
	line-height: 25px;
	color: #333333;
	text-decoration: none;
}
a:hover {
	font-size: 12px;
	line-height: 25px;
	color: #666666;
	text-decoration: none;
}
a:visited {
	font-size: 12px;
	line-height: 25px;
	color: #333333;
	text-decoration: none;
}


.MM a:link {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 26px;
	color: #666666;
	background-image: url(menu_bg.gif);
	background-repeat: no-repeat;
	list-style-type: none;
	list-style-image: none;
}

-->
</style>
<script language="JavaScript" type="text/javascript">
function correctPNG()
{
    var arVersion = navigator.appVersion.split("MSIE")
    var version = parseFloat(arVersion[1])
    if ((version >= 5.5) && (document.body.filters)) 
    {
       for(var j=0; j<document.images.length; j++)
       {
          var img = document.images[j]
          var imgName = img.src.toUpperCase()
          if (imgName.substring(imgName.length-3, imgName.length) == "PNG")
          {
             var imgID = (img.id) ? "id='" + img.id + "' " : ""
             var imgClass = (img.className) ? "class='" + img.className + "' " : ""
             var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
             var imgStyle = "display:inline-block;" + img.style.cssText 
             if (img.align == "left") imgStyle = "float:left;" + imgStyle
             if (img.align == "right") imgStyle = "float:right;" + imgStyle
             if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle
             var strNewHTML = "<span " + imgID + imgClass + imgTitle
             + " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
             + "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
             + "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>" 
             img.outerHTML = strNewHTML
             j = j-1
          }
       }
    }    
}
window.attachEvent("onload", correctPNG);
</script>
</head>

<body>
<table border="0" width="100%" cellpadding="0" cellspacing="0" height="166">
  <tbody><tr>
    <td valign="top" height="42"><table class="login_top_bg" border="0" width="100%" cellpadding="0" cellspacing="0" height="42">
      <tbody><tr>
        <td width="1%" height="21">&nbsp;</td>
        <td height="42">&nbsp;</td>
        <td width="17%">&nbsp;</td>
      </tr>
    </tbody></table></td>
  </tr>
  <tr>
    <td valign="top"><table class="login_bg" border="0" width="100%" cellpadding="0" cellspacing="0" height="532">
      <tbody><tr>
        <td align="right" width="49%"><table class="login_bg2" border="0" width="91%" cellpadding="0" cellspacing="0" height="532">
            <tbody><tr>
              <td valign="top" height="138"><table border="0" width="89%" cellpadding="0" cellspacing="0" height="392">
                <tbody><tr>
                  <td height="114">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" valign="top" height="80">&nbsp;</td>
                </tr>
                <tr>
                  <td align="center" valign="top" height="198"><strong>内容管理平台</strong></td>
                </tr>
              </tbody></table></td>
            </tr>
            
        </tbody></table></td>
        <td width="1%">&nbsp;</td>
        <td valign="bottom" width="50%"><table align="center" border="0" width="100%" cellpadding="0" cellspacing="0" height="59">
            <tbody><tr>
              <td width="4%">&nbsp;</td>
              <td width="96%" height="38"><span class="login_txt_bt">登陆信息网后台管理</span></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td height="21"><table id="table211" border="0" width="100%" cellpadding="0" cellspacing="0" height="328">
                  <tbody><tr>
                    <td colspan="2" align="middle" height="164"><form name="myform" action="" method="post">
                        <table id="table212" border="0" width="100%" cellpadding="0" cellspacing="0" height="143">
                          <tbody><tr>
                            <td class="top_hui_text" width="13%" height="38"><span class="login_txt">管理员：&nbsp;&nbsp; </span></td>
                            <td colspan="2" class="top_hui_text" height="38"><input name="username" class="editbox4" value="" size="20">                            </td>
                          </tr>
                          <tr>
                            <td class="top_hui_text" width="13%" height="35"><span class="login_txt"> 密 码： &nbsp;&nbsp; </span></td>
                            <td colspan="2" class="top_hui_text" height="35"><input class="editbox4" size="20" name="password" type="password">
                              <img src="<?=site_path("images/admin/luck.gif")?>" width="19" height="18"> </td>
                          </tr>
                          <tr>
                            <td width="13%" height="35"><span class="login_txt">验证码：</span></td>
                            <td colspan="2" class="top_hui_text" height="35"><input class="wenbenkuang" name="SafetyCode" value="" maxlength="5" size="10" type="text" id="SafetyCode">
                              <img src="<?=site_url("common/index")?>" align="absmiddle"></td>
                          </tr>
                          <tr>
                            <td height="35">&nbsp;</td>
                            <td width="20%" height="35"><input name="Submit" class="button" id="Submit" value="登 陆" type="submit"> </td>
                            <td class="top_hui_text" width="67%"><input name="cs" class="button" id="cs" value="取 消" type="reset"></td>
                          </tr>
                        </tbody></table>
                        <br>
                    </form></td>
                  </tr>
                  <tr>
                    <td align="right" valign="bottom" width="433" height="164"><img src="<?=site_path("images/admin/login-wel.gif")?>" width="242" height="138"></td>
                    <td align="right" valign="bottom" width="57">&nbsp;</td>
                  </tr>
              </tbody></table></td>
            </tr>
          </tbody></table>
          </td>
      </tr>
    </tbody></table></td>
  </tr>
  <tr>
    <td height="20"><table class="login-buttom-bg" border="0" width="100%" cellpadding="0" cellspacing="0">
      <tbody><tr>
        <td align="center"><span class="login-buttom-txt">Copyright © 2009</span></td>
      </tr>
    </tbody></table></td>
  </tr>
</tbody></table>
</body></html>