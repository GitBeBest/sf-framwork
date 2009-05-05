<table cellpadding="3" cellspacing="1" class="tb_data">
  <tr>
    <th class="left">附件上传</th>
  </tr>
<?php if($msg != ''):?>
<tr>
<td><em><?=$msg?></em></td>
</tr>
<?php elseif($json != ''):?>
  <tr>
    <td><?php for($i=0,$n=count($result);$i<$n;$i++):?>
      <li>文件“ <?=$result[$i]['name']?>”上传成功.</li>
      <?php endfor;?></td>
  </tr>
  <tr>
    <td><label>
        <input type="submit" name="button" id="button" value="完成" onclick="parent.loadbox.complete(<?=$json?>);"/>
      </label></td>
  </tr>
<?php	
else:
?>
  <form action="<?=site_url("common/upload")?>" method="post" enctype="multipart/form-data" name="uploadfrom" id="uploadfrom">
    <tr>
      <td><input type="file" name="upload[]" id="upload" /></td>
    </tr>
    <tr>
      <td><label>附件备注
          <input type="text" name="file_note" id="file_note" />
        </label></td>
    </tr>
    <tr>
      <td><label>
          <input type="submit" name="button" id="button" value="上传" />
          <input type="button" name="button" id="button" value="关闭" onclick="parent.loadbox.unload()" />
          <input name="item_id" type="hidden" id="item_id" value="<?=$item_id?>" />
        </label>
        <input name="item_type" type="hidden" id="item_type" value="<?=$item_type?>" />
        <input name="upload_type" type="hidden" id="upload_type" value="<?=$upload_type?>" />
        <input name="upload_size" type="hidden" id="upload_size" value="<?=$upload_size?>" /></td>
    </tr>
  </form>
<?php endif;?>
</table>