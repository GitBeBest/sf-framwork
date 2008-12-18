<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>demo</title>
</head>

<body>
<div>
<h1>demo::edit</h1>
<form id="form1" name="form1" method="post" action="<?=site_url("demo_controller/edit")?>">
<ul>
<li>
<label>
 Subject
  <input name="subject" type="text" id="subject" value="<?=$demo->getSubject()?>" />
</label>
</li>
</ul>
<p>
  <label>
    <input type="submit" name="button" id="button" value="Save" />
  </label>
  <input name="id" type="hidden" id="id" value="<?=$demo->getId()?>" />
</p>
</form>
</div>
</body>
</html>
