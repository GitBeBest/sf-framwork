<div class="main">
  <div class="tools"><a href="#" onclick="$('#validateForm').submit();" class="delete">删除选中项</a></div>
  <div class="search">
    <form id="form1" name="form1" method="post" action="">
      <label>关键词
      <input name="search" type="text" id="search" />
      <input name="field" type="radio" value="subject" checked="checked" />
      留言内容
      <input name="field" type="radio" value="brief" />
      留言者姓名
      <input name="field" type="radio" value="updated_at" />
      发布时间
      <input type="submit" name="button" id="button" value="搜索" />
      </label>
    </form>
  </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/book/delete")?>">
        <tr>
          <th><input name="selectAll" id="selectAll" type="checkbox" /></th>
          <th><?=getColumnStr('留言内容','content')?></th>
          <th><?=getColumnStr('留言者姓名','user_name')?></th>
          <th><?=getColumnStr('最近更新时间','updated_at')?></th>
          <th><?=getColumnStr('是否发布','is_public')?></th>
          <th>可用操作</th>
        </tr>
        <?php while($book = $pager->getObject()):?>
        <tr>
          <td align="center"><input name="select_id[]"  type="checkbox" value="<?=$book->getId()?>" /></td>
          <td align="left"><?=$book->getContent(36)?></td>
          <td align="center"><?=$book->getUserName()?></td>
          <td align="center"><?=$book->getUpdatedAt("Y/m/d")?></td>
          <td align="center"><?=$book->getIsPublicStr()?></td>
          <td align="center"><a href="<?=site_url("admin/book/delete/id/".$book->getId())?>" onclick="return confirm('删除后不可恢复，你确定删除？');">删除</a> <a href="<?=site_url("admin/book/edit/id/".$book->getId())?>">回复</a></td>
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
