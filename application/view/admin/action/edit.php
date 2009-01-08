<div>
  <h1>编辑权限</h1>
  <form id="form1" name="form1" method="post" action="<?=site_url("admin/action/edit")?>">
    <ul>
      <li>
        <label>控制器名
          <input name="controller_name" type="text" id="controller_name" value="<?=$action->getControllerName()?>" />
        </label>
      </li>
      <li>
        <label>控制器
          <input name="controller" type="text" id="controller" value="<?=$action->getController()?>" />
        </label>
      </li>
      <li>
        <label>方法名
          <input name="method" type="text" id="method" value="<?=$action->getMethod()?>" />
        </label>
      </li>
    </ul>
    <ul class="action_group_list">
    <?php while($group = $pager->getObject()):?>
    <li><input name="actions[]" type="checkbox" id="actions_<?=$group->getId()?>" value="<?=$group->getId();?>" <?php if(in_array($group->getId(),$action->getUserGroupIds(true))) echo 'checked="checked"';?>/><?=$group->getUserGroupName();?></li>
    <?php endwhile;?>
    </ul>
    <p>
      <label>
        <input type="submit" name="button" id="button" value="Save" />
      </label>
      <input name="id" type="hidden" id="id" value="<?=$action->getId()?>" />
    </p>
  </form>
</div>
