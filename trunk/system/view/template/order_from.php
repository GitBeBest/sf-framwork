<table width="998" height="200" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="210" align="center" valign="top"><table width="80%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="10"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1" /><img src="<?=site_url("images/gg.jpg")?>"width="210" height="88" /></td>
          </tr>
        </table>
      <table width="80%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="10"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1" /></td>
          </tr>
        </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#E1E1E1">
          <tr>
            <td align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#E1E1E1">
              <tr>
                <td align="center" valign="top" bgcolor="#FFFFFF"><table width="99%" height="30" border="0" cellpadding="0" cellspacing="0" bgcolor="#F7F7F7">
                    <tr>
                      <td class="titbg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="12"><img src="<?=site_path("images/spacer.gif")?>" width="1" height="1" /></td>
                            <td class="tit01">推荐产品</td>
                            <td width="44"><a href="<?=site_url("product/top/type/".$type)?>">更 多</a></td>
                          </tr>
                      </table></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="10"><?=selectProductTopByTypeStr($type,3)?></td>
                </tr>
              </table></td>
          </tr>
        </table>
      <table width="80%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="10"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1" /></td>
          </tr>
      </table></td>
    <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="30" height="30" align="right"><strong><img src="<?=site_url("images/arrow001.gif")?>" width="16" height="10" /></strong></td>
        <td><strong>当前位置:</strong> 首页&nbsp;&gt;&nbsp;购买订单</td>
      </tr>
    </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="1" bgcolor="#EBEBEB"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1" /></td>
          </tr>
          <tr>
            <td height="10" bgcolor="#FFFFFF"><img src="<?=site_url("images/spacer.gif")?>" width="1" height="1" /></td>
          </tr>
        </table>
      <table width="84%" border="0" cellpadding="0" cellspacing="1" style="line-height:30px; text-indent:12px; margin:0 auto;">
          <form id="validateForm" name="validateForm" method="post" action="<?=site_url("order_from/index/type/".$type)?>" >
		  <tr>
            <td colspan="2" align="left" bgcolor="#f6f6f6" class="f12purple"><strong>尊敬的顾客您好，在填写预约登记单后，工作人员将与您电话联络，核实信息，也请您电话提醒我们！</strong></td>
          </tr>
		  <tr>
            <td colspan="2" bgcolor="#f8f8f8">请填写货物信息:</td>
          </tr>
          <tr>
            <td bgcolor="#f8f8f8">货物名称：</td>
            <td bgcolor="#fafafa"><input name="subject" id="subject"   value="<?=$subject?>" size="60" />
                <span>*</span></td>
          </tr>
		  <tr>
            <td bgcolor="#f8f8f8">货物单价：</td>
            <td bgcolor="#fafafa"><input name="price"  id="price"  />
                <span>*</span></td>
          </tr>
          <tr>
            <td bgcolor="#f8f8f8">货物数量：</td>
            <td bgcolor="#fafafa"><input name="number"  id="number"  />
                <span>*</span></td>
          </tr>
          <tr>
            <td colspan="2" bgcolor="#f8f8f8">请填写客户信息：</td>
          </tr>

          <tr>
            <td width="15%" bgcolor="#f8f8f8">您的姓名：</td>
            <td width="85%" bgcolor="#fafafa"><input name="user_name" value="<?=input::getInput("session.username")?>" />
                <span>*</span></td>
          </tr>
          <tr>
            <td bgcolor="#f8f8f8">如何称呼：</td>
            <td bgcolor="#fafafa"><input type="radio" checked="checked" value="先生" name="user_sex" />
              先生
              <input type="radio" value="女士" name="user_sex" />
              女士</td>
          </tr>
          <tr>
            <td bgcolor="#f8f8f8">移动电话：</td>
            <td bgcolor="#fafafa"><input name="user_mobile" id="user_mobile"   />
                <span>*</span></td>
          </tr>
          <tr>
            <td bgcolor="#f8f8f8">固定电话：</td>
            <td bgcolor="#fafafa"><input name="user_phone" id="user_phone"   /></td>
          </tr>
          <tr>
            <td bgcolor="#f8f8f8">传真号码：</td>
            <td bgcolor="#fafafa"><input name="user_fax" id="user_fax"   /></td>
          </tr>
          <tr>
            <td bgcolor="#f8f8f8">您的邮箱：</td>
            <td bgcolor="#fafafa"><input name="user_email" id="user_email"   /></td>
          </tr>
          <tr>
            <td bgcolor="#f8f8f8">您的地址：</td>
            <td bgcolor="#fafafa"><input name="user_address" id="user_address"   size="60" />
                <span>*</span></td>
          </tr>
          <tr>
            <td colspan="2" bgcolor="#f8f8f8">备注内容：</td>
          </tr>
          <tr>
            <td colspan="2" bgcolor="#fafafa"><textarea name="notebook" cols="58" rows="6" class="textarea1out" id="notebook" onmouseover="this.className='textarea1over'" onmouseout="this.className='textarea1out'"></textarea>            </td>
          </tr>
          <tfoot>
            <tr>
              <td height="40" colspan="2" bgcolor="#fafafa"><input type="submit" name="Submit" value="提交预约订单" /></td>
            </tr>
          </tfoot>
		  </form>
        </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center">&nbsp;</td>
          </tr>
        </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center">&nbsp;</td>
          </tr>
      </table></td>
  </tr>
</table>
