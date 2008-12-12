<?php
/**
 * 生成数据模型
 * $Id: init-model.php 151 2008-10-20 17:20:26Z meetcd $
 */
include_once("../config/config.inc.php");
class initModel
{
	var $db = NULL;
	var $root;
	var $model;
	var $table_info = array();
	
	function initModel($root,$table,$model)
	{
		$this->init($root,$table,$model);
	}
	
	function init($root,$table,$model)
	{
		require_once(DIR_CMS_INCLUDES."/lib/DB2.inc.php");
		$this->db = new DB2();
		$this->table = $table;
		$this->root = $root;
		$this->model = ucfirst(strtolower($model));
	}
	
	function getInfo()
	{
		$sql  = "SHOW FIELDS FROM ".constant($this->table);
		$query_id = $this->db->query($sql);
		$this->table_info = $this->db->getData($query_id);
		return $this->table_info;
	}
	
	function getAttribute()
	{
		if(count($this->table_info) < 1)
			$this->table_info = $this->getInfo();
		$str = '';
		for($i=0,$n=count($this->table_info);$i<$n;$i++)
		{
			if($this->table_info[$i]['Default'] !== NULL)
				$str .= '	var $'.$this->table_info[$i]['Field'].'	= \''.$this->table_info[$i]['Default'].'\';'."\r\n";
			else $str .= '	var $'.$this->table_info[$i]['Field'].';'."\r\n";
		}
		$str .= '	var $table = '.$this->table.';'."\r\n";
		return $str;
	}
	
	function getFuncFillObject()
	{
		if(count($this->table_info) < 1)
			$this->table_info = $this->getInfo();
		$str = '	function fillObject($date=array())'."\r\n	{\r\n";
		for($i=0,$n=count($this->table_info);$i<$n;$i++)
		{
			if($this->table_info[$i]['Default'] !== NULL)
				$str .= '		$this->'.$this->table_info[$i]['Field'].'	= isset($date["'.$this->table_info[$i]['Field'].'"]) ? $date["'.$this->table_info[$i]['Field'].'"] : \''.$this->table_info[$i]['Default'].'\';'."\r\n";
			else $str .= '		$this->'.$this->table_info[$i]['Field'].'	= isset($date["'.$this->table_info[$i]['Field'].'"]) ? $date["'.$this->table_info[$i]['Field'].'"] : NULL;'."\r\n";
		}
		$str .= "	}\r\n\r\n";
		return $str;
	}
	
	function getFuncSet()
	{
		if(count($this->table_info) < 1)
			$this->table_info = $this->getInfo();
		$str = '';
		for($i=0,$n=count($this->table_info);$i<$n;$i++)
		{
			$str .= '	function set'.$this->_cName($this->table_info[$i]['Field']).'($v)'."\r\n";
			$str .= '	{'."\r\n";
			if($this->_cType($this->table_info[$i]['Type']) == 'int')
				$str .= '		if(!isset($v)) return false;
		$v = (int)$v;
		if($this->'.$this->table_info[$i]['Field'].' !== $v)
		{
			$this->'.$this->table_info[$i]['Field'].' = $v;
			$this->fieldData["'.$this->table_info[$i]['Field'].'"] = $v;
		}'."\r\n";
			else if($this->_cType($this->table_info[$i]['Type']) == 'varchar')
				$str .= '		if(!isset($v)) return false;
		$v = (string)$v;
		if($this->'.$this->table_info[$i]['Field'].' !== $v)
		{
			$this->'.$this->table_info[$i]['Field'].' = $v;
			$this->fieldData["'.$this->table_info[$i]['Field'].'"] = $v;
		}'."\r\n";
			else if($this->_cType($this->table_info[$i]['Type']) == 'text')
				$str .= '		if(!isset($v)) return false;
		$v = (string)$v;
		if($this->'.$this->table_info[$i]['Field'].' !== $v)
		{
			$this->'.$this->table_info[$i]['Field'].' = $v;
			$this->fieldData["'.$this->table_info[$i]['Field'].'"] = $v;
		}'."\r\n";
			else if($this->_cType($this->table_info[$i]['Type']) == 'datetime')
				$str .= '		if(isset($v)) $v = (string)$v;
		else $v = date("Y-m-d H:i:s");
		if($this->'.$this->table_info[$i]['Field'].' !== $v)
		{
			$this->'.$this->table_info[$i]['Field'].' = $v;
			$this->fieldData["'.$this->table_info[$i]['Field'].'"] = $v;
		}'."\r\n";
			else 
				$str .= '		if(!isset($v)) return false;
		$v = (string)$v;
		if($this->'.$this->table_info[$i]['Field'].' !== $v)
		{
			$this->'.$this->table_info[$i]['Field'].' = $v;
			$this->fieldData["'.$this->table_info[$i]['Field'].'"] = $v;
		}'."\r\n";
			$str .= '	}'."\r\n\r\n";
		}
		return $str;
	}
	
	function getFuncGet()
	{
		if(count($this->table_info) < 1)
			$this->table_info = $this->getInfo();
		$str = '';
		for($i=0,$n=count($this->table_info);$i<$n;$i++)
		{
			if($this->_cType($this->table_info[$i]['Type']) == 'datetime')
			{
				$str .= '	function get'.$this->_cName($this->table_info[$i]['Field']).'($fromat="Y-m-d H:i:s")'."\r\n";
				$str .= '	{'."\r\n";
				$str .= '		return date($fromat,strtotime($this->'.$this->table_info[$i]['Field']."));\r\n";
				$str .= '	}'."\r\n\r\n";
			}else{
				$str .= '	function get'.$this->_cName($this->table_info[$i]['Field']).'()'."\r\n";
				$str .= '	{'."\r\n";
				$str .= '		return $this->'.$this->table_info[$i]['Field'].";\r\n";
				$str .= '	}'."\r\n\r\n";
			}
		}
		return $str;
	}
	
	function _cName($name)
	{
		if(!strpos($name,"_")) return ucfirst($name);
		$name = explode("_",$name);
		$str = '';
		foreach($name as $val)
		{
			$str .= ucfirst($val);
		}
		return $str;
	}
	
	function _cType($type)
	{
		$types = explode("(",$type);
		return array_shift($types);
	}
	
	function getOther()
	{
		if(count($this->table_info) < 1)
			$this->table_info = $this->getInfo();

		for($i=0,$n=count($this->table_info);$i<$n;$i++)
		{
			if($this->table_info[$i]['Extra'] == 'auto_increment')
			{
				$str = '	function save()
	{
		if($this->fieldData){
			if($this->'.$this->table_info[$i]['Field'].') return $this->update($this->fieldData,"`'.$this->table_info[$i]['Field'].'` = \'".$this->'.$this->table_info[$i]['Field'].'."\' ",$this->table);
			else return $this->insert($this->fieldData,$this->table);
		}
		return false;
	}
	
	function remove()
	{
		if($this->'.$this->table_info[$i]['Field'].')
			return parent::delete("'.$this->table_info[$i]['Field'].' = \'". $this->'.$this->table_info[$i]['Field'].' ."\'",$this->table);
		return false;
	}
	
	function selectByPk($pk)
	{
		return $this->getDataById($pk,"'.$this->table_info[$i]['Field'].'",$this->table);
	}'."\r\n";
			}	
		}
		return $str;
	}
	
	function getInit()
	{
		$str .= '	function __construct($id=NULL)
	{
		parent::__construct();
		$id && $this->init($id);
	}
		
		';
		$str .= 'function init($id=NULL)
	{
		$id && $this->selectByPk($id);
	}
	
		';
		return $str;
	}
	
	function getFuncToArray()
	{
		$str = '
	function toArray()
	{
		return array(
				';
		for($i=0,$n=count($this->table_info);$i<$n;$i++)
		{
		$str .= '"'.$this->table_info[$i]['Field'].'" => $this->get'.$this->_cName($this->table_info[$i]['Field']).'(),
				';
		}
		$str .= ');
	}
	
';
		return $str;
	}
	
	function createBase()
	{
		$script  = '<?php

/**
 * 类名：数据模型基本类
 * 说明：提供数据模型公用方法。
 * $Id: init-model.php 151 2008-10-20 17:20:26Z meetcd $
 */
 include_once(dirname(__FILE__)."/Model.inc.php");
 class Base'.ucfirst($this->model).' extends Model
 {
 ';
		$script  .= $this->getAttribute();
		$script  .= "\r\n";
		$script  .= '	function setTable($table)
	{
		if($table)
			$this->table = $table;
	}'."\r\n\r\n";
		$script  .= $this->getFuncGet();
		$script  .= $this->getFuncSet();
		$script  .= $this->getFuncFillObject();
		$script  .= $this->getOther();
		$script  .= $this->getFuncToArray();
 		$script  .= '}';
		file_put_contents(DIR_CMS_INCLUDES."/model/Base".ucfirst($this->model).'.inc.php',$script);
 		return $script;
	}
	
	function create()
	{
		if(is_file($this->root."/".ucfirst($this->model).'.model.php')) return false;
		$script  = '<?php
/**
 * 开发人员扩展类
 * $Id: init-model.php 151 2008-10-20 17:20:26Z meetcd $
 */
include_once(DIR_CMS_INCLUDES."/model/Base'.ucfirst($this->model).'.inc.php");
class '.ucfirst($this->model).' extends Base'.ucfirst($this->model).'
{
	';
	$script  .= 'function init($id=\'\')
	{
		$id && $this->selectByPk($id);
	}
	
	function selectAll($addWhere=\'\',$addSql=\'\',$showMax=20)
	{
		$sql = "SELECT * FROM $this->table ";
		$sql .= "WHERE 1 $addWhere ";
		if($addSql)
			$sql .= $addSql;
		else
			$sql .= "ORDER BY id DESC ";
		return $this->getListArray($sql, $showMax);
	}
	
	function getPager($addWhere=\'\',$addSql=\'\',$showMax=20)
	{
		$sql = "SELECT * FROM $this->table ";
		$sql .= "WHERE 1 $addWhere ";
		if($addSql)
			$sql .= $addSql;
		else
			$sql .= "ORDER BY id DESC ";
		return $this->getList($sql, $showMax);
	}
	
	function remove($ids)
	{
		if($ids) return $this->delete("id IN (".$ids.")",$this->table);
		else return false;
	}';
	$script  .= '
}';
		file_put_contents($this->root."/".ucfirst($this->model).'.model.php',$script);
 		return $script;
	}
	
	function generate()
	{
		echo "Create a basic data model...\r\n";
		$this->createBase();
		echo "Create a data model expansion...\r\n";
		$this->create();
		echo "Create a complete data model.\r\n";
	}
}