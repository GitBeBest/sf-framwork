<?php

/**
 * 类名：数据模型基本类
 * 说明：提供数据模型公用方法。
 * $Id: init-model.php 151 2008-10-20 17:20:26Z meetcd $
 */

class BaseManagers extends model
{
  private $id  = '';
  private $user_group_id  = '';
  private $user_name  = '';
  private $user_username  = '';
  private $user_password  = '';
  private $login_num  = '';
  private $lastlogin_at  = '';
  private $created_at  = '';
  private $updated_at  = '';
  private $user_ip  = '';
  private $user_email  = '';
  private $first_question  = '';
  private $first_answer  = '';
  private $second_question  = '';
  private $second_answer  = '';
  private $is_lock  = '';
  public $table = "managers";
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

  public function getUserGroupId()
  {
    return $this->user_group_id;
  }

  public function getUserName($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_name,0,$len,"utf-8");
    	else return substr($this->user_name,0,$len);
    }
    return $this->user_name;
  }

  public function getUserUsername($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_username,0,$len,"utf-8");
    	else return substr($this->user_username,0,$len);
    }
    return $this->user_username;
  }

  public function getUserPassword($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_password,0,$len,"utf-8");
    	else return substr($this->user_password,0,$len);
    }
    return $this->user_password;
  }

  public function getLoginNum()
  {
    return $this->login_num;
  }

  public function getLastloginAt($fromat="Y-m-d H:i:s")
  {
    if($fromat != "Y-m-d H:i:s") return date($fromat,strtotime($this->lastlogin_at));
    else return $this->lastlogin_at;
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

  public function getUserIp($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_ip,0,$len,"utf-8");
    	else return substr($this->user_ip,0,$len);
    }
    return $this->user_ip;
  }

  public function getUserEmail($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_email,0,$len,"utf-8");
    	else return substr($this->user_email,0,$len);
    }
    return $this->user_email;
  }

  public function getFirstQuestion($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->first_question,0,$len,"utf-8");
    	else return substr($this->first_question,0,$len);
    }
    return $this->first_question;
  }

  public function getFirstAnswer($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->first_answer,0,$len,"utf-8");
    	else return substr($this->first_answer,0,$len);
    }
    return $this->first_answer;
  }

  public function getSecondQuestion($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->second_question,0,$len,"utf-8");
    	else return substr($this->second_question,0,$len);
    }
    return $this->second_question;
  }

  public function getSecondAnswer($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->second_answer,0,$len,"utf-8");
    	else return substr($this->second_answer,0,$len);
    }
    return $this->second_answer;
  }

  public function getIsLock()
  {
    return $this->is_lock;
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

  public function setUserGroupId($v)
  {
    if(!isset($v)) return false;
    $v = (int)$v;
    if($this->user_group_id !== $v)
    {
      $this->user_group_id = $v;
      $this->fieldData["user_group_id"] = $v;
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

  public function setLastloginAt($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->lastlogin_at !== $v)
    {
      $this->lastlogin_at = $v;
      $this->fieldData["lastlogin_at"] = $v;
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

  public function setFirstQuestion($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->first_question !== $v)
    {
      $this->first_question = $v;
      $this->fieldData["first_question"] = $v;
    }
  }

  public function setFirstAnswer($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->first_answer !== $v)
    {
      $this->first_answer = $v;
      $this->fieldData["first_answer"] = $v;
    }
  }

  public function setSecondQuestion($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->second_question !== $v)
    {
      $this->second_question = $v;
      $this->fieldData["second_question"] = $v;
    }
  }

  public function setSecondAnswer($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->second_answer !== $v)
    {
      $this->second_answer = $v;
      $this->fieldData["second_answer"] = $v;
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
    $sql = "DELETE FROM `managers` WHERE $addWhere ";
    $db->query($sql);
    return $db->affected_rows();
  }

  public function toArray()
  {
    return array(
     "id" => $this->getId(),
     "user_group_id" => $this->getUserGroupId(),
     "user_name" => $this->getUserName(),
     "user_username" => $this->getUserUsername(),
     "user_password" => $this->getUserPassword(),
     "login_num" => $this->getLoginNum(),
     "lastlogin_at" => $this->getLastloginAt(),
     "created_at" => $this->getCreatedAt(),
     "updated_at" => $this->getUpdatedAt(),
     "user_ip" => $this->getUserIp(),
     "user_email" => $this->getUserEmail(),
     "first_question" => $this->getFirstQuestion(),
     "first_answer" => $this->getFirstAnswer(),
     "second_question" => $this->getSecondQuestion(),
     "second_answer" => $this->getSecondAnswer(),
     "is_lock" => $this->getIsLock(),
   );
  }

  public function cleanObject()
  {
    $this->id = '';
    $this->user_group_id = '';
    $this->user_name = '';
    $this->user_username = '';
    $this->user_password = '';
    $this->login_num = '';
    $this->lastlogin_at = '';
    $this->created_at = '';
    $this->updated_at = '';
    $this->user_ip = '';
    $this->user_email = '';
    $this->first_question = '';
    $this->first_answer = '';
    $this->second_question = '';
    $this->second_answer = '';
    $this->is_lock = '';
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
    isset($data["user_group_id"]) && $this->user_group_id = $data["user_group_id"];
    isset($data["user_name"]) && $this->user_name = $data["user_name"];
    isset($data["user_username"]) && $this->user_username = $data["user_username"];
    isset($data["user_password"]) && $this->user_password = $data["user_password"];
    isset($data["login_num"]) && $this->login_num = $data["login_num"];
    isset($data["lastlogin_at"]) && $this->lastlogin_at = $data["lastlogin_at"];
    isset($data["created_at"]) && $this->created_at = $data["created_at"];
    isset($data["updated_at"]) && $this->updated_at = $data["updated_at"];
    isset($data["user_ip"]) && $this->user_ip = $data["user_ip"];
    isset($data["user_email"]) && $this->user_email = $data["user_email"];
    isset($data["first_question"]) && $this->first_question = $data["first_question"];
    isset($data["first_answer"]) && $this->first_answer = $data["first_answer"];
    isset($data["second_question"]) && $this->second_question = $data["second_question"];
    isset($data["second_answer"]) && $this->second_answer = $data["second_answer"];
    isset($data["is_lock"]) && $this->is_lock = $data["is_lock"];
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