<div class="main">
  <div class="tools"> <a href="#"  onclick="history.go(-1);" class="back">返回</a></div>
  <div class="box">
    <table cellpadding="3" cellspacing="1" class="tb_data">
      <caption class="caption_title">
      编辑广告信息
      </caption>
        <tr>
          <th align="right" width="80">广告标题</th>
          <td><?=$ad->getSubject()?></td>
        </tr>
		<tr>
          <th align="right" width="80">广告类型</th>
          <td><?=$ad->getTypeStr()?></td>
        </tr>
		<tr>
          <th align="right" width="80">广告描述</th>
          <td><?=$ad->getBrief()?></td>
        </tr>
        <tr>
          <th align="right">广告属性</th>
          <td><?=$ad->getIsPublicStr()?></td>
        </tr>
        <tr>
          <th align="center">广告代码</th>
          <td align="left"><?php echo '&lt;?=sf::getPlugin("AdPlugin")-&gt;generate('.$ad->getId().')?&gt;';?></textarea>
          </label></td>
        </tr>
        <tr>
          <th align="center">广告内容</th>
          <td align="left"><?=sf::getPlugin("AdPlugin")->generate($ad->getId())?></td>
        </tr>
    </table>
  </div>
</div>
