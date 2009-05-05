<script language="javascript" type="text/javascript"> 
$(function(){
	$('#comment_form').ajaxForm(function(data){
	   $("#comment").html(data);
    });
});
</script> 
<h1><em><a href="<?=site_url("comment/index/type/".$type)?>">查看更多...</a></em>网友评论(<?=$pager->getTotal()?>)</h1>
<?php while($comment = $pager->getObject()):?>
<dl>
<dt><em><?=$comment->getUpdatedAt("Y/m/d")?></em><?=$comment->getUserName()?></dt>
<dd><?=$comment->getContent()?></dd>
</dl>
<?php endwhile;?>
<h1>我也说两句</h1>
<ul>
<form name="comment_form" id="comment_form" method="post" action="<?=site_url("comment/ajax")?>">
<li><textarea name="content" id="content" cols="45" rows="5"></textarea></li>
<li>
  <label>昵 称:
    <input name="user_name" type="text" id="user_name" size="15" value="<?=input::getInput("session.username")?>">
  </label>
  <label>验证码：
  <input name="SafetyCode" type="text" id="SafetyCode" size="5"><img src="<?=site_url("common/index")?>" align="absmiddle" />
  </label>
  <label>
    <input name="type" type="hidden" id="type" value="<?=$type?>" />
    <input type="submit" name="button" id="button" value="提交">
  </label>
</li>
</form>
</ul>