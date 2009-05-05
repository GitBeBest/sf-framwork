<div class="main">
  <div class="tools"> <a href="<?=site_url("admin/category/index/type/".$type)?>" class="back">返回列表</a> <a href="#" onclick="$('#validateForm').submit();" class="save">保存修改</a> </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <caption class="caption_title">
      编辑字典
      </caption>
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/category/edit/type/".$type)?>">
        <tr>
          <th>上级字典</th>
          <td><select name="parent_id" id="parent_id" class="required">
              <option value="0">root</option>
              <?php
	 while($parent = $parent_data->getObject()){
	 	echo '<option value="'.$parent->getId().'" ';
		if($parent->getId() == $category->getParentId() || $pid == $parent->getId()) echo 'selected="selected" ';
		echo '>'.$parent->getHeadStr().$parent->getSubject().'</option>';
	 }
	?>
            </select>
            <em>*</em></td>
        </tr>
        <tr>
          <th>字典名</th>
          <td><input name="subject" type="text" id="subject" value="<?=$category->getSubject()?>" class="required"/>
            <em>*</em></td>
        </tr>
		<tr>
          <th>字典属性</th>
          <td><label>
            <input name="is_home" type="checkbox" id="is_home" value="1" <?php if($category->getIsHome() > 0) echo 'checked="checked"';?> />
            是否显示到首页
          </label></td>
        </tr>
        <tr>
          <th>排序</th>
          <td><input name="orders" type="text" id="orders" value="<?=$category->getOrders()?>" /></td>
        </tr>
        <tr>
          <th>类型</th>
          <td><input name="type" type="text" id="type" value="<?=$category->getType() ? $category->getType() : $type?>" readonly="readonly" /></td>
        </tr>
        <tr>
          <th>封面图片</th>
          <td><input name="cover" type="text" id="cover" value="<?=$category->getCover()?>" onfocus="loadbox.load('<?=site_url("common/upload")?>',function(json){$('#cover').val(json[0].path);});" /></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="button" id="button" value="保存" />
            <input name="id" type="hidden" id="id" value="<?=$category->getId()?>" />
            <input name="fromUrl" type="hidden" id="fromUrl" value="<?=getFromUrl()?>" /></td>
        </tr>
      </form>
    </table>
  </div>
</div>
