<script language="javascript" type="text/javascript">
$(function(){
	$.post("<?=site_url("comment/ajax")?>",{type:"<?=$article->getTypeStr().$article->getId()?>"},function(json){
		$("#comment").html(json);
	});
});
</script>

<table width="998" height="200" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="30" height="30" align="right"><strong><img src="<?=site_path("images/arrow001.gif")?>" width="16" height="10"></strong></td>
          <td><strong>当前位置:</strong> 首页&nbsp;&gt;&nbsp;<a href="<?=site_url("article/index/type/".$type)?>">新闻中心</a>&nbsp;&gt;&nbsp;
            <?=$article->getSubject()?></td>
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
          <td align="center" valign="top"><table width="94%" height="40" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="40" align="center" class="titbig"><?=$article->getSubject()?></td>
              </tr>
              <tr>
                <td height="20" align="center" valign="middle">发布时间:
                  <?=$article->getUpdatedAt("Y年m月d日")?></td>
              </tr>
              <tr>
                <td align="center" valign="middle" class="input">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="line24"><?=$article->getContent()?></td>
              </tr>
            </table>
            <table width="90%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center">&nbsp;</td>
              </tr>
            </table>
            <table width="94%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="1" bgcolor="#EBEBEB"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1"></td>
              </tr>
              <tr>
                <td height="10" bgcolor="#FFFFFF"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1"></td>
              </tr>
            </table>
            <table width="94%" border="0" cellpadding="0" cellspacing="1" bgcolor="#E1E1E1">
              <tr>
                <td align="center" valign="top" bgcolor="#FFFFFF"><table width="80%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="10"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1"></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="center"><div id="comment">加载中...</div></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      </table></td>
  </tr>
</table>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="20"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1"></td>
  </tr>
</table>
