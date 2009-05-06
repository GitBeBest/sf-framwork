<div class="main">
  <div class="tools"><a href="<?=site_url("admin/job/edit")?>" class="add">发布职位</a> <a href="#" onclick="$('#validateForm').submit();" class="delete">删除选中项</a></div>
  <div class="search">
    <form id="form1" name="form1" method="post" action="">
      <label>关键词
      <input name="search" type="text" id="search" />
      <input name="field" type="radio" value="subject" checked="checked" />
      应聘者姓名
      <input name="field" type="radio" value="department" />
      应聘者学历
      <input name="field" type="radio" value="updated_at" />
      投递时间
      <input type="submit" name="button" id="button" value="搜索" />
      </label>
    </form>
  </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/job/delete_back")?>">
        <tr>
          <th><input name="selectAll" id="selectAll" type="checkbox" /></th>
		  <th><?=getColumnStr('应聘职位','subject')?></th>
          <th><?=getColumnStr('应聘者姓名','user_name')?></th>
          <th><?=getColumnStr('年龄','user_age')?></th>
		  <th><?=getColumnStr('性别','user_sex')?></th>
		  <th><?=getColumnStr('学历','user_degree')?></th>
		  <th><?=getColumnStr('处理意见','note')?></th>
          <th><?=getColumnStr('投递时间','updated_at')?></th>
          <th>可用操作</th>
        </tr>
        <?php while($back = $pager->getObject()):?>
        <tr>
          <td align="center"><input name="select_id[]"  type="checkbox" value="<?=$back->getId()?>" /></td>
		  <td align="center"><?=$back->getSubject()?></td>
          <td align="left"><?=link_to("admin/job/edit_back/id/".$back->getId(),$back->getUserName())?></td>
          <td align="center"><?=$back->getUserAge()?></td>
		  <td align="center"><?=$back->getUserSex()?></td>
		  <td align="center"><?=$back->getUserDegree()?></td>
		  <td align="center"><?=$back->getNote()?></td>
          <td align="center"><?=$back->getUpdatedAt("Y/m/d")?></td>
          <td align="center"><a href="<?=site_url("admin/job/delete_back/id/".$back->getId())?>" onclick="return confirm('删除后不可恢复，你确定删除？');">删除</a> <a href="<?=site_url("admin/job/edit_back/id/".$back->getId())?>">处理</a></td>
        </tr>
        <?php endwhile; ?>
        <tr>
          <td colspan="9"><span class="pager_bar">
            <?=$pager->fromto().$pager->navbar(5).$pager->pagejump()?>
            </span> <input type="submit" name="Submit" value="删除选中项" /></td>
        </tr>
      </form>
    </table>
  </div>
</div>
