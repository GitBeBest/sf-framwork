<?php

class tool extends model
{	
	function showTables()
	{
		$db = sf::getLib("db");
		$query = $db->query("SHOW TABLES");
		while($row = $db->fetch_array($query,MYSQL_NUM))
		{
			$result[] = $row[0];
		}
		return $result;
	}
	
	function showFields($table='test')
	{
		$db = sf::getLib("db");
		$query = $db->query("SELECT * FROM `$table` limit 1 ");
		while($field = $db->fetch_fields($query))
			$fileds[] = $field;
		return $fileds;
	}
}
?>