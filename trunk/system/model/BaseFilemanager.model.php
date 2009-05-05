<?php

/**
 * 类名：数据模型基本类
 * 说明：提供数据模型公用方法。
 * $Id: init-model.php 151 2008-10-20 17:20:26Z meetcd $
 */

class BaseFilemanager extends model
{
  private $id  = '';
  private $item_id  = '';
  private $item_type  = '';
  private $file_name  = '';
  private $file_savename  = '';
  private $file_path  = '';
  private $file_size  = '';
  private $file_ext  = '';
  private $file_minetype  = '';
  private $created_at  = '';
  private $file_note  = '';
  private $user_id  = '';
  private $user_name  = '';
  private $authorization  = '';
  private $used  = '';
  public $table = "filemanager";
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

  public function getFileName($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->file_name,0,$len,"utf-8");
    	else return substr($this->file_name,0,$len);
    }
    return $this->file_name;
  }

  public function getFileSavename($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->file_savename,0,$len,"utf-8");
    	else return substr($this->file_savename,0,$len);
    }
    return $this->file_savename;
  }

  public function getFilePath($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->file_path,0,$len,"utf-8");
    	else return substr($this->file_path,0,$len);
    }
    return $this->file_path;
  }

  public function getFileSize($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->file_size,0,$len,"utf-8");
    	else return substr($this->file_size,0,$len);
    }
    return $this->file_size;
  }

  public function getFileExt($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->file_ext,0,$len,"utf-8");
    	else return substr($this->file_ext,0,$len);
    }
    return $this->file_ext;
  }

  public function getFileMinetype($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->file_minetype,0,$len,"utf-8");
    	else return substr($this->file_minetype,0,$len);
    }
    return $this->file_minetype;
  }

  public function getCreatedAt($fromat="Y-m-d H:i:s")
  {
    if($fromat != "Y-m-d H:i:s") return date($fromat,strtotime($this->created_at));
    else return $this->created_at;
  }

  public function getFileNote($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->file_note,0,$len,"utf-8");
    	else return substr($this->file_note,0,$len);
    }
    return $this->file_note;
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

  public function getAuthorization($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->authorization,0,$len,"utf-8");
    	else return substr($this->authorization,0,$len);
    }
    return $this->authorization;
  }

  public function getUsed()
  {
    return $this->used;
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

  public function setFileName($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->file_name !== $v)
    {
      $this->file_name = $v;
      $this->fieldData["file_name"] = $v;
    }
  }

  public function setFileSavename($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->file_savename !== $v)
    {
      $this->file_savename = $v;
      $this->fieldData["file_savename"] = $v;
    }
  }

  public function setFilePath($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->file_path !== $v)
    {
      $this->file_path = $v;
      $this->fieldData["file_path"] = $v;
    }
  }

  public function setFileSize($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->file_size !== $v)
    {
      $this->file_size = $v;
      $this->fieldData["file_size"] = $v;
    }
  }

  public function setFileExt($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->file_ext !== $v)
    {
      $this->file_ext = $v;
      $this->fieldData["file_ext"] = $v;
    }
  }

  public function setFileMinetype($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->file_minetype !== $v)
    {
      $this->file_minetype = $v;
      $this->fieldData["file_minetype"] = $v;
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

  public function setFileNote($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->file_note !== $v)
    {
      $this->file_note = $v;
      $this->fieldData["file_note"] = $v;
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

  public function setAuthorization($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->authorization !== $v)
    {
      $this->authorization = $v;
      $this->fieldData["authorization"] = $v;
    }
  }

  public function setUsed($v)
  {
    if(!isset($v)) return false;
    $v = (int)$v;
    if($this->used !== $v)
    {
      $this->used = $v;
      $this->fieldData["used"] = $v;
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
    $sql = "DELETE FROM `filemanager` WHERE $addWhere ";
    $db->query($sql);
    return $db->affected_rows();
  }

  public function toArray()
  {
    return array(
     "id" => $this->getId(),
     "item_id" => $this->getItemId(),
     "item_type" => $this->getItemType(),
     "file_name" => $this->getFileName(),
     "file_savename" => $this->getFileSavename(),
     "file_path" => $this->getFilePath(),
     "file_size" => $this->getFileSize(),
     "file_ext" => $this->getFileExt(),
     "file_minetype" => $this->getFileMinetype(),
     "created_at" => $this->getCreatedAt(),
     "file_note" => $this->getFileNote(),
     "user_id" => $this->getUserId(),
     "user_name" => $this->getUserName(),
     "authorization" => $this->getAuthorization(),
     "used" => $this->getUsed(),
   );
  }

  public function cleanObject()
  {
    $this->id = '';
    $this->item_id = '';
    $this->item_type = '';
    $this->file_name = '';
    $this->file_savename = '';
    $this->file_path = '';
    $this->file_size = '';
    $this->file_ext = '';
    $this->file_minetype = '';
    $this->created_at = '';
    $this->file_note = '';
    $this->user_id = '';
    $this->user_name = '';
    $this->authorization = '';
    $this->used = '';
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
    isset($data["item_id"]) && $this->item_id = $data["item_id"];
    isset($data["item_type"]) && $this->item_type = $data["item_type"];
    isset($data["file_name"]) && $this->file_name = $data["file_name"];
    isset($data["file_savename"]) && $this->file_savename = $data["file_savename"];
    isset($data["file_path"]) && $this->file_path = $data["file_path"];
    isset($data["file_size"]) && $this->file_size = $data["file_size"];
    isset($data["file_ext"]) && $this->file_ext = $data["file_ext"];
    isset($data["file_minetype"]) && $this->file_minetype = $data["file_minetype"];
    isset($data["created_at"]) && $this->created_at = $data["created_at"];
    isset($data["file_note"]) && $this->file_note = $data["file_note"];
    isset($data["user_id"]) && $this->user_id = $data["user_id"];
    isset($data["user_name"]) && $this->user_name = $data["user_name"];
    isset($data["authorization"]) && $this->authorization = $data["authorization"];
    isset($data["used"]) && $this->used = $data["used"];
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