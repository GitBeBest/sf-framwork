<?php

/**
 * 类名：数据模型基本类
 * 说明：提供数据模型公用方法。
 * $Id: init-model.php 151 2008-10-20 17:20:26Z meetcd $
 */

class BaseComment extends model
{
  private $id  = '';
  private $item_id  = '';
  private $item_type  = '';
  private $content  = '';
  private $user_id  = '';
  private $user_name  = '';
  private $created_at  = '';
  public $table = "comment";

  public function setTable($table)
  {
    if($table)
      $this->table = $table;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getItemId()
  {
    return $this->item_id;
  }

  public function getItemType($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->item_type,0,$len,"utf-8");
    	else return substr($this->item_type,0,$len);
    }
    return $this->item_type;
  }

  public function getContent($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->content,0,$len,"utf-8");
    	else return substr($this->content,0,$len);
    }
    return $this->content;
  }

  public function getUserId()
  {
    return $this->user_id;
  }

  public function getUserName($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_name,0,$len,"utf-8");
    	else return substr($this->user_name,0,$len);
    }
    return $this->user_name;
  }

  public function getCreatedAt($fromat="Y-m-d H:i:s")
  {
    if($fromat != "Y-m-d H:i:s") return date($fromat,strtotime($this->created_at));
    else return $this->created_at;
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

  public function setItemId($v)
  {
    if(!isset($v)) return false;
    $v = (int)$v;
    if($this->item_id !== $v)
    {
      $this->item_id = $v;
      $this->fieldData["item_id"] = $v;
    }
  }

  public function setItemType($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->item_type !== $v)
    {
      $this->item_type = $v;
      $this->fieldData["item_type"] = $v;
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

  public function setUserId($v)
  {
    if(!isset($v)) return false;
    $v = (int)$v;
    if($this->user_id !== $v)
    {
      $this->user_id = $v;
      $this->fieldData["user_id"] = $v;
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
    $sql = "DELETE FROM `comment` WHERE `id` IN ('$ids')";
    $db->query($sql);
    return $db->affected_rows();
  }

  public function toArray()
  {
    return array(
     "id" => $this->getId(),
     "item_id" => $this->getItemId(),
     "item_type" => $this->getItemType(),
     "content" => $this->getContent(),
     "user_id" => $this->getUserId(),
     "user_name" => $this->getUserName(),
     "created_at" => $this->getCreatedAt(),
   );
  }

  public function cleanObject()
  {
    $this->id = '';
    $this->item_id = '';
    $this->item_type = '';
    $this->content = '';
    $this->user_id = '';
    $this->user_name = '';
    $this->created_at = '';
    $this->fieldData = array();
    return $this;
  }

  public function fillObject($data=array())
  {
    $this->cleanObject();
    if(!$data) return false;
    isset($data["id"]) && $this->id = $data["id"];
    isset($data["item_id"]) && $this->item_id = $data["item_id"];
    isset($data["item_type"]) && $this->item_type = $data["item_type"];
    isset($data["content"]) && $this->content = $data["content"];
    isset($data["user_id"]) && $this->user_id = $data["user_id"];
    isset($data["user_name"]) && $this->user_name = $data["user_name"];
    isset($data["created_at"]) && $this->created_at = $data["created_at"];
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