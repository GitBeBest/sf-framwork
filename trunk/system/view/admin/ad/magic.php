<?php $content = $ad->getContent();?>
<table cellpadding="3" cellspacing="1" class="tb_data">
    <tr>
      <th width="39" rowspan="3" align="center">配置</th>
      <th align="right" width="80">幻灯尺寸</th>
      <td><input name="content[config][width]" type="text" value="<?=$content['config']['width']?>" size="10" /> 
        &nbsp;*&nbsp;
        <input name="content[config][height]" type="text" value="<?=$content['config']['height']?>" size="10" /> 
        (如:300*250,表示单张图片宽300高250)</td>
    </tr>
    <tr>
      <th align="right">文本高度</th>
      <td><input name="content[config][textheight]" type="text" value="<?=$content['config']['textheight']?>" size="10" />
        (如果要显示描述,请给一个文本高度)</td>
    </tr>
    <tr>
      <th align="right">背景颜色</th>
      <td><input name="content[config][bgcolor]" type="text" value="<?=$content['config']['bgcolor'] ? $content['config']['bgcolor'] :'#FFFFFF'?>" size="10" />
        (幻灯的背景颜色,如:#FFFFFF)</td>
    </tr>
   <?php for($i=0;$i<6;$i++):?>
  <tr>
      <th width="39" rowspan="3" align="center"><?=$i + 1 ?></th>
      <th align="right" width="80">上传图片</th>
      <td><input name="content[<?=$i?>][image]" id="image_<?=$i?>" type="text" value="<?=$content[$i]['image']?>" size="30"  onfocus="loadbox.load('<?=site_url("common/upload")?>',function(json){$('#image_<?=$i?>').val(json[0].path);});"/> <a href="#" onclick="$('#image_<?=$i?>').val('');return false;">清空</a> (目前只支持JPG格式的图片)</td>
    </tr>
    <tr>
      <th width="80" align="right">连接地址</th>
      <td><input name="content[<?=$i?>][url]" type="text" value="<?=$content[$i]['url']?>" size="60"/></td>
    </tr>
    <tr>
      <th width="80" align="right">广告描述</th>
      <td><input name="content[<?=$i?>][des]" type="text" value="<?=$content[$i]['des']?>" size="60"/></td>
    </tr>
   <?php endfor;?>
</table>
