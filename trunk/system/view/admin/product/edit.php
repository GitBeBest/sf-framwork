<div class="main">
  <div class="tools"> <a href="<?=site_url("admin/product/index/type/".$type)?>" class="back">产品列表</a> <a href="#" onclick="$('#validateForm').submit();" class="save">保存资料</a> </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <caption class="caption_title">
      编辑产品信息
      </caption>
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/product/edit/type/".$type)?>">
        <tr>
          <th align="right" width="80">产品名称</th>
          <td colspan="3"><input name="subject" type="text" id="subject" value="<?=$product->getSubject()?>" size="60" class="required"/>
            <em>*</em></td>
        </tr>
		<tr>
          <th align="right" width="80">所属分类</th>
          <td><?=getSelectForCategory($type,'category_id',$product->getCategoryId(),'class="required"')?><em>*</em></td>
          <th>产品价格</th>
          <td><input name="price" type="text" id="price" value="<?=$product->getPrice()?>" size="10" class="required"/></td>
		</tr>
		<tr>
          <th align="right" width="80">产品描述</th>
          <td colspan="3"><textarea name="brief" cols="60" rows="5" id="brief" class="required"><?=$product->getBrief()?>
          </textarea>
            <em>*</em></td>
        </tr>
        <tr>
          <th align="right">产品属性</th>
          <td colspan="3"><label>
            <input name="is_top" type="checkbox" id="is_top" value="1" <?php if($product->getIsTop()) echo 'checked="checked"';?>/>
            是否置顶
			<input name="is_hot" type="checkbox" id="is_hot" value="1" <?php if($product->getIsHot()) echo 'checked="checked"';?>/>
            是否热点
            <input name="is_public" type="checkbox" id="is_public" value="1" <?php if($product->getIsPublic()) echo 'checked="checked"';?> />
            是否发布 </label></td>
        </tr>
		<tr>
          <th align="right" width="80">展示图片</th>
          <td colspan="3">
		  <img src="<?=site_path("up_files/".$product->getCover())?>" id="img_cover" width="120" height="88" onerror="this.src='<?=site_path("images/admin/nopic.png")?>'"  class="img_upload" alt="点击上传封面图片" onclick="loadbox.load('<?=site_url("common/upload")?>',function(json){$('#cover').val(json[0].path);$('#img_cover').attr('src','<?=site_path("up_files")?>'+'/'+json[0].path);});"/>
		  <input name="cover" type="hidden" id="cover" value="<?=$product->getCover()?>" class="required"/>
		  <?php for($i=1;$i<6;$i++):?>
		  <img src="<?=site_path("up_files/".$product->getImages($i))?>" width="120" height="88" id="img<?=$i?>" class="img_upload" alt="点击上传" onclick="loadbox.load('<?=site_url("common/upload")?>',function(json){$('#images<?=$i?>').val(json[0].path);$('#img<?=$i?>').attr('src','<?=site_path("up_files")?>'+'/'+json[0].path);});" onerror="this.src='<?=site_path("images/admin/nopic.png")?>'"/>
		  <input name="images[]" type="hidden" id="images<?=$i?>" value="<?=$product->getImages($i)?>" />
		  <?php endfor;?>
		  </td>
        </tr>
        <tr>
          <th align="center">详细描述</th>
          <td colspan="3" align="center"><?=sf::getPlugin("Fckeditor","content",$product->getContent(),'100%',600)->create()?></td>
        </tr>
        <tr>
          <td colspan="4" align="center"><input type="submit" name="button" id="button" value="保存资料" />
            <input name="id" type="hidden" id="id" value="<?=$product->getId()?>" />
            <input name="fromUrl" type="hidden" id="fromUrl" value="<?=getFromUrl()?>" /></td>
        </tr>
      </form>
    </table>
  </div>
</div>
