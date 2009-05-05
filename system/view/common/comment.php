<?php while($comment = $pager->getObject()):?>
<dl>
<dt><em><?=$comment->getUpdatedAt("Y/m/d")?></em><?=$comment->getUserName()?></dt>
<dd><?=$comment->getContent()?></dd>
</dl>
<?php endwhile;?>