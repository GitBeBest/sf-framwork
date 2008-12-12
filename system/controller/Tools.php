<?php

class tools extends controller
{
  function index()
  {
	$tool = sf::getModel("tool");
	$result = $tables =array();
	if($_POST['tables']){
		for($i=0,$n=count($_POST['tables']);$i<$n;$i++)
		{
		  $this->createmodel($_POST['tables'][$i]);
		  $result[] = $_POST['tables'][$i];
		}
	}
	$this->view->set("title","Tools::Select tables!");
	$this->view->set("tables",$tool->showTables());
	$this->view->set("result",$result);
	$this->view->load("tools");
	$this->view->display();
  }
  
  function createmodel($table)
  {
    $tool = sf::getModel("tool");
	$fields = $tool->showFields($table);
    $tools = new tools_model($table,$fields);
    $tools->generate();
  }
  
}

class tools_model
{
  function tools_model($table,$fields)
  {
    $this->table = $table;
    $this->fields = $fields;
    foreach($this->fields as $field)
    {
      if($field->primary_key) 
        $this->primary_key = $field->name;
    }
  }
  
  function getAttribute()
  {
    foreach($this->fields as $field)
    {
      if($field->def !== NULL)
        $str .= '  private $'.$field->name.'  = \''.$field->def.'\';'."\r\n";
      else $str .= '  private $'.$field->name.';'."\r\n";
    }
    $str .= '  public $table = "'.$this->table.'";'."\r\n";
    return $str;
  }
  
  function getFuncSet()
  {
    $str = '';
    foreach($this->fields as $field)
    {
      $str .= '  public function set'.$this->_cName($field->name).'($v)'."\r\n";
      $str .= '  {'."\r\n";
      if($field->type == 'int')
        $str .= '    if(!isset($v)) return false;
    $v = (int)$v;
    if($this->'.$field->name.' !== $v)
    {
      $this->'.$field->name.' = $v;
      $this->fieldData["'.$field->name.'"] = $v;
    }'."\r\n";
      else if($field->type == 'string')
        $str .= '    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->'.$field->name.' !== $v)
    {
      $this->'.$field->name.' = $v;
      $this->fieldData["'.$field->name.'"] = $v;
    }'."\r\n";
      else 
        $str .= '    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->'.$field->name.' !== $v)
    {
      $this->'.$field->name.' = $v;
      $this->fieldData["'.$field->name.'"] = $v;
    }'."\r\n";
      $str .= '  }'."\r\n\r\n";
    }
    return $str;
  }
  
  function getFuncGet()
  {
    foreach($this->fields as $field)
    {
      if($field->type == 'datetime')
      {
        $str .= '  public function get'.$this->_cName($field->name).'($fromat="Y-m-d H:i:s")'."\r\n";
        $str .= '  {'."\r\n";
        $str .= '    if($fromat != "Y-m-d H:i:s") return date($fromat,strtotime($this->'.$field->name."));\r\n";
        $str .= '    else return $this->'.$field->name.";\r\n";
        $str .= '  }'."\r\n\r\n";
      }elseif($field->type == 'int'){
	  	$str .= '  public function get'.$this->_cName($field->name).'()'."\r\n";
        $str .= '  {'."\r\n";
		$str .= '    return $this->'.$field->name.";\r\n";
        $str .= '  }'."\r\n\r\n";
	  }else{
        $str .= '  public function get'.$this->_cName($field->name).'($len=0)'."\r\n";
        $str .= '  {'."\r\n";
		$str .= '    if($len){'."\r\n";
		$str .= '    	if(function_exists("mb_substr")) return mb_substr($this->'.$field->name.',0,$len,"utf-8");'."\r\n";
        $str .= '    	else return substr($this->'.$field->name.',0,$len);'."\r\n";
		$str .= "    }\r\n";
		$str .= '    return $this->'.$field->name.";\r\n";
        $str .= '  }'."\r\n\r\n";
      }
    }
    return $str;
  }
  
  function getFuncSelectAll()
  {
    $str .= '  public function selectAll($addWhere="",$addSql="",$showMax=20)'."\r\n";
    $str .= '  {'."\r\n";
    $str .= '    $sql  = "SELECT * FROM '.$this->table.' ";'."\r\n";
    $str .= '    $sql .= "WHERE 1 ";'."\r\n";
    $str .= '    $addWhere && $sql .= $addWhere;'."\r\n";
    $str .= '    if($addSql) $sql .= $addSql;'."\r\n";
    $str .= '    else $sql .= "ORDER BY `'.$this->primary_key.'` DESC "'."\r\n";
    $str .= '    $this->getListArray($sql,$showMax)'.";\r\n";
    $str .= '  }'."\r\n\r\n";
    return $str;
  }
  
  function getFuncGetPager()
  {
    $str .= '  public function getPager($addWhere="",$addSql="",$showMax=20)'."\r\n";
    $str .= '  {'."\r\n";
    $str .= '    $sql  = "SELECT * FROM '.$this->table.' ";'."\r\n";
    $str .= '    $sql .= "WHERE 1 ";'."\r\n";
    $str .= '    $addWhere && $sql .= $addWhere;'."\r\n";
    $str .= '    if($addSql) $sql .= $addSql;'."\r\n";
    $str .= '    else $sql .= "ORDER BY `'.$this->primary_key.'` DESC "'."\r\n";
    $str .= '    $this->getList($sql,$showMax)'.";\r\n";
    $str .= '  }'."\r\n\r\n";
    return $str;
  }
  
  function getFuncRemove()
  {
    $str .= '  public function remove($ids=0)'."\r\n";
    $str .= '  {'."\r\n";
	$str .= '    $db = sf::getLib("db")'.";\r\n";
	$str .= '    $sql = "DELETE FROM `'.$this->table.'` WHERE `'.$this->primary_key.'` IN (\'$ids\')";'."\r\n";
	$str .= '    $db->query($sql)'.";\r\n";
    $str .= '    return $db->affected_rows()'.";\r\n";
    $str .= '  }'."\r\n\r\n";
    return $str;
  }
  
  function getFuncInit()
  {
    $str .= '  public function __construct($data=\'\')'."\r\n";
    $str .= '  {'."\r\n";
    $str .= '    if(!$data) return false;'."\r\n";
    $str .= '    if(is_array($data))'."\r\n";
    $str .= '      return $this->fillObject($data);'."\r\n";
    $str .= '    else return $this->selectByPk($data);'."\r\n";
    $str .= '  }'."\r\n\r\n";
    return $str;
  }
  
  function getFuncSelectByPk()
  {
    $str .= '  public function selectByPk($pk=\'\')'."\r\n";
    $str .= '  {'."\r\n";
    $str .= '    if(!$pk) return false;'."\r\n";
	$str .= '    $db = sf::getLib("db")'.";\r\n";
    $str .= '    $sql = "SELECT * FROM `$this->table` WHERE `'.$this->primary_key.'` = \'$pk\' ";'."\r\n";
    $str .= '    $query = $db->query($sql);'."\r\n";
    $str .= '    return $this->fillObject($db->fetch_array($query));'."\r\n";
    $str .= '  }'."\r\n\r\n";
    return $str;
  }
  
  function getFuncDelete()
  {
    $str .= '  public function delete()'."\r\n";
    $str .= '  {'."\r\n";
    $str .= '    if(!$this->'.$this->primary_key.') return false;'."\r\n";
    $str .= '    $db = sf::getLib("db")'.";\r\n";
	$str .= '    $db->query("DELETE `$this->table` WHERE `'.$this->primary_key.'` = \'$this->'.$this->primary_key.'\' ");'."\r\n";
    $str .= '    return $db->affected_rows();'."\r\n";
    $str .= '  }'."\r\n\r\n";
    return $str;
  }
  
  function getFuncSave()
  {
    $str .= '  public function save()'."\r\n";
    $str .= '  {'."\r\n";
	$str .= '    $db = sf::getLib("db")'.";\r\n";
    $str .= '    if($this->fieldData){
      if($this->'.$this->primary_key.')
      {
        return $db->update($this->fieldData,"`'.$this->primary_key.'` = \'$this->'.$this->primary_key.'\' ",$this->table); 
      }
      return $db->insert($this->fieldData,$this->table);'."\r\n    }\r\n";
    $str .= '  }'."\r\n\r\n";
    return $str;
  }
  
  function getFuncToArray()
  {
    $str .= '  public function toArray()'."\r\n";
    $str .= '  {'."\r\n";
    $str .= '    return array(
';
    foreach($this->fields as $field)
    {
      $str .= '     "'.$field->name.'" => $this->get'.$this->_cName($field->name).'()'.",\r\n";
    }
    $str .= '   )'.";\r\n";
    $str .= '  }'."\r\n\r\n";
    return $str;
  }
  
  function getFuncFillObject()
  {
    $str .= '  public function fillObject($data=array())'."\r\n";
    $str .= '  {'."\r\n";
	$str .= '    $this->cleanObject();'."\r\n";
    $str .= '    if(!$data) return false;'."\r\n";
    foreach($this->fields as $field)
    {
      $str .= '    isset($data["'.$field->name.'"]) && $this->'.$field->name.' = $data["'.$field->name.'"];'."\r\n";
    }
     $str .= '    return $data;'."\r\n";
    $str .= '  }'."\r\n\r\n";
    return $str;
  }
  
  function getFuncCleanObject()
  {
    $str .= '  public function cleanObject()'."\r\n";
    $str .= '  {'."\r\n";
    foreach($this->fields as $field)
    {
      $str .= '    $this->'.$field->name.' = \''.$field->def.'\';'."\r\n";
    }
    $str .= '    $this->fieldData = array();'."\r\n";
	$str .= '    return $this;'."\r\n";
    $str .= '  }'."\r\n\r\n";
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
  
  function createBase()
  {
    $script  = '<?php

/**
 * 类名：数据模型基本类
 * 说明：提供数据模型公用方法。
 * $Id: init-model.php 151 2008-10-20 17:20:26Z meetcd $
 */

class Base'.ucfirst($this->table).' extends model
{
';
    $script  .= $this->getAttribute();
    $script  .= "\r\n";
    $script  .= '  public function setTable($table)
  {
    if($table)
      $this->table = $table;
  }'."\r\n\r\n";
    $script  .= $this->getFuncGet();
    $script  .= $this->getFuncSet();
    $script  .= $this->getFuncSave();
    $script  .= $this->getFuncRemove();
    $script  .= $this->getFuncToArray();
	$script  .= $this->getFuncCleanObject();
    $script  .= $this->getFuncFillObject();
    $script  .= $this->getFuncInit();
    $script  .= $this->getFuncSelectByPk();
	$script  .= $this->getFuncDelete();
    $script  .= '}';
    file_put_contents(APPPATH."model/Base".ucfirst($this->table).'.php',$script);
    return $script;
  }
  
  function createExt()
  {
    $file = APPPATH."model/".ucfirst($this->table).'.php';
    if(is_file($file)) return;
    $script  = '<?php

/**
 * 类名：数据模型扩展类
 * 说明：提供数据模型扩展方法。
 * $Id: init-model.php 151 2008-10-20 17:20:26Z meetcd $
 */

include_once("Base'.ucfirst($this->table).'.php");
class '.ucfirst($this->table).' extends Base'.ucfirst($this->table).'
{
  ';
    //$script  .= $this->getFuncSelectAll();
    //$script  .= $this->getFuncGetPager();
    //$script  .= $this->getFuncRemove();
    $script  .= "\r\n";
    $script  .= '}';
    file_put_contents(APPPATH."model/".ucfirst($this->table).'.model.php',$script);
    return $script;
  }
  
  function generate()
  {
    $this->createBase();
    $this->createExt();
  }
}
?>