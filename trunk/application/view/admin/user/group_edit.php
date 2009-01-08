<div>
  <table>
    <tr>
      <th colspan="2">权限组管理</th>
    </tr>
    <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/usermanager/group_edit")?>">
      <tr>
        <td>权限组名</td>
        <td><input name="user_group_name" type="text" id="user_group_name" value="<?=$group->getUserGroupName()?>" class="required"/><em>*</em></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" name="button" id="button" value="提交" />
          <input name="id" type="hidden" id="id" value="<?=$group->getId()?>" /></td>
      </tr>
    </form>
  </table>
</div>
