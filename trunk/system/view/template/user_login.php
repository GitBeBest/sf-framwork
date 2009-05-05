<table width="998" height="200" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="30" height="30" align="right"><strong><img src="<?=site_url("images/arrow001.gif")?>" width="16" height="10" /></strong></td>
        <td><strong>当前位置:</strong> 首页&nbsp;&gt;&nbsp;会员登陆</td>
      </tr>
    </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="1" bgcolor="#EBEBEB"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1" /></td>
          </tr>
          <tr>
            <td height="20" bgcolor="#FFFFFF"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1" /></td>
          </tr>
        </table>
      <table width="98%" height="300" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="500" align="center" valign="top"><table width="80%" border="0" cellpadding="0" cellspacing="1" bgcolor="#E1E1E1">
                <tr>
                  <td height="220" align="center" valign="top" background="<?=site_url("images/dl.jpg")?>" bgcolor="#FFFFFF"><table width="99%" height="34" border="0" cellpadding="0" cellspacing="0" bgcolor="#F7F7F7">
                      <tr>
                        <td background="<?=site_url("images/titbg02.jpg")?>"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="12"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1" /></td>
                              <td class="denglu"><strong>注册会员登陆</strong></td>
                            </tr>
                        </table></td>
                      </tr>
                    </table>
                      <table width="80%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="22"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1" /></td>
                        </tr>
                      </table>
					  <?php if($user->getId()):?>
					<table width="90%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="27%" class="line24">您的昵称：</td>
                          <td width="73%" height="30"><?=$user->getUserUsername()?></td>
                        </tr>
                        <tr>
                          <td height="30" class="line24">您的身份：</td>
                          <td><?=$user->getUserGroupName()?></td>
                        </tr>
                        <tr>
                          <td height="30" class="line24">累计登陆次数：</td>
                          <td><?=$user->getLoginNum()?></td>
                        </tr>
						<tr>
                          <td height="30" class="line24">你的登陆IP：</td>
                          <td><?=$user->getUserIp()?></td>
                        </tr>
						<tr>
                          <td height="30" class="line24">你可用的操作：</td>
                          <td>【<a href="<?=site_url("login/logout")?>">退出系统</a>】 【<a href="<?=site_url("login/password")?>">修改密码</a>】</td>
                        </tr>
				    </table>
					<?php else:?>
					<table width="90%" border="0" cellpadding="0" cellspacing="0">
                        <form action="" method="post" name="form1" id="form1">
                          <tr>
                            <td width="27%" class="line24">您的昵称：</td>
                            <td width="73%" height="30"><input name="username" type="text" id="username" size="16" /></td>
                          </tr>
                          <tr>
                            <td height="30" class="line24">您的注册密码：</td>
                            <td><input name="password" type="text" id="password" size="16" /></td>
                          </tr>
						  <tr>
                            <td height="30" class="line24">验证码：</td>
                            <td><input name="SafetyCode" type="text" id="SafetyCode" size="5" maxlength="5" />
                            <img src="<?=site_url("common/index")?>" align="absmiddle" /></td>
                          </tr>
                          <tr>
                            <td colspan="2"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td height="38" align="center"><input type="image" src="<?=site_url("images/skin_reg.gif")?>" width="60" height="24" />&nbsp;<a href="#"><img src="<?=site_url("images/skin_submit.gif")?>" width="60" height="24" border="0" /></a></td>
                                </tr>
                            </table></td>
                          </tr>
                        </form>
                    </table>
					<?php endif;?>
                    <table width="80%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="10"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1" /></td>
                        </tr>
                    </table></td>
                </tr>
            </table></td>
            <td align="center" valign="top"><table width="60%" border="0" cellspacing="5" cellpadding="0">
                <tr>
                  <td class="tit01green">会员登陆小提示</td>
                </tr>
                <tr>
                  <td class="line26"><span class="gray">&gt; <a rel="nofollow" href="<?=site_url("login/edit")?>">我还没有注册</a></span></td>
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
    <td height="20"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1" /></td>
  </tr>
</table>
