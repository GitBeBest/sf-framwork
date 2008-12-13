<?php

/**
 * 类名：数据模型基本类
 * 说明：提供数据模型公用方法。
 * $Id: init-model.php 151 2008-10-20 17:20:26Z meetcd $
 */

class BaseUsers extends model
{
  private $id  = '';
  private $user_name  = '';
  private $user_email  = '';
  private $user_password  = '';
  private $is_active  = '';
  public $table = "users";

  public function setTable($table)
  {
    if($table)
      $this->table = $table;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getUserName($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_name,0,$len,"utf-8");
    	else return substr($this->user_name,0,$len);
    }
    return $this->user_name;
  }

  public function getUserEmail($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_email,0,$len,"utf-8");
    	else return substr($this->user_email,0,$len);
    }
    return $this->user_email;
  }

  public function getUserPassword($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_password,0,$len,"utf-8");
    	else return substr($this->user_password,0,$len);
    }
    return $this->user_password;
  }

  public function getIsActive()
  {
    return $this->is_active;
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

  public function setUserName($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->user_name !== $v)
    {
      $this->user_name = $v;
      $this->fieldData["user_name"] = $v;
    }
  }

  public function setUserEmail($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->user_email !== $v)
    {
      $this->user_email = $v;
      $this->fieldData["user_email"] = $v;
    }
  }

  public function setUserPassword($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->user_password !== $v)
    {
      $this->user_password = $v;
      $this->fieldData["user_password"] = $v;
    }
  }

  public function setIsActive($v)
  {
    if(!isset($v)) return false;
    $v = (int)$v;
    if($this->is_active !== $v)
    {
      $this->is_active = $v;
      $this->fieldData["is_active"] = $v;
    }
  }

  public function save()
  {
    $db = sf::getLib("db");
    if($this->fieldData){
      if($this->id)
      {
        return $db->update($this->fieldData,"`id` = '$this->id' ",$this->table); 
      }
      return $db->insert($this->fieldData,$this->table);
    }
  }

  public function remove($ids=0)
  {
    $db = sf::getLib("db");
    $sql = "DELETE FROM `users` WHERE `id` IN ('$ids')";
    $db->query($sql);
    return $db->affected_rows();
  }

  public function toArray()
  {
    return array(
     "id" => $this->getId(),
     "user_name" => $this->getUserName(),
     "user_email" => $this->getUserEmail(),
     "user_password" => $this->getUserPassword(),
     "is_active" => $this->getIsActive(),
   );
  }

  public function cleanObject()
  {
    $this->id = '';
    $this->user_name = '';
    $this->user_email = '';
    $this->user_password = '';
    $this->is_active = '';
    $this->fieldData = array();
    return $this;
  }

  public function fillObject($data=array())
  {
    $this->cleanObject();
    if(!$data) return false;
    isset($data["id"]) && $this->id = $data["id"];
    isset($data["user_name"]) && $this->user_name = $data["user_name"];
    isset($data["user_email"]) && $this->user_email = $data["user_email"];
    isset($data["user_password"]) && $this->user_password = $data["user_password"];
    isset($data["is_active"]) && $this->is_active = $data["is_active"];
    return $data;
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
    return $this->fillObject($db->fetch_array($query));
  }

  public function delete()
  {
    if(!$this->id) return false;
    $db = sf::getLib("db");
    $db->query("DELETE `$this->table` WHERE `id` = '$this->id' ");
    return $db->affected_rows();
  }

}