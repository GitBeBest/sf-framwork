<table width="998" height="200" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="210" align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#E1E1E1">
        <tr>
          <td align="center" valign="top" bgcolor="#FFFFFF"><table width="99%" height="30" border="0" cellpadding="0" cellspacing="0" bgcolor="#F7F7F7">
              <tr>
                <td class="titbg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="12"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1"></td>
                      <td class="tit01">新闻分类</td>
                      <td width="44">&nbsp;</td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="10"><?=selectArticleTreeByTypeStr('',$type,0)?></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <table width="80%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="10"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1"><img src="<?=site_url("images/gg.jpg")?>" width="210" height="88"></td>
        </tr>
      </table>
      <table width="80%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="10"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#E1E1E1">
        <tr>
          <td align="center" valign="top" bgcolor="#FFFFFF"><table width="99%" height="30" border="0" cellpadding="0" cellspacing="0" bgcolor="#F7F7F7">
              <tr>
                <td class="titbg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="12"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1"></td>
                      <td class="tit01">推荐文章</td>
                      <td width="44"><a href="<?=site_url("article/top/type/".$type)?>">更 多</a></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="10"><?=selectArticleTopByTypeStr($type,10)?></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <table width="80%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="10"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1"></td>
        </tr>
      </table></td>
    <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="30" height="30" align="right"><strong><img src="<?=site_url("images/arrow001.gif")?>" width="16" height="10"></strong></td>
          <td><strong>当前位置:</strong> 首页&nbsp;&gt;&nbsp;<a href="<?=site_url("article/index/type/".$type)?>">新闻中心</a>&nbsp;&gt;&nbsp;<?=config::get('title','所有分类')?></td>
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
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" valign="top"><table class="line28" width="94%" border="0" cellspacing="1" cellpadding="0">
              <tr class="denglu">
                <th height="32" bgcolor="#757984">新闻标题</th>
                <th bgcolor="#757984">所属分类</th>
                <th bgcolor="#757984">发布时间</th>
              </tr>
			  <?php
			  while($article = $pager->getObject()):
			  if($pager->getCurRow()%2 == 0) $bgcolor = '#F3F3F3';
			  else $bgcolor = '#FAFAFA';
			  ?>
              <tr>
                <td bgcolor="<?=$bgcolor?>">&nbsp;&nbsp;&middot;&nbsp;<?=link_to("article/show/type/".$type."/id/".$article->getId(),$article->getSubject(),array('target'=>'_blank'))?></td>
                <td align="center" bgcolor="<?=$bgcolor?>"><?=$article->getCategoryName()?></td>
                <td align="center" bgcolor="<?=$bgcolor?>"><?=$article->getUpdatedAt("Y/m/d")?></td>
              </tr>
			  <?php endwhile;?>
            </table></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
      </table>
      <table width="98%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="1" bgcolor="#EBEBEB"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1"></td>
        </tr>
        <tr>
          <td height="10" bgcolor="#FFFFFF"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1"></td>
        </tr>
      </table>
      <table width="96%" height="20" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" bgcolor="#FFFFFF"><span class="pager_bar">
            <?=$pager->fromto().$pager->navbar(10)?>
            </span></td>
        </tr>
      </table></td>
  </tr>
</table>
