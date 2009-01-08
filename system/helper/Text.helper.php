<?php
function textArea($str='')
{
	return nl2br(str_replace(" ","&nbsp;",$str));
}