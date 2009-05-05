<p class="title">附件备注</p>
  <table>
    <tr>
      <th colspan="2">文件备注</th>
    </tr>
    <form id="form1" name="form1" method="post" action="<?=site_url("files/edit")?>">
      <tr>
        <td>文件名</td>
        <td><input name="file_name" type="text" id="file_name" value="<?=$filemanager->getFileName()?>" /></td>
      </tr>
      <tr>
        <td>文件备注</td>
        <td><textarea name="file_note" rows="4" id="file_note"><?=$filemanager->getFileNote()?>
</textarea></td>
      </tr>
      <tr>
        <td>查看文件</td>
        <td><?=$filemanager->getLink()?></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" name="button" id="button" value="保存" />
          <input name="id" type="hidden" id="id" value="<?=$filemanager->getId()?>" />
          <input name="fromUrl" type="hidden" id="fromUrl" value="<?=getFromUrl()?>" /></td>
      </tr>
    </form>
  </table>