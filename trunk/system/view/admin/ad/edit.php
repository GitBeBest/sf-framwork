<script language="javascript" type="text/javascript">
function getContent(type)
{
	$("#ad_content").html('内容加载中...');
	$.get('<?=site_url("admin/ad/content")?>'+'/type/' + type + '/id/<?=$ad->getId()?>',{},function(data){$("#ad_content").html(data);});
}
$(function(){getContent("<?=$ad->getTypeStr() ? $ad->getTypeStr() : 'text'?>")});
</script>
<div class="main">
  <div class="tools"> <a href="<?=site_url("admin/ad/index/type/".$type)?>" class="back">广告列表</a> <a href="#" onclick="$('#validateForm').submit();" class="save">保存资料</a> </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <caption class="caption_title">
      编辑广告信息
      </caption>
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/ad/edit/type/".$type)?>">
        <tr>
          <th align="right" width="80">广告标题</th>
          <td><input name="subject" type="text" id="subject" value="<?=$ad->getSubject()?>" size="60" class="required"/>
            <em>*</em></td>
        </tr>
		<tr>
          <th align="right" width="80">广告类型</th>
          <td><label>
            <select name="type_str" id="type_str" onchange="getContent(this.value)">
              <option value="text" <?php if($ad->getTypeStr() == 'text') echo 'selected="selected"'?>>文本型</option>
              <option value="image" <?php if($ad->getTypeStr() == 'image') echo 'selected="selected"'?>>图片型</option>
              <option value="flash" <?php if($ad->getTypeStr() == 'flash') echo 'selected="selected"'?>>FLASH型</option>
              <option value="magic" <?php if($ad->getTypeStr() == 'magic') echo 'selected="selected"'?>>幻灯型</option>
              <option value="code" <?php if($ad->getTypeStr() == 'code') echo 'selected="selected"'?>>代码型</option>
            </select>
          </label><em>*</em></td>
        </tr>
		<tr>
          <th align="right" width="80">广告描述</th>
          <td><textarea name="brief" cols="60" rows="5" id="brief" class="required"><?=$ad->getBrief()?>
          </textarea>
            <em>*</em></td>
        </tr>
        <tr>
          <th align="right">广告属性</th>
          <td><label>
            <input name="is_public" type="checkbox" id="is_public" value="1" <?php if($ad->getIsPublic()) echo 'checked="checked"';?> />
            是否发布 </label></td>
        </tr>
        <tr>
          <th align="center">广告内容</th>
          <td align="left"><div id="ad_content">内容加载中...</div></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="button" id="button" value="保存资料" />
            <input name="id" type="hidden" id="id" value="<?=$ad->getId()?>" />
            <input name="fromUrl" type="hidden" id="fromUrl" value="<?=getFromUrl()?>" /></td>
        </tr>
      </form>
    </table>
  </div>
</div>
