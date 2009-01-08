<div>
<table>
<tr>
  <th colspan="2">编辑人员资料</th>
  </tr>
<form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/usermanager/edit")?>">
  <tr>
    <td>登陆名</td>
    <td><input name="user_name" type="text" id="user_name" value="<?=$user->getUserName()?>" class="required"/><em>*</em></td>
  </tr>
  <tr>
    <td>所属权限组</td>
    <td><select name="user_group_id" id="user_group_id" class="required">
        <?php while($user_group = $pager->getObject()):?>
        <option value="<?=$user_group->getId()?>" <?php if($user_group->getId() == $user->getUserGroupId()) echo 'selected="selected"';?>>
        <?=$user_group->getUserGroupName()?>
        </option>
        <?php endwhile;?>
      </select><em>*</em></td>
  </tr>
  <tr>
    <td>登陆密码</td>
    <td><input name="user_password" type="text" id="user_password" value="" /></td>
  </tr>
  <tr>
    <td>用户名</td>
    <td><input name="user_username" type="text" id="user_username" value="<?=$user->getUserUsername()?>" class="required"/><em>*</em></td>
  </tr>
  <tr>
    <td>职务</td>
    <td><input name="user_duty" type="text" id="user_duty" value="<?=$user->getUserDuty()?>" class="required"/><em>*</em></td>
  </tr>
  <tr>
    <td>状态</td>
    <td><input name="is_lock" type="checkbox" id="is_lock" value="1" <?php if($user->getIsLock() == 1) echo 'checked="checked"';?>/>
      锁定</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><label>
        <input type="submit" name="button" id="button" value="Save" />
      </label>
      <input name="id" type="hidden" id="id" value="<?=$user->getId()?>" /></td>
  </tr>
</form>
</table>
</div>
