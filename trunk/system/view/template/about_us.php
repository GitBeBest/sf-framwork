<table width="998" height="200" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="210" align="center" valign="top"><table width="80%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="10"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1"><img src="<?=site_path("images/gg.jpg")?>" width="210" height="88"></td>
        </tr>
      </table>
      <table width="80%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="10"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1"></td>
        </tr>
      </table>
      <table width="218" border="0" cellspacing="1" bgcolor="#F1F1F1" class="line30">
        <tr>
          <td height="32" bgcolor="#F0F0F0">&nbsp;<span class="tit01">公司简介</span></td>
        </tr>
		<tr>
          <td height="10" bgcolor="#FFFFFF"><?=selectPageListByTypeStr($type,0)?></td>
        </tr>
      </table></td>
    <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="30" height="30" align="right"><strong><img src="<?=site_path("images/arrow001.gif")?>" width="16" height="10"></strong></td>
          <td><strong>当前位置:</strong> 首页&nbsp;&gt;&nbsp;
            <?=$page->getSubject()?></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="1" bgcolor="#EBEBEB"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1"></td>
        </tr>
        <tr>
          <td height="10" bgcolor="#FFFFFF"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" valign="top"><table width="92%" height="40" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="40" align="center" class="titbig"><?=$page->getSubject()?></td>
              </tr>
              <tr>
                <td height="20" align="center" valign="middle">发布时间:
                  <?=$page->getUpdatedAt("Y-m-d")?></td>
              </tr>
              <tr>
                <td align="center" valign="middle" class="input">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="line24"><?=$page->getContent()?></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="96%" height="20" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="20"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1"></td>
  </tr>
</table>
