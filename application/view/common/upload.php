<div>
  <h1>System::upload</h1>
<?php
if($msg != '') echo "<em>".$msg."</em>";
elseif($json != '')
{
?>
<ul>
<?php for($i=0,$n=count($result);$i<$n;$i++):?>
<li>文件“<?=$result[$i]['name']?>”上传成功.</li>
<?php endfor;?>
</ul>
<p>
<label>
	<input type="submit" name="button" id="button" value="完成" onclick="parent.loadbox.complete(<?=$json?>);"/>
</label>
</p>
<?php	
}else{
?>
  <form action="<?=site_url("common/upload")?>" method="post" enctype="multipart/form-data" name="uploadfrom" id="uploadfrom">
    <ul>
      <li>
        <label>
          <input type="file" name="upload[]" id="upload" />
        </label>
      </li>
      <li>
        <label>附件备注
          <input type="text" name="file_note" id="file_note" />
        </label>
      </li>
    </ul>
    <p>
      <label>
        <input type="submit" name="button" id="button" value="上传" />
        <input type="button" name="button" id="button" value="关闭" onclick="parent.loadbox.unload()" />
        <input name="item_id" type="hidden" id="item_id" value="<?=$item_id?>" />
      </label>
    </p>
  </form>
<?php }?>
</div>
