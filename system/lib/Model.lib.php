<?php

class model
{
	public function __construct(){}
	
	public function selectAll($addWhere = '',$addSql = '',$showMax = 20,$select = '')
	{
		$db = sf::getLib("db");
		
		if($select) $sql = $select." ";
		else $sql = "SELECT * FROM ".$this->table." ";
		$addWhere && $sql .= "WHERE ".$addWhere;
		$addSql && $sql .= $addSql;
		
		$query = $db->query($sql);
		
		return sf::getLib("collection",clone $this,$db->result_array($query));
	}
	
	public function getPager($addWhere = '',$addSql = '',$showMax = 20,$select = '',$key = '')
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
		
		$pager = sf::getLib("pager",$total,$showMax,$key);
		$sql .= "LIMIT ".$pager->getStartNum().",".$pager->getShowNum();
		$query = $db->query($sql);
		
		$pager->setField($db->result_array($query));
		$pager->setObject(clone $this);
		
		return $pager;
	}
}
?>