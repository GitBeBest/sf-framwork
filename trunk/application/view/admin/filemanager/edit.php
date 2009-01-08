<div>
  <h1>文件备注</h1>
  <form id="form1" name="form1" method="post" action="<?=site_url("admin/files/edit")?>">
    <ul>
      <li>
        <label>文件名
          <input name="file_name" type="text" id="file_name" value="<?=$filemanager->getFileName()?>" />
        </label>
      </li>
      <li>
        <label>文件备注
          <textarea name="file_note" rows="4" id="file_note"><?=$filemanager->getFileNote()?>
          </textarea>
        </label>
      </li>
      <li>
        <label>查看文件
         <a href="#">查看</a>
        </label>
      </li>
    </ul>
    <p>
      <label>
        <input type="submit" name="button" id="button" value="Save" />
      </label>
      <input name="id" type="hidden" id="id" value="<?=$filemanager->getId()?>" />
    </p>
  </form>
</div>
