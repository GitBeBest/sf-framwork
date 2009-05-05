<script language="javascript" type="text/javascript">
$(function(){
	$.post("<?=site_url("comment/ajax")?>",{type:"<?=$article->getTypeStr().$article->getId()?>"},function(json){
		$("#comment").html(json);
	});
});
</script>
<div class="main">
<div class="box">
<table width="778" border="0" align="center" cellpadding="3" cellspacing="1" class="tb_data">
  <tr>
    <td height="73" align="center"><?=$article->getSubject()?></td>
  </tr>
  <tr>
    <td height="167" valign="top"><?=$article->getContent()?></td>
  </tr>
  <tr>
    <td><div id="comment">加载中...</div></td>
  </tr>
</table>
</div>
</div>
