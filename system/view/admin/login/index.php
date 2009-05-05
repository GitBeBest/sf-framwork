<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>管理员登录</title>
</head>

<body>
<table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1003" height="40"><table width="372" border="0" align="center" cellpadding="3" cellspacing="1" class="tb_data">
      <form id="form1" name="form1" method="post" action="">
        <tr>
          <td height="36"><span class="STYLE1">用&nbsp;&nbsp;户：&nbsp;&nbsp;</span>
              <input name="username" type="text" id="username" style="width:200px; height:16px; background-color:#292929; border:solid 1px #7dbad7; font-size:12px; color:#6cd0ff" /></td>
        </tr>
        <tr>
          <td height="23"><span class="STYLE1">密 &nbsp;码：&nbsp;&nbsp;</span>
              <input name="password" type="password" id="password" style="width:200px; height:16px; background-color:#292929; border:solid 1px #7dbad7; font-size:12px; color:#6cd0ff" /></td>
        </tr>
        <tr>
          <td height="23"><span class="STYLE1">验证码：&nbsp;&nbsp;</span>
              <input name="SafetyCode" type="text" id="SafetyCode" style="width:100px; height:16px; background-color:#292929; border:solid 1px #7dbad7; font-size:12px; color:#6cd0ff" />
              <img src="<?=site_url("common/index")?>" align="absmiddle" /></td>
        </tr>
        <tr>
          <td align="center"><label>
            <input type="submit" name="Submit" value=" 登 陆 " /> 
            <input type="reset" name="Submit2" value=" 重 置 " />
          </label></td>
        </tr>
      </form>
    </table></td>
  </tr>
</table>
</body>
</html>
