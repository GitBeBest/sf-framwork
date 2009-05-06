<?php $content = $ad->getContent();?>
<table cellpadding="3" cellspacing="1" class="tb_data">
    <tr>
      <th align="right" width="80">温馨提示</th>
      <td>你可以使用html代码，文本内容，javascrip代码。但是，有可能这些代码是有安全隐患的代码，也可能破坏页面的美观。请确认你明白在做什么或者你有必要才使用本功能！</td>
    </tr>
  <tr>
      <th width="80" rowspan="3" align="center">代码内容</th>
      <td><textarea name="content[code]" cols="30" rows="10" style="width:100%;"><?=$content["code"]?></textarea></td>
    </tr>
</table>
