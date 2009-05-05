<div class="main">
<div class="tools">
<a href="<?=site_url("admin/category/edit/type/".$type)?>" class="add">新增字典</a>
</div>
<div class="box">
<table cellpadding="3" cellspacing="1" class="tb_data">
  <tr>
    <th>ID</th>
    <th>字典名</th>
    <th>排序</th>
    <th>操作</th>
  </tr>
  <?php while($category = $pager->getObject()):?>
  <tr>
    <td align="center"><?=$category->getId()?>
    <td align="left"><?=$category->getHeadStr().$category->getSubject()?><?php if($category->getIsHome() > 0) echo '[H]';?></td>
    <td align="center"><?=$category->getOrders()?></td>
    <td align="center"> [<a href="<?=site_url("admin/category/edit/type/".$category->getType()."/pid/".$category->getId())?>">增加字典</a>]
      [<a href="<?=site_url("admin/category/edit/type/".$category->getType()."/id/".$category->getId())?>">编辑字典</a>]
      [<a href="<?=site_url("admin/category/delete/type/".$category->getType()."/id/".$category->getId())?>" onclick="return confirm('系统将会把其下的所有子字典删除，你确定要删除？');">删除字典</a>] </td>
  </tr>
  <?php endwhile;?>
  <tr>
    <td colspan="5"><div class="pager_bar">
        <?=$pager->fromto().$pager->navbar(6).$pager->pagejump()?>
      </div>
      </td>
  </tr>
</table>
</div>
</div>