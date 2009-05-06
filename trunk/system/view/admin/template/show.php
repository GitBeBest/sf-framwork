<div class="main">
  <div class="tools"> <a href="#"  onclick="history.go(-1);" class="back">返回</a></div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <caption class="caption_title">
      查看模板效果
      </caption>
        <tr>
          <th align="right" width="80">模板标题</th>
          <td><?=$template->getSubject()?></td>
        </tr>
		<tr>
          <th align="right" width="80">模板描述</th>
          <td><?=$template->getBrief()?></td>
        </tr>
		<tr>
          <th align="right" width="80">封面图片</th>
          <td><?=$template->getCover()?></td>
        </tr>
        <tr>
          <th align="right">发布日期</th>
          <td><?=$template->getUpdatedAt("Y/m/d")?></td>
        </tr>
        <tr>
          <th align="center">调用代码</th>
          <td align="left"><?php echo '&lt;?=sf::getPlugin("AdPlugin")-&gt;generate('.$template->getId().')?&gt;';?></textarea>
          </label></td>
        </tr>
        <tr>
          <th align="center">模板效果</th>
          <td align="left"><?=test(1)?></td>
        </tr>
    </table>
  </div>
</div>
