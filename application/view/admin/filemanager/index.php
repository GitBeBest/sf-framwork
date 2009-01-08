<div>
  <h1>文件管理</h1>
    <div class="Search">
    <form id="searchfrom" name="searchfrom" method="post" action="<?=site_url("admin/files/index")?>">
      
      <label>文件名
        <input type="text" name="Search" id="Search" />
      </label>
      <label>
        <input name="filed" type="radio" id="radio" value="file_name" checked="checked" />
        文件名
      </label>
      <input name="filed" type="radio" id="radio2" value="created_at" />
      上传时间
      <input name="filed" type="radio" id="radio3" value="file_note" />
      文件备注
      <input name="filed" type="radio" id="radio4" value="user_name" />
    上传者 
    <label>
      <input type="submit" name="button" id="button" value="提交" />
    </label>
    </form>
    </div>
<form id="form1" name="form1" method="post" action="<?=site_url("admin/files/delete")?>">
    <div>
    <table>
    <tr>
    <th><input name="selectAll" id="selectAll" type="checkbox" />?</th><th>ID</th><th>文件名</th><th>文件类型</th><th>文件大小</th><th>上传者</th><th>备注</th><th>上传时间</th><th>操作</th>
    </tr>
    <?php while($file = $pager->getObject()):?>
    <tr>
    <td><input name="select_id[]"  type="checkbox" value="<?=$file->getId()?>" /></td><td><?=$file->getId()?></td>
    <td><a href="<?=site_url("files/show/id/".$file->getId());?>"><?=$file->getFileName()?></a></td>
    <td><?=$file->getFileMinetype()?></td>
    <td><?=$file->getFileSize()?></td>
    <td><?=$file->getUserName()?></td>
    <td><?=$file->getFileNote()?></td>
    <td><?=$file->getCreatedAt("Y/m/d H:i")?></td>
    <td><?php if($file->getused() > 0):?>保护<?php else:?><a href="<?=site_url("admin/files/delete/id/".$file->getId())?>">删除</a><?php endif;?> <a href="<?=site_url("admin/files/edit/id/".$file->getId())?>">编辑</a></td>
    </tr>
    <?php endwhile; ?>
    <tr>
    <td colspan="9"><input name="delete" type="submit" id="delete" value="删除" /><span class="pager_bar"><?=$pager->fromto().$pager->navbar(10)?></span></td>
    </tr>
    </table>
    </div>
  </form>
</div>
