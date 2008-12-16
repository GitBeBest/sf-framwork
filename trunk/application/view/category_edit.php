<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>article</title>
</head>

<body>
<div>
<h1>Category</h1>
<form id="form1" name="form1" method="post" action="<?=site_url("categorymanager/edit")?>">
<ul>
<li>
<label>Subject</label>
<input type="text" name="subject" id="subject" />
</li>
<li>
<label>Note</label>
<textarea name="subject" rows="4" id="subject"></textarea>
</li>
<li>
    <input type="submit" name="button" id="button" value="提交" />
</li>
</ul>
</form>
</div>
</body>
</html>
