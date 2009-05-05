<table width="998" height="200" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="30" height="30" align="right"><strong><img src="<?=site_path("images/arrow001.gif")?>" width="16" height="10"></strong></td>
              <td><strong>当前位置:</strong> 首页&nbsp;&gt;&nbsp;人才招聘</td>
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
              <td align="center" valign="top"><table width="88%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="right"><table width="36%" border="0" cellspacing="0" cellpadding="0">
                    <form action="" method="post" name="search">
					<tr>
                      <td class="tit01">职位搜索:</td>
                      <td><input type="text" name="search"></td>
                      <td><input type="image" src="<?=site_path("images/ssbtn01.png")?>" name="ssbtn" width="60" height="22" border="0"></td>
                    </tr>
					</form>
                  </table></td>
                </tr>
              </table>
                <table width="88%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center">&nbsp;</td>
                  </tr>
                </table>
                <table width="94%" align="center" cellspacing="1" bgcolor="#E0E4E9" style="border-collapse:collapse">
                  <tr>
                    <td height="30" align="center" bgcolor="#EBEBEB" class="tit01">当前职位详情</strong></td>
                    <td height="30" align="center" bgcolor="#EBEBEB" class="tit01">人数</td>
                    <td height="30" align="center" bgcolor="#EBEBEB" class="tit01">年龄要求</td>
                    <td height="30" align="center" bgcolor="#EBEBEB" class="tit01">所属部门</td>
                    <td height="30" align="center" bgcolor="#EBEBEB" class="tit01">工作地点</td>
                    <td height="30" align="center" bgcolor="#EBEBEB" class="tit01">发布时间</td>
                  </tr>
				  <?php while($job = $pager->getObject()):?>
                  <tr>
                    <td width="146" height="6" align="center" class="lyb_txt1"><?=link_to("job/show/id/".$job->getId(),$job->getSubject())?></td>
                    <td width="58" align="center" bgcolor="#FFFFFF" class="line20"><?=$job->getNumber()?></td>
                    <td width="85" align="center" bgcolor="#FFFFFF" class="line20"><?=$job->getAge()?></td>
                    <td width="100" align="left" bgcolor="#FFFFFF" class="line20"><?=$job->getDepartment()?></td>
                    <td width="322" align="left" bgcolor="#FFFFFF" class="line20"><?=$job->getWorkAddress()?></td>
                    <td width="146" align="center" bgcolor="#FFFFFF" class="line20"><?=$job->getUpdatedAt("Y/m/d")?></td>
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
          <table width="90%" height="20" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td align="right" bgcolor="#FFFFFF"><span class="pager_bar">
            <?=$pager->fromto().$pager->navbar(10)?>
            </span></td>
            </tr>
          </table></td>
      </tr>
    </table>
    <table width="80%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="20"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1"></td>
      </tr>
    </table>