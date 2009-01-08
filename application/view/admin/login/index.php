<div>
  <h1>Login::login</h1>
<?php
  if($msg) echo "<em>".$msg."</em>";
?>
  <form id="form1" name="form1" method="post" action="<?=site_url("admin/login/index")?>">
    <ul>
      <li>
        <label> Username
          <input name="username" type="text" id="username"/>
        </label>
      </li>
      <li>
        <label> Password
          <input name="password" type="password" id="password"/>
        </label>
      </li>
    </ul>
    <p>
      <label>
        <input type="submit" name="button" id="button" value="Login" />
      </label>
    </p>
  </form>
</div>
