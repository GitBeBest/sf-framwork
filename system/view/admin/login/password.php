<div class="main">
  <div class="tools"> <a href="javascript:history.go(-1);" class="back">返回</a> <a href="javascript:$('#validateForm').submit();" class="save">保存修改</a> </div>
  <div class="box">
    <table border="0" align="center" cellpadding="2" cellspacing="1" class="tb_data">
      <caption class="caption_title">
      修改密码
      </caption>
      <?php if($msg):?>
      <tr>
        <td colspan="2"><em>
          <?=$msg?>
          </em></td>
      </tr>
      <?php endif;?>
      <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/login/password")?>">
        <tr>
          <th>登陆名</th>
          <td><?=$user->getUserName()?></td>
        </tr>
        <tr>
          <th>登陆密码</th>
          <td><input name="oldpassword" type="password" id="oldpassword" class="required"/>
            <em>*</em></td>
        </tr>
        <tr>
          <th>新密码</th>
          <td><input name="password" type="password" id="password" class="required"/>
            <em>*</em></td>
        </tr>
        <tr>
          <th>重复新密码</th>
          <td><input name="repassword" type="password" id="repassword" class="required"/>
            <em>*</em></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><label>
            <input type="submit" name="button" id="button" value="保存" />
            </label>
            <input name="id" type="hidden" id="id" value="<?=$user->getId()?>" />
            <input name="fromUrl" type="hidden" id="fromUrl" value="<?=getFromUrl()?>" /></td>
        </tr>
      </form>
    </table>
  </div>
</div>
