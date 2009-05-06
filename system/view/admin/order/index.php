<div class="main">
  <div class="tools"><a href="#" onclick="$('#validateForm').submit();" class="delete">删除选中项</a></div>
  <div class="search">
    <form id="form1" name="form1" method="post" action="">
      <label>关键词
      <input name="search" type="text" id="search" />
      <input name="field" type="radio" value="subject" checked="checked" />
      订单标题
      <input name="field" type="radio" value="user_name" />
      订单者
      <input name="field" type="radio" value="updated_at" />
      发布时间
      <input type="submit" name="button" id="button" value="搜索" />
      </label>
    </form>
  </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/orders/delete")?>">
        <tr>
          <th><input name="selectAll" id="selectAll" type="checkbox" /></th>
          <th><?=getColumnStr('订单标题','subject')?></th>
          <th><?=getColumnStr('订单者','user_name')?></th>
		  <th><?=getColumnStr('产品单价','price')?></th>
		  <th><?=getColumnStr('产品数量','number')?></th>
          <th><?=getColumnStr('最近更新时间','updated_at')?></th>
          <th>可用操作</th>
        </tr>
        <?php while($orders = $pager->getObject()):?>
        <tr>
          <td align="center"><input name="select_id[]"  type="checkbox" value="<?=$orders->getId()?>" /></td>
          <td align="left"><?=link_to("admin/orders/edit/id/".$orders->getId(),$orders->getSubject())?></td>
          <td align="center"><?=$orders->getUserName()?></td>
		  <td align="center"><?=$orders->getPrice()?></td>
		  <td align="center"><?=$orders->getNumber()?></td>
          <td align="center"><?=$orders->getUpdatedAt("Y/m/d")?></td>
          <td align="center"><a href="<?=site_url("admin/orders/delete/id/".$orders->getId())?>" onclick="return confirm('删除后不可恢复，你确定删除？');">删除</a> <a href="<?=site_url("admin/orders/edit/id/".$orders->getId())?>">处理</a></td>
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
