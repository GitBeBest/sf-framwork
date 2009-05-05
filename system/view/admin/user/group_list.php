<div class="main">
  <div class="tools"> <a href="<?=site_url("admin/user/group_edit")?>" class="add">新增权限组</a> <a href="#" onclick="if(confirm('删除后不可恢复，你确定删除？')) $('#validateForm').submit();" class="delete">删除选中项</a> </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/user/group_delete")?>">
        <tr>
          <th><input name="selectAll" id="selectAll" type="checkbox" /></th>
          <th><?=getColumnStr('权限组ID','id')?></th>
          <th><?=getColumnStr('权限组名称','user_group_name')?></th>
          <th>操作</th>
        </tr>
        <?php while($group = $pager->getObject()):?>
        <tr>
          <td align="center"><input name="select_id[]"  type="checkbox" value="<?=$group->getId()?>" /></td>
          <td align="center"><?=$group->getId()?></td>
          <td align="center"><?=$group->getUserGroupName()?></td>
          <td align="center"><a href="<?=site_url("admin/user/group_delete/id/".$group->getId())?>" onclick="return confirm('删除后不可恢复，你确定删除？');">删除</a> <a href="<?=site_url("admin/user/group_edit/id/".$group->getId())?>">编辑</a></td>
        </tr>
        <?php endwhile; ?>
        <tr>
          <td colspan="4"><span class="pager_bar">
            <?=$pager->fromto().$pager->navbar(10)?>
            </span>
            <input name="delete" type="submit" id="delete" value="删除选中项"  onclick="return confirm('删除后不可恢复，你确定删除？');"/>
          </td>
        </tr>
      </form>
    </table>
  </div>
</div>
