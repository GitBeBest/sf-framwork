<?php

/**
 * 类名：数据模型基本类
 * 说明：提供数据模型公用方法。
 * $Id$
 */

class BaseCategorys extends model
{
  private $id  = '';
  private $subject  = '';
  private $type  = '';
  private $head_str  = '';
  private $level  = '';
  private $parent_id  = '';
  private $left  = '';
  private $right  = '';
  private $orders  = '';
  private $note  = '';
  private $cover  = '';
  private $is_home  = '';
  private $updated_at  = '';
  public $table = "categorys";
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

  public function getSubject($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->subject,0,$len,"utf-8");
    	else return substr($this->subject,0,$len);
    }
    return $this->subject;
  }

  public function getType($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->type,0,$len,"utf-8");
    	else return substr($this->type,0,$len);
    }
    return $this->type;
  }

  public function getHeadStr($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->head_str,0,$len,"utf-8");
    	else return substr($this->head_str,0,$len);
    }
    return $this->head_str;
  }

  public function getLevel()
  {
    return $this->level;
  }

  public function getParentId()
  {
    return $this->parent_id;
  }

  public function getLeft()
  {
    return $this->left;
  }

  public function getRight()
  {
    return $this->right;
  }

  public function getOrders()
  {
    return $this->orders;
  }

  public function getNote($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->note,0,$len,"utf-8");
    	else return substr($this->note,0,$len);
    }
    return $this->note;
  }

  public function getCover($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->cover,0,$len,"utf-8");
    	else return substr($this->cover,0,$len);
    }
    return $this->cover;
  }

  public function getIsHome()
  {
    return $this->is_home;
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

  public function setSubject($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->subject !== $v)
    {
      $this->subject = $v;
      $this->fieldData["subject"] = $v;
    }
  }

  public function setType($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->type !== $v)
    {
      $this->type = $v;
      $this->fieldData["type"] = $v;
    }
  }

  public function setHeadStr($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->head_str !== $v)
    {
      $this->head_str = $v;
      $this->fieldData["head_str"] = $v;
    }
  }

  public function setLevel($v)
  {
    if(!isset($v)) return false;
    $v = (int)$v;
    if($this->level !== $v)
    {
      $this->level = $v;
      $this->fieldData["level"] = $v;
    }
  }

  public function setParentId($v)
  {
    if(!isset($v)) return false;
    $v = (int)$v;
    if($this->parent_id !== $v)
    {
      $this->parent_id = $v;
      $this->fieldData["parent_id"] = $v;
    }
  }

  public function setLeft($v)
  {
    if(!isset($v)) return false;
    $v = (int)$v;
    if($this->left !== $v)
    {
      $this->left = $v;
      $this->fieldData["left"] = $v;
    }
  }

  public function setRight($v)
  {
    if(!isset($v)) return false;
    $v = (int)$v;
    if($this->right !== $v)
    {
      $this->right = $v;
      $this->fieldData["right"] = $v;
    }
  }

  public function setOrders($v)
  {
    if(!isset($v)) return false;
    $v = (int)$v;
    if($this->orders !== $v)
    {
      $this->orders = $v;
      $this->fieldData["orders"] = $v;
    }
  }

  public function setNote($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->note !== $v)
    {
      $this->note = $v;
      $this->fieldData["note"] = $v;
    }
  }

  public function setCover($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->cover !== $v)
    {
      $this->cover = $v;
      $this->fieldData["cover"] = $v;
    }
  }

  public function setIsHome($v)
  {
    if(!isset($v)) return false;
    $v = (int)$v;
    if($this->is_home !== $v)
    {
      $this->is_home = $v;
      $this->fieldData["is_home"] = $v;
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
    $sql = "DELETE FROM `categorys` WHERE $addWhere ";
    $db->query($sql);
    return $db->affected_rows();
  }

  public function toArray()
  {
    return array(
     "id" => $this->getId(),
     "subject" => $this->getSubject(),
     "type" => $this->getType(),
     "head_str" => $this->getHeadStr(),
     "level" => $this->getLevel(),
     "parent_id" => $this->getParentId(),
     "left" => $this->getLeft(),
     "right" => $this->getRight(),
     "orders" => $this->getOrders(),
     "note" => $this->getNote(),
     "cover" => $this->getCover(),
     "is_home" => $this->getIsHome(),
     "updated_at" => $this->getUpdatedAt(),
   );
  }

  public function cleanObject()
  {
    $this->id = '';
    $this->subject = '';
    $this->type = '';
    $this->head_str = '';
    $this->level = '';
    $this->parent_id = '';
    $this->left = '';
    $this->right = '';
    $this->orders = '';
    $this->note = '';
    $this->cover = '';
    $this->is_home = '';
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
    isset($data["subject"]) && $this->subject = $data["subject"];
    isset($data["type"]) && $this->type = $data["type"];
    isset($data["head_str"]) && $this->head_str = $data["head_str"];
    isset($data["level"]) && $this->level = $data["level"];
    isset($data["parent_id"]) && $this->parent_id = $data["parent_id"];
    isset($data["left"]) && $this->left = $data["left"];
    isset($data["right"]) && $this->right = $data["right"];
    isset($data["orders"]) && $this->orders = $data["orders"];
    isset($data["note"]) && $this->note = $data["note"];
    isset($data["cover"]) && $this->cover = $data["cover"];
    isset($data["is_home"]) && $this->is_home = $data["is_home"];
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