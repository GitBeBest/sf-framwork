<link rel="stylesheet" type="text/css" href="<?=site_path("fancybox/jquery.fancybox.css")?>" media="screen" />
<script type="text/javascript" src="<?=site_path("fancybox/jquery.easing.js")?>"></script>
<script type="text/javascript" src="<?=site_path("fancybox/jquery.fancybox.js")?>"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(".fancybox").fancybox();
});
</script>
<table width="998" height="200" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="210" align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#E1E1E1">
        <tr>
          <td align="center" valign="top" bgcolor="#FFFFFF"><table width="99%" height="30" border="0" cellpadding="0" cellspacing="0" bgcolor="#F7F7F7">
              <tr>
                <td class="titbg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="12"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1" /></td>
                      <td class="tit01">产品分类</td>
                      <td width="44"><a href="#"></a></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="10"><?=selectProductTreeByTypeStr('',$type,0)?></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="80%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="10"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1" /><img src="<?=site_path("images/gg.jpg")?>" width="210" height="88" /></td>
        </tr>
      </table>
      <table width="80%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="10"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1" /></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#E1E1E1">
        <tr>
          <td align="center" valign="top" bgcolor="#FFFFFF"><table width="99%" height="30" border="0" cellpadding="0" cellspacing="0" bgcolor="#F7F7F7">
              <tr>
                <td class="titbg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="12"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1" /></td>
                      <td class="tit01">推荐产品</td>
                      <td width="44"><a href="<?=site_url("product/top/type/".$type)?>">更 多</a></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="10"><?=selectProductTopByTypeStr($type,3)?></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="80%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="10"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1" /></td>
        </tr>
      </table></td>
    <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="30" height="30" align="right"><strong><img src="<?=site_path("images/arrow001.gif")?>" width="16" height="10" /></strong></td>
          <td><strong>当前位置:</strong> 首页&nbsp;&gt;&nbsp;<a href="<?=site_url("product/index/type/".$type)?>">产品中心</a> &gt;
            <?=config::get("title")?></td>
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
      <table width="92%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="212" align="center"><table width="193" height="140" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
              <tr>
                <td align="center" valign="middle" bgcolor="#FFFFFF"><a rel="group" title="Group title #1" href="<?=site_path("up_files/".$product->getCover())?>" class="fancybox"><img src="<?=site_path("up_files/".$product->getCover())?>" width="230" height="170" border="0" onerror="this.src='<?=site_path("images/cpzx.png")?>'" /></a></td>
              </tr>
            </table>
            <table width="80%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="6"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1" /></td>
              </tr>
            </table>
            <table width="90%" border="0" cellspacing="1" cellpadding="3">
              <tr>
                <td align="center"><a rel="group" title="Group title #1" href="<?=site_path("up_files/".$product->getImages(1))?>" class="fancybox"><img src="<?=site_path("up_files/".$product->getImages(1))?>" width="70" height="51" border="0" onerror="this.src='<?=site_path("images/gm.png")?>'" /></a></td>
                <td align="center"><a rel="group" title="Group title #1" href="<?=site_path("up_files/".$product->getImages(2))?>" class="fancybox"><img src="<?=site_path("up_files/".$product->getImages(2))?>" width="70" height="51" border="0" onerror="this.src='<?=site_path("images/gm.png")?>'" /></a></td>
                <td align="center"><a rel="group" title="Group title #1" href="<?=site_path("up_files/".$product->getImages(3))?>" class="fancybox"><img src="<?=site_path("up_files/".$product->getImages(3))?>" width="70" height="51" border="0" onerror="this.src='<?=site_path("images/gm.png")?>'" /></a></td>
              </tr>
            </table></td>
          <td width="368" valign="top" class="line22"><table width="100%" border="0" cellpadding="2" cellspacing="2" style="line-height:24px;">
              <tr>
                <td width="88"><strong>产品名称：</strong></td>
                <td width="343"><?=$product->getSubject()?>
                  &nbsp;</td>
              </tr>
              <tr>
                <td><strong>产品单价：</strong></td>
                <td><?=$product->getPrice()?>
                  &nbsp;</td>
              </tr>
              <tr>
                <td height="121" colspan="2" valign="top"><strong>简要说明：</strong>
                  <?=$product->getBrief()?></td>
              </tr>
              <tr>
                <form action="" method="post" name="form1" id="form1">
                  <td colspan="2" class="line18"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="48%">&nbsp;</td>
                        <td width="52%"><a href="<?=site_url("order_from/index/type/".$type."/subject/".$product->getSubject())?>"><img src="<?=site_path("images/gmbtn.png")?>" width="71" height="25" border="0" /></a></td>
                      </tr>
                    </table></td>
                </form>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
      </table>
      <table width="98%" border="0" cellpadding="0" cellspacing="1" bgcolor="#F2F2F2" style="line-height:25px;">
        <tr>
          <td align="left" bgcolor="#F7F7F7"><strong>详细说明如下</strong></td>
        </tr>
      </table>
      <table width="98%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" class="line26"><?=$product->getContent()?></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
