<?php

/**
 * 类名：数据模型基本类
 * 说明：提供数据模型公用方法。
 * $Id$
 */

class BaseTemplates extends model
{
  private $id  = '';
  private $subject  = '';
  private $type_str  = '';
  private $brief  = '';
  private $content  = '';
  private $cover  = '';
  private $func  = '';
  private $note  = '';
  private $updated_at  = '';
  public $table = "templates";
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

  public function getTypeStr($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->type_str,0,$len,"utf-8");
    	else return substr($this->type_str,0,$len);
    }
    return $this->type_str;
  }

  public function getBrief($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->brief,0,$len,"utf-8");
    	else return substr($this->brief,0,$len);
    }
    return $this->brief;
  }

  public function getContent($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->content,0,$len,"utf-8");
    	else return substr($this->content,0,$len);
    }
    return $this->content;
  }

  public function getCover($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->cover,0,$len,"utf-8");
    	else return substr($this->cover,0,$len);
    }
    return $this->cover;
  }

  public function getFunc($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->func,0,$len,"utf-8");
    	else return substr($this->func,0,$len);
    }
    return $this->func;
  }

  public function getNote($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->note,0,$len,"utf-8");
    	else return substr($this->note,0,$len);
    }
    return $this->note;
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

  public function setTypeStr($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->type_str !== $v)
    {
      $this->type_str = $v;
      $this->fieldData["type_str"] = $v;
    }
  }

  public function setBrief($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->brief !== $v)
    {
      $this->brief = $v;
      $this->fieldData["brief"] = $v;
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

  public function setFunc($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->func !== $v)
    {
      $this->func = $v;
      $this->fieldData["func"] = $v;
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
    $sql = "DELETE FROM `templates` WHERE $addWhere ";
    $db->query($sql);
    return $db->affected_rows();
  }

  public function toArray()
  {
    return array(
     "id" => $this->getId(),
     "subject" => $this->getSubject(),
     "type_str" => $this->getTypeStr(),
     "brief" => $this->getBrief(),
     "content" => $this->getContent(),
     "cover" => $this->getCover(),
     "func" => $this->getFunc(),
     "note" => $this->getNote(),
     "updated_at" => $this->getUpdatedAt(),
   );
  }

  public function cleanObject()
  {
    $this->id = '';
    $this->subject = '';
    $this->type_str = '';
    $this->brief = '';
    $this->content = '';
    $this->cover = '';
    $this->func = '';
    $this->note = '';
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
    isset($data["type_str"]) && $this->type_str = $data["type_str"];
    isset($data["brief"]) && $this->brief = $data["brief"];
    isset($data["content"]) && $this->content = $data["content"];
    isset($data["cover"]) && $this->cover = $data["cover"];
    isset($data["func"]) && $this->func = $data["func"];
    isset($data["note"]) && $this->note = $data["note"];
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