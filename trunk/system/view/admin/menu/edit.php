<div class="main">
  <div class="tools"> <a href="<?=site_url("admin/menu/index/type/".$type)?>" class="back">返回列表</a> <a href="#" onclick="$('#validateForm').submit();" class="save">保存修改</a> </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <caption class="caption_title">
      编辑菜单
      </caption>
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/menu/edit/type/".$type)?>">
        <tr>
          <th>父类菜单</th>
          <td><select name="parent_id" id="parent_id" class="required">
              <option value="0">root</option>
              <?php
	 while($parent = $parent_data->getObject()){
	 	echo '<option value="'.$parent->getId().'" ';
		if($parent->getId() == $menu->getParentId() || $pid == $parent->getId()) echo 'selected="selected" ';
		echo '>'.$parent->getHeadStr().$parent->getSubject().'</option>';
	 }
	?>
            </select>
            <em>*</em></td>
        </tr>
        <tr>
          <th>菜单名称</th>
          <td><input name="subject" type="text" id="subject" value="<?=$menu->getSubject()?>" class="required" title="请填写菜单名称"/>
            <em>*</em></td>
        </tr>
        <tr>
          <th>排序</th>
          <td><input name="orders" type="text" id="orders" value="<?=$menu->getOrders()?>" /></td>
        </tr>
        <tr>
          <th>类型</th>
          <td><input name="type" type="text" id="type" value="<?=$menu->getType() ? $menu->getType() : $type?>" readonly="readonly" /></td>
        </tr>
        <tr>
          <th>菜单地址</th>
          <td><input name="url" type="text" id="url" value="<?=$menu->getUrl()?>" size="56"  class="required" title="请填写菜单URL地址，父级菜单菜单请用“#”代替"/>
            <em>*</em></td>
        </tr>
        <tr>
          <th>菜单说明</th>
          <td><input name="alt" type="text" id="alt" value="<?=$menu->getAlt()?>" size="60" /></td>
        </tr>
		<tr>
          <th>权限组</th>
          <td><ul class="action_group_list">
              <?php while($group = $pager->getObject()):?>
              <li>
                <input name="user_group_ids[]" type="checkbox" id="user_group_ids_<?=$group->getId()?>" value="<?=$group->getId();?>" <?php if(in_array($group->getId(),$menu->getUserGroupIds(true))) echo 'checked="checked"';?>/>
                <?=$group->getUserGroupName();?>
              </li>
              <?php endwhile;?>
            </ul></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="button" id="button" value="保存" />
            <input name="id" type="hidden" id="id" value="<?=$menu->getId()?>" />
            <input name="fromUrl" type="hidden" id="fromUrl" value="<?=getFromUrl()?>" /></td>
        </tr>
      </form>
    </table>
  </div>
</div>
