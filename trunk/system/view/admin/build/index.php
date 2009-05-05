<script language="javascript" type="text/javascript" src="<?=site_path("js/jquery.progress.js")?>"></script>
<script language="javascript" type="text/javascript">
$(function(){
	get();
});

function get()
{
	$.get('<?=site_url("admin/build/article")?>',{},function(json){
		eval("json = " + json);
		$("#progressbar").Progress(json.num,json.total);
		if(json.num < json.total) get();
	});	
}
</script>
<STYLE> 
#progressbar {
	BORDER-RIGHT: #add2da 1px solid; BORDER-TOP: #add2da 1px solid; BORDER-LEFT: #add2da 1px solid; WIDTH: 99%; COLOR: #add2da; BORDER-BOTTOM: #add2da 1px solid; POSITION: relative; HEIGHT: 20px; padding:1px 1px;
}
#progressbar DIV.progress {
	OVERFLOW: hidden; WIDTH: 0px; POSITION: absolute; HEIGHT: 20px; BACKGROUND-COLOR: #add2da;
}
#progressbar DIV.progress .text {
	COLOR: white; POSITION: absolute; TEXT-ALIGN: center
}
#progressbar DIV.text {
	WIDTH: 100%; POSITION: absolute; HEIGHT: 100%; TEXT-ALIGN: center
}
</STYLE> 
<div class="main">
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <caption class="caption_title">
      生成静态页面
      </caption>
      <tr>
        <td><div class="note">页面执行中请不要关闭或者刷新页面...</div></td>
      </tr>
      <tr>
        <td><div id="progressbar"></div></td>
      </tr>
    </table>
  </div>
</div>
