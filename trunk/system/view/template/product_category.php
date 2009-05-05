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
          <td><strong>当前位置:</strong> 首页&nbsp;&gt;&nbsp;产品中心 &gt; <?=config::get("title")?></td>
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
          <td align="left">
		  <?php while($product = $pager->getObject()):?>
		  <ul class="product_category_list">
		  <li><a href="<?=site_url("product/show/type/".$product->getTypeStr()."/id/".$product->getId())?>"><img src="<?=site_path("up_files/".$product->getCover())?>" alt="<?=$product->getSubject()?>" width="120" height="100" border="0" boder="0" onerror="this.src='<?=site_path("images/nopic_s.png")?>'" /></a>
		  </li>
		  <li><h1><?=link_to("product/show/type/".$product->getTypeStr()."/id/".$product->getId(),$product->getSubject(20))?></h1><?=$product->getBrief(30)?></li>
		  </ul>
		  <?php endwhile;?>
		  </td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
      </table>
      <table width="96%" height="20" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" bgcolor="#EBEBEB"><span class="pager_bar">
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
