<div class="main">
  <div class="tools"> <a href="<?=site_url("admin/orders/index")?>" class="back">订单列表</a> <a href="#" onclick="$('#validateForm').submit();" class="save">保存资料</a> </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <caption class="caption_title">
      处理订单信息
      </caption>
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/orders/edit")?>">
        <tr>
          <th width="100">订单标题</th>
          <td><?=$orders->getSubject()?></td>
          <th width="100">订购者</th>
          <td><?=$orders->getUserName()?></td>
        </tr>
		<tr>
          <th>产品单价</th>
          <td><?=$orders->getPrice()?></td>
          <th>产品数量</th>
          <td><?=$orders->getNumber()?></td>
		</tr>
		<tr>
          <th width="100">称谓</th>
          <td><?=$orders->getUserSex()?></td>
          <th width="100">移动电话</th>
          <td><?=$orders->getUserMobile()?></td>
        </tr>
		<tr>
          <th width="100">固定电话</th>
          <td><?=$orders->getUserPhone()?></td>
          <th width="100">传真</th>
          <td><?=$orders->getUserFax()?></td>
        </tr>
		<tr>
          <th width="100">电子邮件</th>
          <td><?=$orders->getUserEmail()?></td>
          <th width="100">订单时间</th>
          <td><?=$orders->getUpdatedAt("Y/m/d")?></td>
        </tr>
		<tr>
          <th>联系地址</th>
          <td colspan="3"><?=$orders->getUserAddress()?></td>
        </tr>
		<tr>
          <th>备注信息</th>
          <td colspan="3"><label>
            <textarea name="notebook" rows="5" id="notebook" style="width:100%;"><?=$orders->getNotebook()?></textarea>
          </label></td>
        </tr>
		<tr>
          <th>是否处理</th>
          <td colspan="3"><label>
            <input name="is_public" type="checkbox" id="is_public" value="1" <?php if($orders->getIsPublic()) echo 'checked="checked"';?> />
          处理</label></td>
        </tr>
        <tr>
          <th align="right">处理信息</th>
          <td colspan="3"><label>
            <textarea name="note" rows="5" id="note" style="width:100%;"><?=$orders->getNote()?></textarea>
          </label></td>
        </tr>
        <tr>
          <td colspan="4" align="center"><input type="submit" name="button" id="button" value="保存资料" />
            <input name="id" type="hidden" id="id" value="<?=$orders->getId()?>" />
            <input name="fromUrl" type="hidden" id="fromUrl" value="<?=getFromUrl()?>" /></td>
        </tr>
      </form>
    </table>
  </div>
</div>
