<div class="main">
  <div class="tools"> <a href="<?=site_url("admin/template/edit/type/".$type)?>" class="add">新增标签</a> <a href="#" onclick="$('#validateForm').submit();" class="delete">删除选中项</a> </div>
  <div class="search">
    <form id="form1" name="form1" method="post" action="">
      <label>关键词
      <input name="search" type="text" id="search" />
      <input name="field" type="radio" value="subject" checked="checked" />
      标签标题
      <input name="field" type="radio" value="brief" />
      标签描述
      <input name="field" type="radio" value="updated_at" />
      发布时间
      <input type="submit" name="button" id="button" value="搜索" />
      </label>
    </form>
  </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/template/delete/type/".$type)?>">
        <tr>
          <th><input name="selectAll" id="selectAll" type="checkbox" /></th>
          <th width="20%"><?=getColumnStr('标签标题','subject')?></th>
          <th>效果图片</th>
          <th width="40%"><?=getColumnStr('标签描述','brief')?></th>
          <th><?=getColumnStr('最近更新时间','updated_at')?></th>
          <th>可用操作</th>
        </tr>
        <?php while($template = $pager->getObject()):?>
        <tr>
          <td align="center"><input name="select_id[]"  type="checkbox" value="<?=$template->getId()?>" /></td>
          <td align="left"><?=link_to("admin/template/show/id/".$template->getId(),$template->getSubject())?></td>
          <td align="center"><img src="<?=site_path("up_files/".$template->getCover())?>" width="80" height="60" alt="<?=$template->getSubject()?>" /></td>
          <td align="left"><?=$template->getBrief(60)?></td>
          <td align="center"><?=$template->getUpdatedAt("Y/m/d")?></td>
          <td align="center"><a href="<?=site_url("admin/template/delete/type/".$type."/id/".$template->getId())?>" onclick="return confirm('删除后不可恢复，你确定删除？');">删除</a> <a href="<?=site_url("admin/template/edit/type/".$type."/id/".$template->getId())?>">编辑</a></td>
        </tr>
        <?php endwhile; ?>
        <tr>
          <td colspan="6"><span class="pager_bar">
            <?=$pager->fromto().$pager->navbar(5).$pager->pagejump()?>
            </span> <input type="submit" name="Submit" value="删除选中项" /></td>
        </tr>
      </form>
    </table>
  </div>
</div>
