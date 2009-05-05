<div class="main">
<div class="tools">
<a href="javascript:history.go(-1);" class="back">页面列表</a>
<a href="#" onclick="$('#validateForm').submit();" class="save">保存资料</a>
</div>
<div class="box">
<table cellpadding="3" cellspacing="1" class="tb_data">
<caption class="caption_title">编辑页面信息</caption>
<form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/page/edit/type/".$type)?>">
  <tr>
    <th align="right" width="80">页面标题</th>
    <td><input name="subject" type="text" class="required" id="subject" value="<?=$page->getSubject()?>" size="60"/><em>*</em></td>
  </tr>
  <tr>
    <th align="right">页面属性</th>
    <td><label>
      <input name="is_default" type="checkbox" id="is_default" value="1" <?php if($page->getIsDefault()) echo 'checked="checked"';?>/>
    默认显示
    <input name="is_public" type="checkbox" id="is_public" value="1" <?php if($page->getIsPublic()) echo 'checked="checked"';?> />
    是否显示
    </label></td>
  </tr>
  <tr>
    <th align="center">页面内容</th>
    <td align="center"><?=sf::getPlugin("Fckeditor","content",$page->getContent(),'100%',600)->create()?></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="button" id="button" value="保存资料" />
      <input name="id" type="hidden" id="id" value="<?=$page->getId()?>" />
      <input name="fromUrl" type="hidden" id="fromUrl" value="<?=getFromUrl()?>" /></td>
    </tr>
</form>
</table>
</div>
</div>