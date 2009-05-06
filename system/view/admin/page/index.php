<div class="main">
<div class="tools">
<a href="<?=site_url("admin/page/edit/type/".$type)?>" class="add">新增页面</a>
</div>
<div class="search">
<form id="form1" name="form1" method="post" action="">
  <label>页面名称
  <input name="search" type="text" id="search" />
    <input type="submit" name="button" id="button" value="搜索" />
  </label>
</form>
</div>
<div class="box">
<table cellpadding="3" cellspacing="1" class="tb_data">
  <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/page/delete/type/".$type)?>">
    <tr>
      <th>ID</th>
      <th><?=getColumnStr('页面名称','subject')?></th>
      <th><?=getColumnStr('默认显示','is_default')?></th>
      <th><?=getColumnStr('最近更新时间','updated_at')?></th>
      <th><?=getColumnStr('页面状态','is_public')?></th>
      <th>可用操作</th>
    </tr> 
    <?php while($page = $pager->getObject()):?>
    <tr>
      <td align="center"><?=$page->getId()?></td>
      <td align="center"><?=$page->getSubject()?></td>
      <td align="center"><?=$page->getIsDefaultStr()?></td>
      <td align="center"><?=$page->getUpdatedAt("Y/m/d")?></td>
      <td align="center"><?=$page->getIsPublicStr()?></td>
      <td align="center"><a href="<?=site_url("admin/page/delete/type/".$type."/id/".$page->getId())?>" onclick="return confirm('删除后不可恢复，你确定删除？');">删除</a> <a href="<?=site_url("admin/page/edit/type/".$type."/id/".$page->getId())?>">编辑</a></td>
    </tr>
    <?php endwhile; ?>
    <tr>
      <td colspan="9"><span class="pager_bar">
        <?=$pager->fromto().$pager->navbar(5).$pager->pagejump()?>
        </span>
        </td>
    </tr>
  </form>
</table>
</div>
</div>