<div class="main">
  <div class="tools"> <a href="#" onclick="$('#validateForm').submit();" class="save">保存修改</a> </div>
  <div class="box">
    <form id="validateForm" name="validateForm" method="post" action="">
      <table cellpadding="3" cellspacing="1" class="tb_data">
        <caption class="caption_title">
        网站全局配置
        </caption>
        <tr>
          <th width="100">站点名称</th>
          <td><input name="site[site_name]" type="text" id="site_name" value="<?=config::get('site_name')?>" size="50" />
          请填写网站的名称，该内容将出现在网站的标题等地方。</td>
        </tr>
        <tr>
          <th>默认使用语言</th>
          <td><label>
              <select name="site[default_lang]" id="default_lang">
                <option value="chinese" <?php if(config::get('default_lang') == 'chinese') echo ' selected="selected"';?>>简体中文</option>
                <option value="english" <?php if(config::get('default_lang') == 'english') echo ' selected="selected"';?>>英文</option>
              </select>
          请选择网站采用的默认语言。</label></td>
        </tr>
        <tr>
          <th>站点关键词</th>
          <td><input name="site[keyword]" type="text" id="keyword" size="50" value="<?=config::get('keyword')?>"/>
          请填写关键词语，多个关键词与用逗号分开。</td>
        </tr>
        <tr>
          <th>站点描述</th>
          <td><textarea name="site[describe]" cols="45" rows="4" id="describe"><?=config::get('describe')?></textarea>
          请填写网站的描述，该内容将出现在网页描述部分。</td>
        </tr>
        <tr>
          <th>站点基本路径</th>
          <td><input name="site[base_url]" type="text" id="base_url" size="50" value="<?=config::get('base_url')?>"/>
          请填写网站的基本路径，如：http://www.baidu.com/。</td>
        </tr>
        <tr>
          <th>默认引擎</th>
          <td><input name="site[index_page]" type="text" id="index_page" size="50" value="<?=config::get('index_page')?>"/>
          如果服务器不支持重定向，请填写“index.php”。</td>
        </tr>
      </table>
      <table cellpadding="3" cellspacing="1" class="tb_data">
        <caption class="caption_title">
          网站数据库配置
        </caption>
        <tr>
          <th width="100">数据库主机</th>
          <td><input name="site[mysql][hostname]" type="text" id="hostname" size="50" value="<?=config::get('mysql.hostname')?>"/>
          请填写数据库主机的地址。</td>
        </tr>
        <tr>
          <th>数据库用户</th>
          <td><input name="site[mysql][user]" type="text" id="user" size="50" value="<?=config::get('mysql.user')?>"/>
          请填写数据库登录用户名。</td>
        </tr>
        <tr>
          <th>数据库密码</th>
          <td><input name="site[mysql][passwd]" type="text" id="passwd" size="50" value="<?=config::get('mysql.passwd')?>"/>
          请填写数据库登录密码。</td>
        </tr>
        <tr>
          <th>数据库名</th>
          <td><input name="site[mysql][database]" type="text" id="database" size="50" value="<?=config::get('mysql.database')?>"/>
          请填写站点使用的数据库名称。</td>
        </tr>
      </table>
      <table cellpadding="3" cellspacing="1" class="tb_data">
        <caption class="caption_title">
          路由配置
        </caption>
        <tr>
          <th width="100">默认控制器</th>
          <td><input name="site[router][default_controller]" type="text" id="default_controller" size="50" value="<?=config::get('router.default_controller')?>"/>
          请填写默认执行的控制器，默认为“home”。</td>
        </tr>
        <tr>
          <th>默认方法</th>
          <td><input name="site[router][default_method]" type="text" id="default_method" size="50" value="<?=config::get('router.default_method')?>"/>
          请填写控制请默认执行方法，默认为“index”。</td>
        </tr>
      </table>
    </form>
  </div>
</div>
