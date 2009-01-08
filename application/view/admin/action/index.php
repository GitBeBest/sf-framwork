<div>
  <h1>权限管理</h1>
  <form id="form1" name="form1" method="post" action="<?=site_url("action/delete")?>">
    <div>
    <table border="0" cellpadding="1" cellspacing="1">
    <tr>
    <th><input name="selectAll" id="selectAll" type="checkbox" />?</th><th>ID</th><th>权限名</th><th>控制器名</th><th>方法名</th><th>权限组</th><th>操作</th>
    </tr>
    <?php while($action = $pager->getObject()):?>
    <tr>
    <td><input name="select_id[]"  type="checkbox" value="<?=$action->getId()?>" /></td><td><?=$action->getId()?></td>
    <td><?=$action->getControllerName()?></td>
    <td><?=$action->getController()?></td>
    <td><?=$action->getMethod()?></td>
    <td><?php print_r($action->getUserGroupName());?></td>
    <td><a href="<?=site_url("admin/action/delete/id/".$action->getId())?>">删除</a> <a href="<?=site_url("admin/action/edit/id/".$action->getId())?>">权限</a></td>
    </tr>
    <?php endwhile; ?>
    <tr>
    <td colspan="7" align="left"><input name="delete" type="submit" id="delete" value="删除" /><span class="pager_bar"><?=$pager->fromto().$pager->navbar(10)?></span></td>
    </tr>
    </table>
    </div>
  </form>
</div>
