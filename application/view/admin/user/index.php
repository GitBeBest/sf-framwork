<div>
  <h1>人员管理</h1>
  <form id="form1" name="form1" method="post" action="<?=site_url("admin/usermanager/delete")?>">
    <div>
    <table>
    <tr>
    <th><input name="selectAll" id="selectAll" type="checkbox" />?</th><th>ID</th><th>登陆名</th><th>人员姓名</th><th>职务</th><th>权限组（部门）</th><th>人员状态</th><th>操作</th>
    </tr>
    <?php while($user = $pager->getObject()):?>
    <tr>
    <td><input name="select_id[]"  type="checkbox" value="<?=$user->getId()?>" /></td><td><?=$user->getId()?></td>
    <td><?=$user->getUserName()?></td>
    <td><?=$user->getUserUsername()?></td>
    <td><?=$user->getUserDuty()?></td>
    <td><?=$user->getUserGroupName()?></td>
    <td><?=$user->getState()?></td>
    <td><a href="<?=site_url("admin/usermanager/delete/id/".$user->getId())?>">删除</a> <a href="<?=site_url("admin/usermanager/edit/id/".$user->getId())?>">编辑</a></td>
    </tr>
    <?php endwhile; ?>
    <tr>
    <td colspan="8"><input name="delete" type="submit" id="delete" value="删除" /><span class="pager_bar"><?=$pager->fromto().$pager->navbar(10)?></span></td>
    </tr>
    </table>
    </div>
  </form>
</div>
