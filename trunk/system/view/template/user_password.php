<table width="998" height="200" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="30" height="30" align="right"><strong><img src="<?=site_path("images/arrow001.gif")?>" width="16" height="10" /></strong></td>
        <td><strong>当前位置:</strong> 首页&nbsp;&gt;&nbsp;会员登陆&nbsp;&gt;&nbsp;修改密码</td>
      </tr>
    </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="1" bgcolor="#EBEBEB"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1" /></td>
          </tr>
          <tr>
            <td height="10" bgcolor="#FFFFFF"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1" /></td>
          </tr>
        </table>
      <table width="98%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="550" align="center" valign="top"><table width="80%" border="0" cellspacing="5" cellpadding="0">
			<tr>
                  <td class="tit01green"><?=$msg?></td>
                </tr>
                <form action="" method="post" name="edit">
				<tr>
                  <td class="tit01green">请输入你原始的密码:</td>
                </tr>
                <tr>
                  <td class="line26"><input id="name" name="oldpassword" type="password" size="10" maxlength="15"/></td>
                </tr>
                <tr>
                  <td height="32" class="tit01green">给自己设一个新密码:</td>
                </tr>
                <tr>
                  <td class="line26"><input id="password" name="password" type="text" size="10" maxlength="20" value=""/>
                      <span id="p_hint" class="red hint">请输入密码</span></td>
                </tr>
                <tr>
                  <td class="line26"><span class="gray">最少4个字符，请使用英文字母（区分大小写）、符号或数字。</span></td>
                </tr>

                <tr>
                  <td class="tit01green">填写验证码:</td>
                </tr>
                <tr>
                  <td class="line26"><input name="SafetyCode" type="text" id="SafetyCode" size="5" maxlength="5" />
                    <img src="<?=site_url("common/index")?>" align="absmiddle" /><span id="c_hint" class="red hint">请输入验证码</span></td>
                </tr>
                <tr>
                  <td class="line26"><a href="#" class="gray">看不清、换一个</a></td>
                </tr>
                <tr>
                  <td class="line26"><input name="submit" type="submit" class="butt" id="submit" value="修改密码"/></td>
                </tr>
				</form>
            </table></td>
            <td align="center" valign="top"><table width="60%" border="0" cellspacing="5" cellpadding="0">
                <tr>
                  <td class="tit01green">注册小贴士</td>
                </tr>
                <tr>
                  <td class="line26">绝不公开你的Email。</td>
                </tr>
                <tr>
                  <td class="line26">是否接受来至我们的邮件提醒完全由你自己决定。</td>
                </tr>
                <tr>
                  <td class="line26">建议填写常用的Email地址，这样你就不会错过精彩内容。</td>
                </tr>
                <tr>
                  <td class="line26">&gt; <a href="<?=site_url("login/index")?>">已注册请登录</a></td>
                </tr>
              </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center">&nbsp;</td>
                  </tr>
              </table></td>
          </tr>
        </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center">&nbsp;</td>
          </tr>
      </table></td>
  </tr>
</table>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="20"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1" /></td>
  </tr>
</table>
