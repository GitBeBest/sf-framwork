<div class="main">
  <div class="tools"> <a href="<?=site_url("admin/template/index/type/".$type)?>" class="back">标签列表</a> <a href="#" onclick="$('#validateForm').submit();" class="save">保存资料</a> </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <caption class="caption_title">
      编辑标签信息
      </caption>
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/template/edit/type/".$type)?>">
        <tr>
          <th align="right" width="80">标签标题</th>
          <td><input name="subject" type="text" id="subject" value="<?=$template->getSubject()?>" size="60" class="required"/>
            <em>*</em></td>
        </tr>
		<tr>
          <th align="right" width="80">标签描述</th>
          <td><textarea name="brief" cols="60" rows="5" id="brief" style="width:100%;" class="required"><?=$template->getBrief()?>
          </textarea>
          <em>*</em></td>
        </tr>
		<tr>
          <th align="right" width="80">效果图片</th>
          <td><input name="cover" type="text" id="cover" value="<?=$template->getCover()?>" onfocus="loadbox.load('<?=site_url("common/upload")?>',function(json){$('#cover').val(json[0].path);});" />
          (点击上传)</td>
        </tr>
        <tr>
          <th align="right" width="80">调用代码</th>
          <td><input name="func" type="text" id="func" value="<?=$template->getFunc()?>" size="60" /></td>
        </tr>
        <tr>
          <th align="right" width="80">参数说明</th>
          <td><textarea name="note" rows="5" id="note" style="width:100%;"><?=$template->getNote()?></textarea></td>
        </tr>
        <tr>
          <th align="center">模板内容</th>
          <td align="center"><textarea name="content" rows="30"  class="required" id="content" style="width:100%;"><?=$template->getContent()?></textarea></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="button" id="button" value="保存资料" />
            <input name="id" type="hidden" id="id" value="<?=$template->getId()?>" />
            <input name="fromUrl" type="hidden" id="fromUrl" value="<?=getFromUrl()?>" /></td>
        </tr>
      </form>
    </table>
  </div>
</div>
