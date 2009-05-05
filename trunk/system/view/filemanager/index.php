<p class="title">附件列表</p>
<table cellpadding="3" cellspacing="1" class="tb_data">
  <tr>
    <th class="left">文件搜索</th>
  </tr>
  <form id="searchfrom" name="searchfrom" method="post" action="<?=site_url("files/index")?>">
    <tr>
      <td><label> &nbsp;&nbsp;文件名
          <input type="text" name="Search" id="Search" />
        </label>
        <label>
          <input name="filed" type="radio" id="radio" value="file_name" checked="checked" />
          文件名 </label>
        <input name="filed" type="radio" id="radio2" value="created_at" />
        上传时间
        <input name="filed" type="radio" id="radio3" value="file_note" />
        文件备注
        <input name="filed" type="radio" id="radio4" value="user_name" />
        上传者
        <label>
          <input type="submit" name="button" id="button" value="提交" />
        </label></td>
    </tr>
  </form>
</table>
<table cellpadding="3" cellspacing="1" class="tb_data">
  <form id="form1" name="form1" method="post" action="<?=site_url("files/delete")?>">
    <tr>
      <th><input name="selectAll" id="selectAll" type="checkbox" />
        ?</th>
      <th>ID</th>
      <th>文件名</th>
      <th>文件大小</th>
      <th>上传者</th>
      <th>备注</th>
      <th>上传时间</th>
      <th>操作</th>
    </tr>
    <?php while($file = $pager->getObject()):?>
    <tr>
      <td align="center"><input name="select_id[]"  type="checkbox" value="<?=$file->getId()?>" /></td>
      <td align="center"><?=$file->getId()?></td>
      <td><a href="<?=site_url("files/show/id/".$file->getId());?>">
        <?=$file->getFileName(10)?>
        </a></td>
      <td align="center"><?=$file->getFileSize()?></td>
      <td align="center"><?=$file->getUserName()?></td>
      <td><?=$file->getFileNote(20)?></td>
      <td align="center"><?=$file->getCreatedAt("Y/m/d H:i")?></td>
      <td align="center"><?php if($file->getused() > 0):?>
        保护
        <?php else:?>
        <a href="<?=site_url("files/delete/id/".$file->getId())?>" onclick="return confirm('删除后不可恢复，你确定删除？');">删除</a>
        <?php endif;?>
        <a href="<?=site_url("files/edit/id/".$file->getId())?>">编辑</a></td>
    </tr>
    <?php endwhile; ?>
    <tr>
      <td colspan="9"><span class="pager_bar">
        <?=$pager->fromto().$pager->navbar(10)?>
        </span><input name="delete" type="submit" id="delete" value="删除选中项" onclick="return confirm('删除后不可恢复，你确定删除？');"/></td>
    </tr>
  </form>
</table>
