<div class="main">
  <div class="tools"> <a href="<?=site_url("admin/article/index/type/".$type)?>" class="back">文章列表</a> <a href="#" onclick="$('#validateForm').submit();" class="save">保存资料</a> </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <caption class="caption_title">
      编辑文章信息
      </caption>
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/article/edit/type/".$type)?>">
        <tr>
          <th align="right" width="80">文章标题</th>
          <td><input name="subject" type="text" id="subject" value="<?=$article->getSubject()?>" size="60" class="required"/>
            <em>*</em></td>
        </tr>
		<tr>
          <th align="right" width="80">所属分类</th>
          <td><?=getSelectForCategory($type,'category_id',$article->getCategoryId(),'class="required"')?><em>*</em></td>
        </tr>
		<tr>
          <th align="right" width="80">文章描述</th>
          <td><textarea name="brief" cols="60" rows="5" id="brief" class="required"><?=$article->getBrief()?>
          </textarea>
            <em>*</em></td>
        </tr>
        <tr>
          <th align="right">页面属性</th>
          <td><label>
            <input name="is_top" type="checkbox" id="is_top" value="1" <?php if($article->getIsTop()) echo 'checked="checked"';?>/>
            是否置顶
			<input name="is_hot" type="checkbox" id="is_hot" value="1" <?php if($article->getIsHot()) echo 'checked="checked"';?>/>
            是否热点
            <input name="is_public" type="checkbox" id="is_public" value="1" <?php if($article->getIsPublic()) echo 'checked="checked"';?> />
            是否发布 </label></td>
        </tr>
		<tr>
          <th align="right" width="80">封面图片</th>
          <td><input name="cover" type="text" id="cover" value="<?=$article->getCover()?>" onfocus="loadbox.load('<?=site_url("common/upload")?>',function(json){$('#cover').val(json[0].path);});" /></td>
        </tr>
        <tr>
          <th align="center">页面内容</th>
          <td align="center"><?=sf::getPlugin("Fckeditor","content",$article->getContent(),'100%',600)->create()?></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="button" id="button" value="保存资料" />
            <input name="id" type="hidden" id="id" value="<?=$article->getId()?>" />
            <input name="fromUrl" type="hidden" id="fromUrl" value="<?=getFromUrl()?>" /></td>
        </tr>
      </form>
    </table>
  </div>
</div>
