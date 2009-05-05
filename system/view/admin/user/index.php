<div class="main">
<div class="tools">
<a href="<?=site_url("admin/user/edit")?>" class="add">新增管理员</a>
<a href="#" onclick="if(confirm('删除后不可恢复，你确定删除？')) $('#validateForm').submit();" class="delete">删除选中项</a>
</div>
<div class="search">
<form id="form1" name="form1" method="post" action="<?=site_url("admin/user/index")?>">
  <label>用户登录名
  <input name="search" type="text" id="search" />
    <input type="submit" name="button" id="button" value="搜索" />
  </label>
</form>
</div>
<div class="box">
<table cellpadding="3" cellspacing="1" class="tb_data">
  <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/user/delete")?>">
    <tr>
      <th><input name="selectAll" id="selectAll" type="checkbox" /></th>
      <th><?=getColumnStr('登陆名称','user_name')?></th>
      <th><?=getColumnStr('用户名称','user_username')?></th>
      <th><?=getColumnStr('最后登录时间','lastlogin_at')?></th>
      <th><?=getColumnStr('登录次数','login_num')?></th>
      <th><?=getColumnStr('权限组','user_group_id')?></th>
      <th><?=getColumnStr('人员状态','is_lock')?></th>
      <th>操作</th>
    </tr>
    <?php while($user = $pager->getObject()):?>
    <tr>
      <td align="center"><input name="select_id[]"  type="checkbox" value="<?=$user->getId()?>" /></td>
      <td align="center"><?=$user->getUserName()?></td>
      <td align="center"><?=$user->getUserUsername()?></td>
      <td align="center"><?=$user->getLastloginAt("Y/m/d")?></td>
      <td align="center"><?=$user->getLoginNum()?></td>
      <td align="center"><?=$user->getUserGroupName()?></td>
      <td align="center"><?=$user->getState()?></td>
      <td align="center"><a href="<?=site_url("admin/user/delete/id/".$user->getId())?>" onclick="return confirm('删除后不可恢复，你确定删除？');">删除</a> <a href="<?=site_url("admin/user/edit/id/".$user->getId())?>">编辑</a></td>
    </tr>
    <?php endwhile; ?>
    <tr>
      <td colspan="9"><span class="pager_bar">
        <?=$pager->fromto().$pager->navbar(10)?>
        </span><input name="delete" type="submit" id="delete" value="删除选中项" onclick="return confirm('删除后不可恢复，你确定删除？');"/>
        </td>
    </tr>
  </form>
</table>
</div>
</div>