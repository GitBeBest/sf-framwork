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
    <table width="94%" cellpadding="3" cellspacing="1" bgcolor="#efefef">
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("job/send")?>">
        <tr>
          <th width="80" bgcolor="#F3F3F3">姓 名</th>
          <td bgcolor="#FFFFFF"><label>
            <input name="user_name" type="text" id="user_name" class="required"/>
            </label></td>
          <th width="80" bgcolor="#F3F3F3">应聘职位</th>
          <td bgcolor="#FFFFFF"><input name="subject" type="text" id="subject" value="<?=$job->getSubject()?>" readonly="readonly" /></td>
        </tr>
        <tr>
          <th bgcolor="#F3F3F3">年 龄</th>
          <td bgcolor="#FFFFFF"><input name="user_age" type="text" id="user_age" class="required number"/></td>
          <th bgcolor="#F3F3F3">性 别</th>
          <td bgcolor="#FFFFFF"><input name="user_sex" type="text" id="user_sex" class="required"/></td>
        </tr>
        <tr>
          <th bgcolor="#F3F3F3">身份证</th>
          <td bgcolor="#FFFFFF"><input name="idcard" type="text" id="idcard" class="required"/></td>
          <th bgcolor="#F3F3F3">电话</th>
          <td bgcolor="#FFFFFF"><input name="user_phone" type="text" id="user_phone" class="required"/></td>
        </tr>
        <tr>
          <th bgcolor="#F3F3F3">邮 箱</th>
          <td bgcolor="#FFFFFF"><input name="user_email" type="text" id="user_email" class="required"/></td>
          <th bgcolor="#F3F3F3">IM</th>
          <td bgcolor="#FFFFFF"><input name="user_im" type="text" id="user_im" class="required"/></td>
        </tr>
        <tr>
          <th bgcolor="#F3F3F3">学 历</th>
          <td bgcolor="#FFFFFF"><input name="user_degree" type="text" id="user_degree" class="required"/></td>
          <th bgcolor="#F3F3F3">地 址</th>
          <td bgcolor="#FFFFFF"><input name="user_address" type="text" id="user_address" size="60" class="required"/></td>
        </tr>
        <tr>
          <th align="center" bgcolor="#F3F3F3">到岗时间</th>
          <td align="left" bgcolor="#FFFFFF"><input name="work_at" type="text" id="work_at" class="required"/></td>
          <th align="center" bgcolor="#F3F3F3">邮编</th>
          <td align="left" bgcolor="#FFFFFF"><input name="post_code" type="text" id="post_code" class="required"/></td>
        </tr>
        <tr>
          <th align="center" bgcolor="#F3F3F3">教育培训经历</th>
          <td colspan="3" align="left" bgcolor="#FFFFFF"><textarea name="study_list" cols="60" rows="5" id="study_list" style="width:100%;" class="required">
          </textarea></td>
        </tr>
        <tr>
          <th align="center" bgcolor="#F3F3F3">工作经历</th>
          <td colspan="3" align="left" bgcolor="#FFFFFF"><textarea name="work_list " cols="60" rows="5"  id="work_list " style="width:100%;" class="required"></textarea></td>
        </tr>
        <tr>
          <td colspan="4" align="center"><input type="image" src="<?=site_path("images/jltdbtn01.png")?>" name="jltdbtn" width="97" height="24" border="0" id="jltdbtn" />
            <input name="id" type="hidden" id="id" value="<?=$job->getId()?>" />
            <input name="fromUrl" type="hidden" id="fromUrl" value="<?=getFromUrl()?>" /></td>
        </tr>
      </form>
    </table>
    <br />
