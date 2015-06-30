# 概述 #

**_本框架是个多用途框架，他目前支援2种开发方式，那就是：MVC编程和一般顺序编程。框架默认使用MVC编程。我们现在以开发一个简单的留言板为例进行说明。_**


# 请跟我做 #

### 创建数据模型 ###
_当然这个不是必要的，你也可以省略这步直接从下一步开始编写一个不需要数据库参与的传统意义上的Hello word! ;-)_

你首先需要在数据库中创建一个数据表BOOK，它有4个字段，如：subject（标题），content（内容），created\_at(留言时间)，response(回复)。如果你知道数据库是什么那请自行创建，否则，请执行以下的MYSQL命令：

```
CREATE TABLE `pzsfjrmtjglxt`.`book` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
`subject`  VARCHAR( 60 ) NULL ,
`content`  TEXT NULL ,
`response`  TEXT NULL ,
`created_at` DATETIME NULL  ,
PRIMARY KEY ( `id` )
) ENGINE = MYISAM
```

请访问[http:// localhost/tools]（这是系统的一个数据模型生成工具），你就会看到你刚才创建的数据表，你选中它执行就完成了数据模型的创建。当然，你创建之后有对数据库有了新的修改，那么，你需要再次进行这样的操作，TOOLS会重新生成数据模型。

_只要数据模型创建成功，你就可以在任何时候任何地点用 ` sf::getModel(“book”) ` 这样的方式来取得这个数据模型对象。_

### 创建控制器 ###

_控制其是一个程序或者说是一个页面的基本组成部分，是核心和灵魂，我们这个框架所谓的程序设计一般指控制器设计（当然也有所谓的开发，它是指对类库、助手和插件的拓展和开发，这个属于“高科技”）。_

在application/controller/目录下创建一个控制器类guestbook并命名为“guestbook.php”,其内容如下：

```
<?php
Class guestbook extends controller
{
	public $auth = false; //这里表示不验证权限，即使不登陆也可以访问
	
	/**
	 * 留言列表
	 */
	function index()
	{
		$addWhere = $addSql = ''; //初始化变量
		$addSql = "order `created_at` DESC"; //按照留言时间排序
		$addWhere .= "`response` IS NOT NULL "; //选取的条件,如果回复了财显示
		input::getInput("post.search") && $addWhere .= " AND `content` LIKE '%".trim(input::getInput("post.search"))."%' "; //按照条件搜索	

	view::set("pager",sf::getModel("book")->getPager($addWhere,$addSql,5)); //每页显示5条记录
	view::display("index");//显示“index”视图
	}
	
/*
* 插入留言
*/
	function edit()
	{
		$book = sf::getModel("book");  //取得数据模型对象，如果你需要修改ID为3的留言记录，这里你可以这样写：$book = sf::getModel("book"，3);如果这里稍微做些修改，你会发现修改和增加其实都可以使用这个方法。：-）
		if(input::getInput("post.content")) //判断是否有内容输入
		{
			$book->setSubject(input::getInput("post.subject"));//设置留言标题
			$book->setContent(input::getInput("post.content"));//设置留言内容
			$book->setCreatedAt(date("Y-m-d H:i:s"));//设置留言时间
			If（$book->save()） //保存留言
				$this->page_debug(lang::get("Has been saved!"),getFromUrl());
		}
		view::set("book",$book);//将book对象与视图关联
		view::display("edit");//显示“edit”视图
	}
}
?>
```

### 创建视图文件 ###

_按照控制器和你的需要创建视图文件，当然，这一步也不是必须的！不过，我们在大多数时候是需要的。_

在“application/iew”中创建视图文件“edit.php”，其内容如下：

```
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言板</title>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <form name="bookform" id="bookform" action="<?=site_url(“guestbook/edit”)?>" method="post">
  <tr>
    <th align="right">留言标题</th>
    <td><label>
      <input name="subject" type="text" id="subject" size="60" value=”<?=$book->getSubject()?>” />
    </label></td>
  </tr>
  <tr>
    <th align="right">留言内容</th>
    <td><label>
      <textarea name="content" cols="60" rows="10" id="content"><?=$book->getContent()?></textarea>
    </label></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><label>
      <input type="submit" name="button" id="button" value="提交" />
<input name="id" type="hidden" id="id" value="<?=$book->getId()?>" />
    </label></td>
  </tr>
  </form>
</table>
</body>
</html>
```

在“application/iew”中创建视图文件“index.php”，其内容如下:

```
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言板-列表</title>
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <form name="bookform" id="bookform" action="<?=site_url("guestbook/index")?>" method="post">
    <tr>
      <th width="26%" align="right"><label> 关键词
          <input type="text" name="search" id="search" />
          <input type="submit" name="button" id="button" value=" 搜 索 " />
          <input type="button" name="button2" id="button2" value=" 留 言 " onclick="window.location.href='<?=site_url("guestbook/edit")?>'" />
        </label></th>
    </tr>
  </form>
  <?php while($book = $pager->getObject()):?>
  <tr>
    <th align="left"><?=$book->getSubject()?><br /><?=$book->getContent()?></th>
  </tr>
  <?php endwhile;?>
  <tr>
    <td align="right"><?=$pager->fromto().$pager->navbar(10)?></td>
  </tr>
</table>
</body>
</html>
```

**_如果你按照上面的流程走下来，你应该可以用[http:// localhost/guestbook/index]来访问你的简单的留言板了。当然回复没有为你演示，聪明的你应该可以很容易的自己设计出来。_**