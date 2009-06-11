<?php
/**
 * 转化显示Textarea文本内容
 *
 */
function showText($char)
{
    $char=htmlspecialchars($char);
	$char=str_replace(" ","&nbsp;",$char);
	$char=nl2br($char);
    $char=str_replace("<?","< ?",$char);
    return $char;
}