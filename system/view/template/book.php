<table width="998" height="200" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="30" height="30" align="right"><strong><img src="<?=site_url("images/arrow001.gif")?>" width="16" height="10"></strong></td>
          <td><strong>当前位置:</strong> 首页&nbsp;&gt;&nbsp;在线留言</td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="1" bgcolor="#EBEBEB"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1"></td>
        </tr>
        <tr>
          <td height="10" bgcolor="#FFFFFF"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1"></td>
        </tr>
      </table>
      <table width="98%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="230" valign="top"><table width="218" border="0" cellspacing="1" bgcolor="#F1F1F1" class="line30">
              <form id="validateForm" name="validateForm" method="post" action="<?=site_url("book/edit")?>">
			  <tr>
                <td height="32" colspan="2" bgcolor="#F9F9F9">&nbsp;<span class="tit01">填写留言</span></td>
              </tr>
              <tr>
                <td bgcolor="#F9F9F9" class="line26">&nbsp;姓名：</td>
                <td bgcolor="#FAFAFA" class="line26"><input type="text" name="user_name" id="user_name"/>
                  <span class="STYLE1">*</span></td>
              </tr>
              <tr>
                <td bgcolor="#F9F9F9" class="line26">&nbsp;电话：</td>
                <td bgcolor="#FAFAFA" class="line26"><input type="text" name="user_phone" id="user_phone"/>
                </td>
              </tr>
              <tr>
                <td bgcolor="#F9F9F9" class="line26">&nbsp;QQ：</td>
                <td bgcolor="#FAFAFA" class="line26"><input type="text" name="user_qq" id="user_qq"/>
                </td>
              </tr>
              <tr>
                <td bgcolor="#F9F9F9" class="line26">&nbsp;邮件：</td>
                <td bgcolor="#FAFAFA" class="line26"><input type="text" name="user_email" id="user_email"/>
                </td>
              </tr>
              <tr>
                <td bgcolor="#F9F9F9" class="line26">&nbsp;验证：</td>
                <td bgcolor="#FAFAFA" class="line26"><img src="<?=site_url("common/index")?>" border="0" />
                <input name="SafetyCode" type="text" class="input1out" id="SafetyCode" size="5" maxlength="5"/></td>
              </tr>
              <tr>
                <td colspan="2" bgcolor="#F9F9F9" class="line26">&nbsp;留言内容：</td>
              </tr>
              <tr>
                <td colspan="2" bgcolor="#FAFAFA" class="line26"><textarea name="content" rows="5" id="content" style="width:100%;s"></textarea>
                  <span class="STYLE1">*</span></td>
              </tr>
              <tr>
                <td colspan="2" align="center" bgcolor="#FAFAFA" class="line26"><input type="image" src="<?=site_url("images/tjbtn01.png")?>" name="tjbtn" width="97" height="24" border="0"></td>
              </tr>
			  </form>
            </table></td>
          <td align="center" valign="top"><table width="92%" border="0" cellspacing="0" cellpadding="0">
		  <form id="searchf" name="searchf" method="post" action="">
              <tr>
                <td width="75%" height="30" align="right" class="tit01">留言搜索：</td>
                <td><input type="text" name="search" id="search"/></td>
                <td><input type="submit" name="button" id="button" value="搜索"/></td>
              </tr>
			  </form>
            </table>
			<?php while($book = $pager->getObject()):?>
            <table width="94%" border="0" cellpadding="0" cellspacing="1" bgcolor="#F1F1F1" class="line25" style="text-indent:12px; clear:left;">
              <tr>
                <td width="50" bgcolor="#F9F9F9">访客：</td>
                <td bgcolor="#F9F9F9" class="red"><?=$book->getUserName()?></td>
                <td align="right" bgcolor="#F9F9F9">时间：<span class="time"><?=$book->getUpdatedAt("Y/m/d")?></span></td>
              </tr>
              <tr>
                <td bgcolor="#F9F9F9">内容：</td>
                <td colspan="2" bgcolor="#FAFAFA"><?=$book->getContent()?></td>
              </tr>
              <tr>
                <td bgcolor="#F9F9F9">回复：</td>
                <td colspan="2" bgcolor="#FAFAFA"><?=$book->getWriteBack()?></td>
              </tr>
            </table>
            <br />
			<?php endwhile;?>
            <table width="94%" height="20" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td align="right" bgcolor="#EEEEEE"><span class="pager_bar">
            <?=$pager->fromto().$pager->navbar(10)?>
            </span></td>
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
