<div class="main">
  <div class="tools"> <a href="javascript:history.go(-1);" class="back">返回</a> <a href="#" onclick="$('#validateForm').submit();" class="save">保存资料</a> </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <caption class="caption_title">
      编辑人员资料
      </caption>
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/user/edit")?>">
        <tr>
          <th>登陆名</th>
          <td><input name="user_name" type="text" id="user_name" value="<?=$user->getUserName()?>" class="required"/>
            <em>*</em></td>
        </tr>
        <tr>
          <th>用户名</th>
          <td><input name="user_username" type="text" id="user_username" value="<?=$user->getUserUsername()?>" class="required"/>
            <em>*</em></td>
        </tr>
        <tr>
          <th>所属权限组</th>
          <td><select name="user_group_id" id="user_group_id" class="required">
              <?php while($user_group = $pager->getObject()):?>
              <option value="<?=$user_group->getId()?>" <?php if($user_group->getId() == $user->getUserGroupId()) echo 'selected="selected"';?>>
              <?=$user_group->getUserGroupName()?>
              </option>
              <?php endwhile;?>
            </select>
            <em>*</em></td>
        </tr>
        <tr>
          <th>登陆密码</th>
          <td><input name="user_password" type="text" id="user_password" value="" />
            (不修改密码时请留空不填)</td>
        </tr>
        <tr>
          <th>电子邮件</th>
          <td><input name="user_email" type="text" id="user_email" value="<?=$user->getUserEmail()?>" class="required"/>
            <em>*（如：xxxx@xxx.xxx）</em></td>
        </tr>
        <tr>
          <th>状态</th>
          <td><input name="is_lock" type="checkbox" id="is_lock" value="1" <?php if($user->getIsLock() == 1) echo 'checked="checked"';?>/>
            通过</td>
        </tr>
        <tr>
          <td colspan="2" align="center"><label>
            <input type="submit" name="button" id="button" value="保存资料" />
            </label>
            <input name="id" type="hidden" id="id" value="<?=$user->getId()?>" />
            <input name="fromUrl" type="hidden" id="fromUrl" value="<?=getFromUrl()?>" /></td>
        </tr>
      </form>
    </table>
  </div>
</div>
