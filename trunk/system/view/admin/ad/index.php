<div class="main">
  <div class="tools"> <a href="<?=site_url("admin/ad/edit")?>" class="add">新增广告</a> <a href="#" onclick="$('#validateForm').submit();" class="delete">删除选中项</a></div>
  <div class="search">
    <form id="form1" name="form1" method="post" action="">
      <label>关键词
      <input name="search" type="text" id="search" />
      <input name="field" type="radio" value="subject" checked="checked" />
      广告标题
      <input name="field" type="radio" value="brief" />
      广告描述
      <input name="field" type="radio" value="updated_at" />
      发布时间
      <input type="submit" name="button" id="button" value="搜索" />
      </label>
    </form>
  </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/ad/delete")?>">
        <tr>
          <th><input name="selectAll" id="selectAll" type="checkbox" /></th>
          <th><?=getColumnStr('广告标题','subject')?></th>
          <th><?=getColumnStr('广告类型','type_str')?></th>
          <th><?=getColumnStr('广告描述','brief')?></th>
          <th><?=getColumnStr('更新时间','updated_at')?></th>
          <th><?=getColumnStr('是否发布','is_public')?></th>
          <th>可用操作</th>
        </tr>
        <?php while($ad = $pager->getObject()):?>
        <tr>
          <td align="center"><input name="select_id[]"  type="checkbox" value="<?=$ad->getId()?>" /></td>
          <td align="left"><?=link_to("admin/ad/show/id/".$ad->getId(),$ad->getSubject())?></td>
          <td align="center"><?=lang::get($ad->getTypeSTr())?></td>
          <td align="center"><?=$ad->getBrief()?></td>
          <td align="center"><?=$ad->getUpdatedAt("Y/m/d")?></td>
          <td align="center"><?=$ad->getIsPublicStr()?></td>
          <td align="center"><a href="<?=site_url("admin/ad/delete/id/".$ad->getId())?>" onclick="return confirm('删除后不可恢复，你确定删除？');">删除</a> <a href="<?=site_url("admin/ad/edit/id/".$ad->getId())?>">编辑</a></td>
        </tr>
        <?php endwhile; ?>
        <tr>
          <td colspan="7"><span class="pager_bar">
            <?=$pager->fromto().$pager->navbar(5).$pager->pagejump()?>
            </span> <input type="submit" name="Submit" value="删除选中项" /></td>
        </tr>
      </form>
    </table>
  </div>
</div>
