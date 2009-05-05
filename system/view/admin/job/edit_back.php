<div class="main">
  <div class="tools"> <a href="<?=site_url("admin/job/back")?>" class="back">反馈列表</a> <a href="#" onclick="$('#validateForm').submit();" class="save">保存资料</a> </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <caption class="caption_title">
      处理应聘者信息
      </caption>
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/job/edit_back")?>">
        <tr>
          <th>姓 名</th>
          <td><?=$back->getUserName()?></td>
          <th>应聘职位</th>
          <td><?=$back->getSubject()?></td>
        </tr>
		<tr>
          <th>年 龄</th>
          <td><?=$back->getUserAge()?></td>
          <th>性 别</th>
          <td><?=$back->getUserSex()?></td>
		</tr>
		<tr>
          <th>身份证</th>
          <td><?=$back->getIdcard ()?></td>
          <th>电话</th>
          <td><?=$back->getUserPhone()?></td>
		</tr>
		<tr>
          <th>邮 箱</th>
          <td><?=$back->getUserEmail()?></td>
          <th>IM</th>
          <td><?=$back->getNote()?></td>
		</tr>
        <tr>
          <th>学 历</th>
          <td><?=$back->getUserDegree ()?></td>
          <th>地 址</th>
          <td><?=$back->getUserAddress()?></td>
        </tr>
        <tr>
          <th align="center">到岗时间</th>
          <td align="left"><?=$back->getWorkAt()?></td>
          <th align="center">邮编</th>
          <td align="left"><?=$back->getPostCode()?></td>
        </tr>
		 <tr>
          <th align="center">教育培训经历</th>
          <td colspan="3" align="left"><textarea name="textarea2" cols="60" rows="5" id="textarea2" style="width:100%;"><?=$back->getStudyList()?>
          </textarea></td>
         </tr>
		  <tr>
          <th align="center">工作经历</th>
          <td colspan="3" align="left"><textarea name="textarea" cols="60" rows="5"  id="textarea" style="width:100%;"><?=$back->getWorkList()?>
          </textarea></td>
         </tr>
		 <tr>
          <th align="right" width="80">处理意见</th>
          <td colspan="3"><textarea name="note" cols="60" rows="5" class="required" id="note" style="width:100%;"><?=$back->getNote()?>
          </textarea></td>
        </tr>
        <tr>
          <td colspan="4" align="center"><input type="submit" name="button" id="button" value="保存资料" />
            <input name="id" type="hidden" id="id" value="<?=$back->getId()?>" />
            <input name="fromUrl" type="hidden" id="fromUrl" value="<?=getFromUrl()?>" /></td>
        </tr>
      </form>
    </table>
  </div>
</div>
