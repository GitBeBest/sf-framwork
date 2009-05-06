<?php $content = $ad->getContent();?>
<table cellpadding="3" cellspacing="1" class="tb_data">
    <tr>
      <th width="39" align="center">配置</th>
      <th align="right" width="80">图片尺寸</th>
      <td><input name="content[config][width]" type="text" value="<?=$content['config']['width']?>" size="10" /> 
        &nbsp;*&nbsp;
        <input name="content[config][height]" type="text" value="<?=$content['config']['height']?>" size="10" /> 
        (如:300*250,表示单张图片宽300高250)</td>
    </tr>
  <tr>
      <th width="39" rowspan="3" align="center">动画</th>
      <th align="right" width="80">上传动画</th>
      <td><input name="content[flash]" id="flash" type="text" value="<?=$content["flash"]?>" size="30"  onfocus="loadbox.load('<?=site_url("common/upload")?>',function(json){$('#flash').val(json[0].path);});"/></td>
    </tr>
</table>
