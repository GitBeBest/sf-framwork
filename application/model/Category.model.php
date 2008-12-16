<?php

/**
 * 类名：数据模型扩展类
 * 说明：提供数据模型扩展方法。
 * $Id: init-model.php 151 2008-10-20 17:20:26Z meetcd $
 */

include_once("BaseCategory.php");
class Category extends BaseCategory
{
	function addNode($id,$data=array())
	{
		$node = $this->getNode($id);
		$this->moveSpace($node);
		$data['lft'] = $node->getRgt() + 1;
		$data['rgt'] = $node->getRgt() + 2;
		$db = sf::getLib("db");
		return $db->insert($data,$this->table);
	}
	
	function moveSpace($node)
	{
		$db = sf::getLib("db");
		$db->query("UPDATE ".$this->table." SET `lft` = `lft` + 2 WHERE `lft` > '".$node->getLft()."'");
		$db->query("UPDATE ".$this->table." SET `rgt` = `rgt` + 2 WHERE `rgt` > '".$node->getLft()."'");
	}
	
	function getNode($id)
	{
		$this->selectByPk($id);
		return $this;
	}
}