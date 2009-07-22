<?php

/**
 * 类名：数据模型基本类
 * 说明：提供数据模型公用方法。
 * $Id$
 */

class BaseBooks extends model
{
  private $id  = '';
  private $user_name  = '';
  private $user_phone  = '';
  private $user_qq  = '';
  private $user_email  = '';
  private $content  = '';
  private $write_back  = '';
  private $is_public  = '';
  private $updated_at  = '';
  public $table = "books";
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

  public function getUserName($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_name,0,$len,"utf-8");
    	else return substr($this->user_name,0,$len);
    }
    return $this->user_name;
  }

  public function getUserPhone($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_phone,0,$len,"utf-8");
    	else return substr($this->user_phone,0,$len);
    }
    return $this->user_phone;
  }

  public function getUserQq($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_qq,0,$len,"utf-8");
    	else return substr($this->user_qq,0,$len);
    }
    return $this->user_qq;
  }

  public function getUserEmail($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_email,0,$len,"utf-8");
    	else return substr($this->user_email,0,$len);
    }
    return $this->user_email;
  }

  public function getContent($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->content,0,$len,"utf-8");
    	else return substr($this->content,0,$len);
    }
    return $this->content;
  }

  public function getWriteBack($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->write_back,0,$len,"utf-8");
    	else return substr($this->write_back,0,$len);
    }
    return $this->write_back;
  }

  public function getIsPublic()
  {
    return $this->is_public;
  }

  public function getUpdatedAt($fromat="Y-m-d H:i:s")
  {
    if($fromat != "Y-m-d H:i:s") return date($fromat,strtotime($this->updated_at));
    else return $this->updated_at;
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

  public function setUserPhone($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->user_phone !== $v)
    {
      $this->user_phone = $v;
      $this->fieldData["user_phone"] = $v;
    }
  }

  public function setUserQq($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->user_qq !== $v)
    {
      $this->user_qq = $v;
      $this->fieldData["user_qq"] = $v;
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

  public function setContent($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->content !== $v)
    {
      $this->content = $v;
      $this->fieldData["content"] = $v;
    }
  }

  public function setWriteBack($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->write_back !== $v)
    {
      $this->write_back = $v;
      $this->fieldData["write_back"] = $v;
    }
  }

  public function setIsPublic($v)
  {
    if(!isset($v)) return false;
    $v = (int)$v;
    if($this->is_public !== $v)
    {
      $this->is_public = $v;
      $this->fieldData["is_public"] = $v;
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
    $sql = "DELETE FROM `books` WHERE $addWhere ";
    $db->query($sql);
    return $db->affected_rows();
  }

  public function toArray()
  {
    return array(
     "id" => $this->getId(),
     "user_name" => $this->getUserName(),
     "user_phone" => $this->getUserPhone(),
     "user_qq" => $this->getUserQq(),
     "user_email" => $this->getUserEmail(),
     "content" => $this->getContent(),
     "write_back" => $this->getWriteBack(),
     "is_public" => $this->getIsPublic(),
     "updated_at" => $this->getUpdatedAt(),
   );
  }

  public function cleanObject()
  {
    $this->id = '';
    $this->user_name = '';
    $this->user_phone = '';
    $this->user_qq = '';
    $this->user_email = '';
    $this->content = '';
    $this->write_back = '';
    $this->is_public = '';
    $this->updated_at = '';
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
    isset($data["user_name"]) && $this->user_name = $data["user_name"];
    isset($data["user_phone"]) && $this->user_phone = $data["user_phone"];
    isset($data["user_qq"]) && $this->user_qq = $data["user_qq"];
    isset($data["user_email"]) && $this->user_email = $data["user_email"];
    isset($data["content"]) && $this->content = $data["content"];
    isset($data["write_back"]) && $this->write_back = $data["write_back"];
    isset($data["is_public"]) && $this->is_public = $data["is_public"];
    isset($data["updated_at"]) && $this->updated_at = $data["updated_at"];
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