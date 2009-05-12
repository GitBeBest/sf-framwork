<script language="javascript" type="text/javascript"> 
function addPic(json)
{
	$('<li><img src="<?=site_path("up_files/")?>/' + json[0].path + '" width="150" height="100" alt="" /><input name="images[]" type="checkbox" checked="checked" value="'+json[0].path+'" /></li>').appendTo(".img_list");
}
</script>
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
          <th width="80" rowspan="2" align="right">展示图片</th>
          <td colspan="3"><label>
            <input type="button" name="Submit" value=" 增加展示图片 "  onclick="loadbox.load('<?=site_url("common/upload")?>',addPic);" />
          </label>
          (如果想删除上传的图片，请不要勾选该图片，保存即可。)</td>
        </tr>
		<tr>
		  <td colspan="3"><ul class="img_list">
		  <?php
		  $images = $product->getImages();
		  for($i=0,$n=count($images);$i<$n ;$i++):
		  if($images[$i] == '') continue;
		  ?>
		  <li><img src="<?=site_path("up_files/".$images[$i])?>" width="150" height="100" alt="" /><input name="images[]" type="checkbox" checked="checked" value="<?=$images[$i]?>" /></li>
		  <?php endfor;?>
		  </ul></td>
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
