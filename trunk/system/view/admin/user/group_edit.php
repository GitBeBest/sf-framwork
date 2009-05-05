<div class="main">
<div class="tools">
<a href="javascript:history.go(-1);" class="back">返回</a>
<a href="#" onclick="$('#validateForm').submit();" class="save()">保存内容</a>
</div>
<div class="box">
<table cellpadding="3" cellspacing="1" class="tb_data">
    <caption class="caption_title">权限组管理</caption>
    <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/user/group_edit")?>">
      <tr>
        <th>权限组名</th>
        <td><input name="user_group_name" type="text" id="user_group_name" value="<?=$group->getUserGroupName()?>" class="required"/>
          <em>*</em></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="button" id="button" value="提交" />
          <input name="id" type="hidden" id="id" value="<?=$group->getId()?>" />
          <input name="fromUrl" type="hidden" id="fromUrl" value="<?=getFromUrl()?>" /></td>
      </tr>
    </form>
  </table>
</div>
</div>