<div class="main">
  <div class="tools"> <a href="<?=site_url("admin/menu/edit/type/".$type)?>" class="add">新增菜单</a> </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <tr>
        <th>ID</th>
        <th>菜单名称</th>
		<th>菜单说明</th>
        <th>排序</th>
		<th>权限组</th>
        <th>操作</th>
      </tr>
      <?php while($menu = $pager->getObject()):?>
      <tr>
        <td align="center"><?=$menu->getId()?>
        <td align="left"><?=$menu->getHeadStr().$menu->getSubject()?></td>
		<td align="left"><?=$menu->getAlt(30)?></td>
        <td align="center"><?=$menu->getOrders()?></td>
		<td align="left"><?=$menu->getUserGroupName()?></td>
        <td align="center"> [<a href="<?=site_url("admin/menu/edit/type/".$menu->getType()."/pid/".$menu->getId())?>">增加菜单</a>]
          [<a href="<?=site_url("admin/menu/edit/type/".$menu->getType()."/id/".$menu->getId())?>">编辑菜单</a>]
          [<a href="<?=site_url("admin/menu/delete/type/".$menu->getType()."/id/".$menu->getId())?>" onclick="return confirm('系统将会把其下的所有子菜单删除，你确定要删除？');">删除菜单</a>] </td>
      </tr>
      <?php endwhile;?>
      <tr>
        <td colspan="6"><div class="pager_bar">
            <?=$pager->fromto().$pager->navbar(6).$pager->pagejump()?>
          </div></td>
      </tr>
    </table>
  </div>
</div>
