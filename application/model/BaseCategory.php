<?php

/**
 * 类名：数据模型基本类
 * 说明：提供数据模型公用方法。
 * $Id: init-model.php 151 2008-10-20 17:20:26Z meetcd $
 */

class BaseCategory extends model
{
  private $id  = '';
  private $subject  = '';
  private $left  = '';
  private $right  = '';
  private $note  = '';
  public $table = "category";

  public function setTable($table)
  {
    if($table)
      $this->table = $table;
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

  public function getLeft()
  {
    return $this->left;
  }

  public function getRight()
  {
    return $this->right;
  }

  public function getNote($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->note,0,$len,"utf-8");
    	else return substr($this->note,0,$len);
    }
    return $this->note;
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
    $sql = "DELETE FROM `category` WHERE `id` IN ('$ids')";
    $db->query($sql);
    return $db->affected_rows();
  }

  public function toArray()
  {
    return array(
     "id" => $this->getId(),
     "subject" => $this->getSubject(),
     "left" => $this->getLeft(),
     "right" => $this->getRight(),
     "note" => $this->getNote(),
   );
  }

  public function cleanObject()
  {
    $this->id = '';
    $this->subject = '';
    $this->left = '';
    $this->right = '';
    $this->note = '';
    $this->fieldData = array();
    return $this;
  }

  public function fillObject($data=array())
  {
    $this->cleanObject();
    if(!$data) return false;
    isset($data["id"]) && $this->id = $data["id"];
    isset($data["subject"]) && $this->subject = $data["subject"];
    isset($data["left"]) && $this->left = $data["left"];
    isset($data["right"]) && $this->right = $data["right"];
    isset($data["note"]) && $this->note = $data["note"];
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