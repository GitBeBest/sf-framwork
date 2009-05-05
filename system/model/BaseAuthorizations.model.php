<?php

/**
 * 类名：数据模型基本类
 * 说明：提供数据模型公用方法。
 * $Id: init-model.php 151 2008-10-20 17:20:26Z meetcd $
 */

class BaseAuthorizations extends model
{
  private $id  = '';
  private $controller  = '';
  private $controller_name  = '';
  private $method  = '';
  private $user_group_ids  = '';
  public $table = "authorizations";
  private $is_new = true;

  public function setTable($table)
  {
    if($table)
      $this->table = $table;
  }

  public function isNew()
  {
    return $this->is_new;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getController($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->controller,0,$len,"utf-8");
    	else return substr($this->controller,0,$len);
    }
    return $this->controller;
  }

  public function getControllerName($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->controller_name,0,$len,"utf-8");
    	else return substr($this->controller_name,0,$len);
    }
    return $this->controller_name;
  }

  public function getMethod($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->method,0,$len,"utf-8");
    	else return substr($this->method,0,$len);
    }
    return $this->method;
  }

  public function getUserGroupIds($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_group_ids,0,$len,"utf-8");
    	else return substr($this->user_group_ids,0,$len);
    }
    return $this->user_group_ids;
  }

  public function setId($v)
  {
    if(!isset($v)) return false;
    $v = (int)$v;
    if($this->id !== $v)
    {
      $this->id = $v;
      $this->fieldData["id"] = $v;
    }
  }

  public function setController($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->controller !== $v)
    {
      $this->controller = $v;
      $this->fieldData["controller"] = $v;
    }
  }

  public function setControllerName($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->controller_name !== $v)
    {
      $this->controller_name = $v;
      $this->fieldData["controller_name"] = $v;
    }
  }

  public function setMethod($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->method !== $v)
    {
      $this->method = $v;
      $this->fieldData["method"] = $v;
    }
  }

  public function setUserGroupIds($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->user_group_ids !== $v)
    {
      $this->user_group_ids = $v;
      $this->fieldData["user_group_ids"] = $v;
    }
  }

  public function save()
  {
    $db = sf::getLib("db");
    if($this->fieldData){
      if(!$this->is_new)
      {
        return $db->update($this->fieldData,"`id` = '$this->id' ",$this->table); 
      }
      return $db->insert($this->fieldData,$this->table);
    }
  }

  public function remove($addWhere = '')
  {
    if(!$addWhere) return false;
    $db = sf::getLib("db");
    $sql = "DELETE FROM `authorizations` WHERE $addWhere ";
    $db->query($sql);
    return $db->affected_rows();
  }

  public function toArray()
  {
    return array(
     "id" => $this->getId(),
     "controller" => $this->getController(),
     "controller_name" => $this->getControllerName(),
     "method" => $this->getMethod(),
     "user_group_ids" => $this->getUserGroupIds(),
   );
  }

  public function cleanObject()
  {
    $this->id = '';
    $this->controller = '';
    $this->controller_name = '';
    $this->method = '';
    $this->user_group_ids = '';
    $this->fieldData = array();
    $this->is_new = true;
    return $this;
  }

  public function fillObject($data=array())
  {
    $this->cleanObject();
    if(!$data) return $this;
    if($data["is_new"]) $this->is_new = true;
    else $this->is_new = false;
    isset($data["id"]) && $this->id = $data["id"];
    isset($data["controller"]) && $this->controller = $data["controller"];
    isset($data["controller_name"]) && $this->controller_name = $data["controller_name"];
    isset($data["method"]) && $this->method = $data["method"];
    isset($data["user_group_ids"]) && $this->user_group_ids = $data["user_group_ids"];
    return $this;
  }

  public function __construct($data='')
  {
    if(!$data) return false;
    if(is_array($data))
      return $this->fillObject($data);
    else return $this->selectByPk($data);
  }

  public function selectByPk($pk='')
  {
    if(!$pk) return false;
    $db = sf::getLib("db");
    $sql = "SELECT * FROM `$this->table` WHERE `id` = '$pk' ";
    $query = $db->query($sql);
    if($db->num_rows($query)) $this->fillObject($db->fetch_array($query));
    else return $this;
  }

  public function delete($where="")
  {
    if(!$this->id) return false;
    $db = sf::getLib("db");
    $db->query("DELETE FROM `$this->table` WHERE `id` = '$this->id' $where ");
    return $db->affected_rows();
  }

}