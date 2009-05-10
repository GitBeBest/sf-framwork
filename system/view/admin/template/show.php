<script language="javascript" type="text/javascript">
function show()
{
	var code = $("#do_code").val();
	$.post("<?=site_url("admin/template/execute")?>",{code:code},function(data){
		$("#show").html(data);
	});
}
$(function(){show();});
</script>
<div class="main">
  <div class="tools"> <a href="#"  onclick="history.go(-1);" class="back">返回</a></div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <caption class="caption_title">
      查看模板效果
      </caption>
        <tr>
          <th align="right" width="80">模板标题</th>
          <td><?=$template->getSubject()?></td>
        </tr>
		<tr>
          <th align="right" width="80">模板描述</th>
          <td><?=$template->getBrief()?></td>
        </tr>
		<tr>
          <th align="right" width="80">封面图片</th>
          <td><img src="<?=site_path("up_files/".$template->getCover())?>" width="120" height="100" /></td>
        </tr>
        <tr>
          <th align="right">发布日期</th>
          <td><?=$template->getUpdatedAt("Y/m/d")?></td>
        </tr>
		<tr>
          <th align="center">参数说明</th>
          <td align="left"><?=nl2br($template->getNote())?>
 </td>
        </tr>
        <tr>
          <th align="center">调用代码</th>
          <td align="left"><input value="&lt;?=<?=$template->getFunc()?>(<?=$template->getId()?>)?>" size="60" id="do_code" />
            <label>
            <input type="button" name="Submit" value="查看效果" onclick="show()" />
          </label></td>
        </tr>
        <tr>
          <th align="center">模板效果</th>
          <td align="left"><div id="show">效果加载中...</div></td>
        </tr>
    </table>
  </div>
</div>
