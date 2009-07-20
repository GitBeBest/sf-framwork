<?php
/** 
 * 类名：数据模型基类 
 * 功能：完成数据模型的一些基本功能
 * $Id$
 */ 
 
class model
{
	public function __construct(){}
	
	public function selectAll($addWhere = '',$addSql = '',$showMax = 0,$select = '')
	{
		$db = sf::getLib("db");
		
		if($select) $sql = $select." ";
		else $sql = "SELECT * FROM ".$this->table." ";
		$addWhere && $sql .= "WHERE ".$addWhere." ";
		$addSql && $sql .= $addSql;
		$showMax && $sql .= ' LIMIT '.$showMax;
		
		$query = $db->query($sql);
		
		return sf::getLib("collection",clone $this,$db->result_array($query));
	}
	
	public function getPager($addWhere = '',$addSql = '',$showMax = 20,$select = '',$key = '',$form_vars=array())
	{
		$db = sf::getLib("db");
		
		if($select) $sql = $select." ";
		else $sql = "SELECT * FROM `".$this->table."` ";
		$addWhere && $sql .= "WHERE ".$addWhere." ";
		$addSql && $sql .= $addSql." ";
		
		if(!router::get("totalnum".$key)){
			$query = $db->query($sql);
			$total = $db->num_rows($query);
		}else $total = router::get("totalnum".$key);
		
		$pager = sf::getLib("pager",$total,$showMax,$key,$form_vars);
		$sql .= "LIMIT ".$pager->getStartNum().",".$pager->getShowNum();
		$query = $db->query($sql);
		
		$pager->setField($db->result_array($query));
		$pager->setObject(clone $this);
		
		return $pager;
	}
}
?>