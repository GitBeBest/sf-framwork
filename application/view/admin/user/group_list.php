<div>
  <h1>部门管理</h1>
  <form id="form1" name="form1" method="post" action="<?=site_url("admin/usermanager/group_delete")?>">
    <div>
    <table>
    <tr>
    <th><input name="selectAll" id="selectAll" type="checkbox" />?</th><th>部门ID</th><th>部门名称</th><th>操作</th>
    </tr>
    <?php while($group = $pager->getObject()):?>
    <tr>
    <td><input name="select_id[]"  type="checkbox" value="<?=$group->getId()?>" /></td>
    <td><?=$group->getId()?></td>
    <td><?=$group->getUserGroupName()?></td>
    <td><a href="<?=site_url("admin/usermanager/group_delete/id/".$group->getId())?>">删除</a> <a href="<?=site_url("admin/usermanager/group_edit/id/".$group->getId())?>">编辑</a></td>
    </tr>
    <?php endwhile; ?>
    <tr>
    <td colspan="4"><input name="delete" type="submit" id="delete" value="删除" /><span class="pager_bar"><?=$pager->fromto().$pager->navbar(10)?></span></td>
    </tr>
    </table>
    </div>
  </form>
</div>
