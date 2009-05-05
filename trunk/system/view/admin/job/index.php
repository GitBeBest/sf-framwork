<div class="main">
  <div class="tools"><a href="<?=site_url("admin/job/edit")?>" class="add">发布职位</a> <a href="#" onclick="$('#validateForm').submit();" class="delete">删除选中项</a></div>
  <div class="search">
    <form id="form1" name="form1" method="post" action="">
      <label>关键词
      <input name="search" type="text" id="search" />
      <input name="field" type="radio" value="subject" checked="checked" />
      职位名称
      <input name="field" type="radio" value="department" />
      所属部门
      <input name="field" type="radio" value="updated_at" />
      发布时间
      <input type="submit" name="button" id="button" value="搜索" />
      </label>
    </form>
  </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/job/delete")?>">
        <tr>
          <th><input name="selectAll" id="selectAll" type="checkbox" /></th>
          <th><?=getColumnStr('职位名称','subject')?></th>
          <th><?=getColumnStr('所属部门','department')?></th>
		  <th><?=getColumnStr('招聘人数','number')?></th>
          <th><?=getColumnStr('最近更新时间','updated_at')?></th>
          <th>可用操作</th>
        </tr>
        <?php while($job = $pager->getObject()):?>
        <tr>
          <td align="center"><input name="select_id[]"  type="checkbox" value="<?=$job->getId()?>" /></td>
          <td align="left"><?=link_to("admin/job/edit/id/".$job->getId(),$job->getSubject())?></td>
          <td align="center"><?=$job->getDepartment()?></td>
		  <td align="center"><?=$job->getNumber()?></td>
          <td align="center"><?=$job->getUpdatedAt("Y/m/d")?></td>
          <td align="center"><a href="<?=site_url("admin/job/delete/id/".$job->getId())?>" onclick="return confirm('删除后不可恢复，你确定删除？');">删除</a> <a href="<?=site_url("admin/job/edit/id/".$job->getId())?>">编辑</a></td>
        </tr>
        <?php endwhile; ?>
        <tr>
          <td colspan="9"><span class="pager_bar">
            <?=$pager->fromto().$pager->navbar(10)?>
            </span> <input type="submit" name="Submit" value="删除选中项" /></td>
        </tr>
      </form>
    </table>
  </div>
</div>
