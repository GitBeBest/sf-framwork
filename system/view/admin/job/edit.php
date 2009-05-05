<div class="main">
  <div class="tools"> <a href="<?=site_url("admin/job/index")?>" class="back">职位列表</a> <a href="#" onclick="$('#validateForm').submit();" class="save">保存资料</a> </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <caption class="caption_title">
      编辑职位信息
      </caption>
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/job/edit")?>">
        <tr>
          <th align="right" width="80">职位名称</th>
          <td><input name="subject" type="text" id="subject" value="<?=$job->getSubject()?>" size="30" class="required"/>
            <em>*</em></td>
          <th>职位待遇</th>
          <td><input name="guerdon" type="text" id="guerdon" value="<?=$job->getGuerdon()?>" size="30" class="required"/></td>
        </tr>
		<tr>
          <th align="right" width="80">所属部门</th>
          <td><input name="department" type="text" id="department" value="<?=$job->getDepartment()?>" size="30" class="required"/>
            <em>*</em></td>
          <th>年龄要求</th>
          <td><input name="age" type="text" id="age" value="<?=$job->getAge()?>" size="30" class="required"/></td>
		</tr>
		<tr>
          <th align="right" width="80">招聘人数</th>
          <td><input name="number" type="text" id="number" value="<?=$job->getNumber()?>" size="5" class="required number"/>
            人
          <em>*</em></td>
          <th>学历要求</th>
          <td><input name="degree" type="text" id="degree" value="<?=$job->getDegree()?>" size="30" class="required"/></td>
		</tr>
		<tr>
          <th align="right" width="80">工作地点</th>
          <td><input name="work_address" type="text" id="work_address" value="<?=$job->getWorkAddress()?>" size="30" class="required"/>
          <em>*</em></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
		</tr>
		<tr>
          <th align="right" width="80">详细要求</th>
          <td colspan="3"><?=sf::getPlugin("Fckeditor","content",$job->getContent(),'100%',450)->create()?></td>
        </tr>
        <tr>
          <th align="right">联系人</th>
          <td><label>
            <input name="linkman" type="text" id="linkman" value="<?=$job->getLinkman()?>" size="30" class="required"/>
          </label></td>
          <th>联系电话</th>
          <td><input name="linkman_phone" type="text" id="linkman_phone" value="<?=$job->getLinkmanPhone()?>" size="30" class="required"/></td>
        </tr>
        <tr>
          <th align="center">联系人IM</th>
          <td align="left"><input name="linkman_im" type="text" id="linkman_im" value="<?=$job->getLinkmanIm()?>" size="30" class="required"/></td>
          <th align="left">电子邮箱</th>
          <td align="left"><input name="linkman_email" type="text" id="linkman_email" value="<?=$job->getLinkmanEmail()?>" size="30" class="required email"/></td>
        </tr>
		 <tr>
          <th align="center">面试地点</th>
          <td colspan="3" align="left"><input name="address" type="text" id="address" value="<?=$job->getAddress()?>" size="60" class="required"/></td>
         </tr>
        <tr>
          <td colspan="4" align="center"><input type="submit" name="button" id="button" value="保存资料" />
            <input name="id" type="hidden" id="id" value="<?=$job->getId()?>" />
            <input name="fromUrl" type="hidden" id="fromUrl" value="<?=getFromUrl()?>" /></td>
        </tr>
      </form>
    </table>
  </div>
</div>
