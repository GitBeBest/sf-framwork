<table cellpadding="3" cellspacing="1" class="tb_data">
   <?php 
   for($i=0;$i<10;$i++):
       $content = $ad->getContent();
   ?>
  <tr>
      <th width="39" rowspan="3" align="center"><?=$i + 1 ?></th>
      <th align="right" width="80">文字内容</th>
      <td><input name="content[<?=$i?>][text]" type="text" value="<?=$content[$i]['text']?>" size="60"/></td>
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
