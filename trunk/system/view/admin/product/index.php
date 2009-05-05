<div class="main">
  <div class="tools"> <a href="<?=site_url("admin/product/edit/type/".$type)?>" class="add">新增产品</a> <a href="#" onclick="$('#validateForm').submit();" class="delete">删除选中项</a> </div>
  <div class="search">
    <form id="form1" name="form1" method="post" action="">
      <label>关键词
      <input name="search" type="text" id="search" />
      <input name="field" type="radio" value="subject" checked="checked" />
      产品名称
      <input name="field" type="radio" value="brief" />
      产品描述
	  <input name="field" type="radio" value="price" />
      产品价格
      <input name="field" type="radio" value="price" />
      发布时间
      <input type="submit" name="button" id="button" value="搜索" />
      </label>
    </form>
  </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/product/delete/type/".$type)?>">
        <tr>
          <th><input name="selectAll" id="selectAll" type="checkbox" /></th>
          <th><?=getColumnStr('产品名称','subject')?></th>
          <th><?=getColumnStr('所属分类','category_id')?></th>
          <th><?=getColumnStr('最近更新时间','updated_at')?></th>
          <th><?=getColumnStr('是否发布','is_public')?></th>
          <th>可用操作</th>
        </tr>
        <?php while($product = $pager->getObject()):?>
        <tr>
          <td align="center"><input name="select_id[]"  type="checkbox" value="<?=$product->getId()?>" /></td>
          <td align="left"><?=$product->getIsTopStr()?> <?=$product->getIsHotStr()?> <?=$product->getSubject()?></td>
          <td align="center"><?=$product->getCategoryName()?></td>
          <td align="center"><?=$product->getUpdatedAt("Y/m/d")?></td>
          <td align="center"><?=$product->getIsPublicStr()?></td>
          <td align="center"><a href="<?=site_url("admin/product/delete/type/".$type."/id/".$product->getId())?>" onclick="return confirm('删除后不可恢复，你确定删除？');">删除</a> <a href="<?=site_url("admin/product/edit/type/".$type."/id/".$product->getId())?>">编辑</a></td>
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
