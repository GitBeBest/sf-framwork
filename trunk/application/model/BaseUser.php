<?php

/**
 * 类名：数据模型基本类
 * 说明：提供数据模型公用方法。
 * $Id: init-model.php 151 2008-10-20 17:20:26Z meetcd $
 */

class BaseUser extends model
{
  private $id  = '';
  private $user_name  = '';
  private $user_password  = '';
  private $user_username  = '';
  private $user_duty  = '';
  private $user_group_id  = '';
  private $is_lock  = '';
  private $created_at  = '';
  private $updated_at  = '';
  private $login_num  = '';
  private $user_ip  = '';
  public $table = "user";

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

  public function getUserPassword($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_password,0,$len,"utf-8");
    	else return substr($this->user_password,0,$len);
    }
    return $this->user_password;
  }

  public function getUserUsername($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_username,0,$len,"utf-8");
    	else return substr($this->user_username,0,$len);
    }
    return $this->user_username;
  }

  public function getUserDuty($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_duty,0,$len,"utf-8");
    	else return substr($this->user_duty,0,$len);
    }
    return $this->user_duty;
  }

  public function getUserGroupId($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_group_id,0,$len,"utf-8");
    	else return substr($this->user_group_id,0,$len);
    }
    return $this->user_group_id;
  }

  public function getIsLock()
  {
    return $this->is_lock;
  }

  public function getCreatedAt($fromat="Y-m-d H:i:s")
  {
    if($fromat != "Y-m-d H:i:s") return date($fromat,strtotime($this->created_at));
    else return $this->created_at;
  }

  public function getUpdatedAt($fromat="Y-m-d H:i:s")
  {
    if($fromat != "Y-m-d H:i:s") return date($fromat,strtotime($this->updated_at));
    else return $this->updated_at;
  }

  public function getLoginNum()
  {
    return $this->login_num;
  }

  public function getUserIp($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_ip,0,$len,"utf-8");
    	else return substr($this->user_ip,0,$len);
    }
    return $this->user_ip;
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

  public function setUserUsername($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->user_username !== $v)
    {
      $this->user_username = $v;
      $this->fieldData["user_username"] = $v;
    }
  }

  public function setUserDuty($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->user_duty !== $v)
    {
      $this->user_duty = $v;
      $this->fieldData["user_duty"] = $v;
    }
  }

  public function setUserGroupId($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->user_group_id !== $v)
    {
      $this->user_group_id = $v;
      $this->fieldData["user_group_id"] = $v;
    }
  }

  public function setIsLock($v)
  {
    if(!isset($v)) return false;
    $v = (int)$v;
    if($this->is_lock !== $v)
    {
      $this->is_lock = $v;
      $this->fieldData["is_lock"] = $v;
    }
  }

  public function setCreatedAt($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->created_at !== $v)
    {
      $this->created_at = $v;
      $this->fieldData["created_at"] = $v;
    }
  }

  public function setUpdatedAt($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->updated_at !== $v)
    {
      $this->updated_at = $v;
      $this->fieldData["updated_at"] = $v;
    }
  }

  public function setLoginNum($v)
  {
    if(!isset($v)) return false;
    $v = (int)$v;
    if($this->login_num !== $v)
    {
      $this->login_num = $v;
      $this->fieldData["login_num"] = $v;
    }
  }

  public function setUserIp($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->user_ip !== $v)
    {
      $this->user_ip = $v;
      $this->fieldData["user_ip"] = $v;
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
    $sql = "DELETE FROM `user` WHERE `id` IN ('$ids')";
    $db->query($sql);
    return $db->affected_rows();
  }

  public function toArray()
  {
    return array(
     "id" => $this->getId(),
     "user_name" => $this->getUserName(),
     "user_password" => $this->getUserPassword(),
     "user_username" => $this->getUserUsername(),
     "user_duty" => $this->getUserDuty(),
     "user_group_id" => $this->getUserGroupId(),
     "is_lock" => $this->getIsLock(),
     "created_at" => $this->getCreatedAt(),
     "updated_at" => $this->getUpdatedAt(),
     "login_num" => $this->getLoginNum(),
     "user_ip" => $this->getUserIp(),
   );
  }

  public function cleanObject()
  {
    $this->id = '';
    $this->user_name = '';
    $this->user_password = '';
    $this->user_username = '';
    $this->user_duty = '';
    $this->user_group_id = '';
    $this->is_lock = '';
    $this->created_at = '';
    $this->updated_at = '';
    $this->login_num = '';
    $this->user_ip = '';
    $this->fieldData = array();
    return $this;
  }

  public function fillObject($data=array())
  {
    $this->cleanObject();
    if(!$data) return false;
    isset($data["id"]) && $this->id = $data["id"];
    isset($data["user_name"]) && $this->user_name = $data["user_name"];
    isset($data["user_password"]) && $this->user_password = $data["user_password"];
    isset($data["user_username"]) && $this->user_username = $data["user_username"];
    isset($data["user_duty"]) && $this->user_duty = $data["user_duty"];
    isset($data["user_group_id"]) && $this->user_group_id = $data["user_group_id"];
    isset($data["is_lock"]) && $this->is_lock = $data["is_lock"];
    isset($data["created_at"]) && $this->created_at = $data["created_at"];
    isset($data["updated_at"]) && $this->updated_at = $data["updated_at"];
    isset($data["login_num"]) && $this->login_num = $data["login_num"];
    isset($data["user_ip"]) && $this->user_ip = $data["user_ip"];
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
    $db->query("DELETE FROM `$this->table` WHERE `id` = '$this->id' ");
    return $db->affected_rows();
  }

}