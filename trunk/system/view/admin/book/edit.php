<div class="main">
  <div class="tools"> <a href="<?=site_url("admin/article/index/type/".$type)?>" class="back">留言列表</a> <a href="#" onclick="$('#validateForm').submit();" class="save">保存资料</a> </div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <caption class="caption_title">
      回复留言信息
      </caption>
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/book/edit")?>">
        <tr>
          <th align="right" width="80">姓名</th>
          <td><input name="user_name" type="text" id="user_name" value="<?=$book->getUserName()?>" size="60" class="required"/>
            <em>*</em></td>
        </tr>
		<tr>
          <th align="right" width="80">电话</th>
          <td><input name="user_phone" type="text" id="user_phone" value="<?=$book->getUserPhone()?>" size="60" class="required"/>
            <em>*</em></td>
        </tr>
		<tr>
          <th align="right" width="80">QQ</th>
          <td><input name="user_qq" type="text" id="user_qq" value="<?=$book->getUserQq()?>" size="60" class="required"/>
            <em>*</em></td>
        </tr>
		<tr>
          <th align="right" width="80">Email</th>
          <td><input name="user_email" type="text" id="user_email" value="<?=$book->getUserEmail()?>" size="60" class="required"/>
            <em>*</em></td>
        </tr>
		<tr>
          <th align="right" width="80">留言内容</th>
          <td><textarea name="content" cols="60" rows="5" id="content" class="required"><?=$book->getContent()?>
          </textarea>
            <em>*</em></td>
        </tr>
        <tr>
          <th align="right">留言属性</th>
          <td><label>
          <input name="is_public" type="checkbox" id="is_public" value="1" <?php if($book->getIsPublic()) echo 'checked="checked"';?> />
            是否发布 </label></td>
        </tr>
        <tr>
          <th align="center">回复内容</th>
          <td align="left"><textarea name="write_back" cols="60" rows="5" id="write_back" class="required"><?=$book->getWriteBack()?>
          </textarea></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="button" id="button" value="保存资料" />
            <input name="id" type="hidden" id="id" value="<?=$book->getId()?>" />
            <input name="fromUrl" type="hidden" id="fromUrl" value="<?=getFromUrl()?>" /></td>
        </tr>
      </form>
    </table>
  </div>
</div>
