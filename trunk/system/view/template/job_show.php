<table width="998" height="200" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="30" height="30" align="right"><strong><img src="<?=site_path("images/arrow001.gif")?>" width="16" height="10"></strong></td>
              <td><strong>当前位置:</strong> 首页&nbsp;&gt;&nbsp;<a href="<?=site_url("job/index")?>">人才招聘</a>&nbsp;&gt;&nbsp;职位详情</td>
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
          <table width="94%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" align="center" cellspacing="1" bgcolor="#E0E4E9" style="border-collapse:collapse">
                  <tr>
                    <td height="30" colspan="4" align="left" bgcolor="#E7F0FA" class="lyb_txt"><span class="line20"><img src="<?=site_path("images/spacer.gif")?>" width="14" height="1"></span><span class="tit01">当前职位详情</strong></span></td>
                  </tr>
                  <tr>
                    <td width="16%" height="6" align="center" class="lyb_txt1">职位名称</td>
                    <td width="130" align="left" bgcolor="#FFFFFF" class="line20"><span class="zhongdian"><?=$job->getSubject()?></span>&nbsp;</td>
                    <td width="14%" align="center" bgcolor="#FFFFFF" class="line20">职位待遇</td>
                    <td width="36%" align="left" bgcolor="#FFFFFF" class="line20"><?=$job->getGuerdon()?>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="6" align="center" class="lyb_txt1">所属部门</td>
                    <td align="left" bgcolor="#FFFFFF" class="line20"><?=$job->getDepartment()?>&nbsp;</td>
                    <td align="center" bgcolor="#FFFFFF" class="line20">年龄要求</td>
                    <td align="left" bgcolor="#FFFFFF" class="line20"><?=$job->getAge()?>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="13" align="center" class="lyb_txt1">招聘人数</td>
                    <td align="left" bgcolor="#FFFFFF" class="line20"><?=$job->getNumber()?>&nbsp;</td>
                    <td align="center" bgcolor="#FFFFFF" class="line20">学历要求</td>
                    <td align="left" bgcolor="#FFFFFF" class="line20"><?=$job->getDegree()?>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="13" align="center" class="lyb_txt1">工作地点</td>
                    <td align="left" bgcolor="#FFFFFF" class="line20"><?=$job->getWorkAddress()?>&nbsp;</td>
                    <td align="center" bgcolor="#FFFFFF" class="line20">&nbsp;</td>
                    <td align="left" bgcolor="#FFFFFF" class="line20">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="3" align="center" class="lyb_txt1">详细要求</td>
                    <td colspan="3" align="left" bgcolor="#FFFFFF" class="line26"><?=$job->getContent()?>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="3" align="center" class="lyb_txt1">应聘职位</td>
                    <td colspan="3" align="left" bgcolor="#FFFFFF" class="line20"><a href="<?=site_url("job/send/id/".$job->getId())?>"><img src="<?=site_path("images/ypbtn.gif")?>" width="80" height="27" border="0"></a></td>
                  </tr>
              </table></td>
            </tr>
          </table>
          <table width="88%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center">&nbsp;</td>
            </tr>
          </table>
          <table width="94%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" align="center" cellspacing="1" bgcolor="#E0E4E9" style="border-collapse:collapse">
                  <tr>
                    <td height="30" colspan="4" align="left" bgcolor="#E7F0FA" class="lyb_txt"><span class="line20"><img src="<?=site_path("images/spacer.gif")?>" width="14" height="1"></span><span class="tit01">线下应聘联络方式</strong></span></td>
                  </tr>
                  <tr>
                    <td width="16%" height="6" align="center" class="lyb_txt1">招聘主管：</td>
                    <td width="130" align="left" bgcolor="#FFFFFF" class="line20"><?=$job->getLinkMan()?>&nbsp;</td>
                    <td width="14%" align="center" bgcolor="#FFFFFF" class="line20">联络QQ：</td>
                    <td width="36%" align="left" bgcolor="#FFFFFF" class="line20"><?=$job->getLinkmanIm()?>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="6" align="center" class="lyb_txt1">咨询电话：</td>
                    <td align="left" bgcolor="#FFFFFF" class="line20"><?=$job->getLinkManPhone()?>&nbsp;</td>
                    <td align="center" bgcolor="#FFFFFF" class="line20">联络邮箱：</td>
                    <td align="left" bgcolor="#FFFFFF" class="line20"><?=$job->getLinkmanEmail()?>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="13" align="center" class="lyb_txt1">面试地址：</td>
                    <td colspan="3" align="left" bgcolor="#FFFFFF" class="line20"><?=$job->getAddress()?>&nbsp;</td>
                    </tr>

              </table></td>
            </tr>
          </table>