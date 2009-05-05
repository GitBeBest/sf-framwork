<div class="main">
<p>欢迎 <em>
  <?=$user->getUserUsername()?>
  </em> 登录,你所属的权限组是 <em>
  <?=$user->getUserGroupName()?>
  </em> ，你已经累计登录 <em>
  <?=$user->getLoginNum()?>
  </em> 次，你的登录IP是 <em>
  <?=$user->getUserIp()?>
  </em> 。</p>
  </div>

