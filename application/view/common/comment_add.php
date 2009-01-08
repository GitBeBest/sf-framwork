<div>
  <table>
    <tr>
      <th colspan="2">备注管理</th>
    </tr>
    <form id="validateForm" name="validateForm" method="post" action="<?=site_url("common/addComment")?>">
      <tr>
        <td>备注内容</td>
        <td><textarea name="content" rows="4" class="required" id="content"></textarea><em>*</em></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" name="button" id="button" value="提交" />
          <input name="item_id" type="hidden" id="item_id" value="<?=$item_id?>" />
          <input name="item_type" type="hidden" id="item_type" value="<?=$item_type?>" />
          <input type="button" name="button2" id="button2" value="关闭"  onclick="parent.loadbox.unload();"/></td>
      </tr>
    </form>
  </table>
</div>
<div>
  <table>
    <tr>
      <th colspan="2">备注列表</th>
    </tr>
      <tr>
        <td width="23">ID</td>
        <td>内容</td>
      </tr>
      <?php while($comment = $pager->getObject()):?>
      <tr>
        <td><?=$comment->getId();?></td>
        <td><?=$comment->getUserName().'：'.$comment->getContent()."(<em>".$comment->getCreatedAt("Y/m/d H:i")."</em>)";?></td>
      </tr>
      <?php endwhile;?>
      <tr>
        <td colspan="2"><?=$pager->navbar()?></td>
      </tr>
  </table>
</div>
