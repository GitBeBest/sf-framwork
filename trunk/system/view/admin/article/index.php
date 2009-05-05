<div class="main">
  <div class="tools"> <a href="<?=site_url("admin/article/edit/type/".$type)?>" class="add">新增文章</a> <a href="#" onclick="$('#validateForm').submit();" class="delete">删除选中项</a> <a href="#" onclick="loadbox.load('<?=site_url("admin/build/index/type/article")?>')" class="export">生成静态页面</a></div>
  <div class="search">
    <form id="form1" name="form1" method="post" action="">
      <label>关键词
      <input name="search" type="text" id="search" />
      <input name="field" type="radio" value="subject" checked="checked" />
      文章标题
      <input name="field" type="radio" value="brief" />
      文章描述
      <input name="field" type="radio" value="updated_at" />
      发布时间
      <input type="submit" name="button" id="button" value="搜索" />
      </label>
    </form>
  </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/article/delete/type/".$type)?>">
        <tr>
          <th><input name="selectAll" id="selectAll" type="checkbox" /></th>
          <th><?=getColumnStr('文章标题','subject')?></th>
          <th><?=getColumnStr('所属分类','category_id')?></th>
          <th><?=getColumnStr('最近更新时间','updated_at')?></th>
          <th><?=getColumnStr('是否发布','is_public')?></th>
          <th>可用操作</th>
        </tr>
        <?php while($article = $pager->getObject()):?>
        <tr>
          <td align="center"><input name="select_id[]"  type="checkbox" value="<?=$article->getId()?>" /></td>
          <td align="left"><?=$article->getIsTopStr()?> <?=$article->getIsHotStr()?> <?=$article->getSubject()?></td>
          <td align="center"><?=$article->getCategoryName()?></td>
          <td align="center"><?=$article->getUpdatedAt("Y/m/d")?></td>
          <td align="center"><?=$article->getIsPublicStr()?></td>
          <td align="center"><a href="<?=site_url("admin/article/delete/type/".$type."/id/".$article->getId())?>" onclick="return confirm('删除后不可恢复，你确定删除？');">删除</a> <a href="<?=site_url("admin/article/edit/type/".$type."/id/".$article->getId())?>">编辑</a></td>
        </tr>
        <?php endwhile; ?>
        <tr>
          <td colspan="9"><span class="pager_bar">
            <?=$pager->fromto().$pager->navbar(10)?>
            </span> <input type="submit" name="Submit" value="删除选中项" /></td>
        </tr>
      </form>
    </table>
  </div>
</div>
