<div>
  <h1>Category::list</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>字典名</th>
      <th>排序</th>
      <th>操作</th>
    </tr>
    <?php while($category = $pager->getObject()):?>
    <tr>
      <td><?=$category->getId()?>
      <td align="left"><?=$category->getHeadStr().$category->getSubject()?></td>
      <td><?=$category->getOrders()?></td>
      <td> [<a href="<?=site_url("admin/category_controller/edit/pid/".$category->getId())?>">Add</a>]
        [<a href="<?=site_url("admin/category_controller/edit/id/".$category->getId())?>">Edit</a>]
        [<a href="<?=site_url("admin/category_controller/delete/id/".$category->getId())?>">Delete</a>] </td>
    </tr>
    <?php endwhile;?>
    <tr>
      <td colspan="5"><div class="pager_bar">
          <?=$pager->fromto().$pager->navbar(6).$pager->pagejump()?>
        </div></td>
    </tr>
  </table>
</div>
