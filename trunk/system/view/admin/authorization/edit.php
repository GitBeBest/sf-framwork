<div class="main">
  <div class="tools"> <a href="javascript:history.go(-1);" class="back">返回</a> <a href="javascript:$('#validateForm').submit();" class="save">保存资料</a> </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <caption class="caption_title">
      编辑权限
      </caption>
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/authorization/edit")?>">
        <tr>
          <th>控制器名</th>
          <td><input name="controller_name" type="text" id="controller_name" value="<?=$authorization->getControllerName()?>" /></td>
        </tr>
        <tr>
          <th>控制器</th>
          <td><input name="controller" type="text" id="controller" value="<?=$authorization->getController()?>" /></td>
        </tr>
        <tr>
          <th>方法名</th>
          <td><input name="method" type="text" id="method" value="<?=$authorization->getMethod()?>" /></td>
        </tr>
        <tr>
          <th>权限组</th>
          <td><ul class="action_group_list">
              <?php while($group = $pager->getObject()):?>
              <li>
                <input name="actions[]" type="checkbox" id="actions_<?=$group->getId()?>" value="<?=$group->getId();?>" <?php if(in_array($group->getId(),$authorization->getUserGroupIds(true))) echo 'checked="checked"';?>/>
                <?=$group->getUserGroupName();?>
              </li>
              <?php endwhile;?>
              <li>
                <input name="actions[]" type="checkbox" id="actions_100" value="-1" <?php if(in_array('-1',$authorization->getUserGroupIds(true))) echo 'checked="checked"';?>/>
                <s style="color:red">禁止使用(选中本项后，其他组将不再有任何权限)</s></li>
            </ul></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="button" id="button" value="保存资料" />
            <input name="id" type="hidden" id="id" value="<?=$authorization->getId()?>" />
            <input name="fromUrl" type="hidden" id="fromUrl" value="<?=getFromUrl()?>" /></td>
        </tr>
      </form>
    </table>
  </div>
</div>
