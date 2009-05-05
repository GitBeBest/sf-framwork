<div class="main">
<div class="tools">
<a href="<?=site_url("admin/authorization/edit")?>" class="add">新增权限</a>
<a href="#" onclick="if(confirm('删除后不可恢复，你确定删除？')) $('#validateForm').submit();" class="delete">删除选中项</a>
</div>
<div class="search">
<form id="form1" name="form1" method="post" action="<?=site_url("admin/authorization/index")?>">
  <label>搜索关键词
    <input name="search" type="text" id="search" />
    <input name="field" type="radio" id="radio" value="controller_name" checked="checked" />
    权限名称
    <input type="radio" name="field" id="radio2" value="controller" />
控制器名
<input type="radio" name="field" id="radio3" value="method" />
方法名
<input type="submit" name="button" id="button" value="搜索" />
  </label>
</form>
</div>
<div class="box">
<table cellpadding="3" cellspacing="1" class="tb_data">
  <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/authorization/delete")?>">
    <tr>
      <th><input name="selectAll" id="selectAll" type="checkbox" /></th>
      <th><?=getColumnStr('ID','id')?></th>
      <th><?=getColumnStr('权限名','controller_name')?></th>
      <th><?=getColumnStr('权限组','user_group_ids')?></th>
      <th>操作</th>
    </tr>
    <?php while($action = $pager->getObject()):?>
    <tr>
      <td align="center"><input name="select_id[]"  type="checkbox" value="<?=$action->getId()?>" /></td>
      <td align="center"><?=$action->getId()?></td>
      <td align="left"><?=$action->getControllerName()?></td>
      <td align="left"><?=$action->getUserGroupName()?></td>
      <td align="center"><a href="<?=site_url("admin/authorization/delete/id/".$action->getId())?>" onclick="return confirm('删除后不可以恢复，你确定要删除？');">删除</a> <a href="<?=site_url("admin/authorization/edit/id/".$action->getId())?>">权限</a></td>
    </tr>
    <?php endwhile; ?>
    <tr>
      <td colspan="7" align="left"> <span class="pager_bar">
        <?=$pager->fromto().$pager->navbar(10)?>
        </span><input name="delete" type="submit" id="delete" value="删除选中项目" onclick="return confirm('删除后不可以恢复，你确定要删除？');"/>
       </td>
    </tr>
  </form>
</table>
</div>
</div>