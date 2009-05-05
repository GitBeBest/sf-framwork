<?php

/**
 * 类名：数据模型基本类
 * 说明：提供数据模型公用方法。
 * $Id: init-model.php 151 2008-10-20 17:20:26Z meetcd $
 */

class BaseOrder_froms extends model
{
  private $id  = '';
  private $subject  = '';
  private $user_id  = '';
  private $user_name  = '';
  private $number  = '';
  private $price  = '';
  private $user_sex  = '';
  private $user_mobile  = '';
  private $user_phone  = '';
  private $user_fax  = '';
  private $user_email  = '';
  private $user_address  = '';
  private $notebook  = '';
  private $is_public  = '';
  private $note  = '';
  private $updated_at  = '';
  public $table = "order_froms";
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

  public function getNumber()
  {
    return $this->number;
  }

  public function getPrice($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->price,0,$len,"utf-8");
    	else return substr($this->price,0,$len);
    }
    return $this->price;
  }

  public function getUserSex($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_sex,0,$len,"utf-8");
    	else return substr($this->user_sex,0,$len);
    }
    return $this->user_sex;
  }

  public function getUserMobile($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_mobile,0,$len,"utf-8");
    	else return substr($this->user_mobile,0,$len);
    }
    return $this->user_mobile;
  }

  public function getUserPhone($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_phone,0,$len,"utf-8");
    	else return substr($this->user_phone,0,$len);
    }
    return $this->user_phone;
  }

  public function getUserFax($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_fax,0,$len,"utf-8");
    	else return substr($this->user_fax,0,$len);
    }
    return $this->user_fax;
  }

  public function getUserEmail($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_email,0,$len,"utf-8");
    	else return substr($this->user_email,0,$len);
    }
    return $this->user_email;
  }

  public function getUserAddress($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_address,0,$len,"utf-8");
    	else return substr($this->user_address,0,$len);
    }
    return $this->user_address;
  }

  public function getNotebook($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->notebook,0,$len,"utf-8");
    	else return substr($this->notebook,0,$len);
    }
    return $this->notebook;
  }

  public function getIsPublic()
  {
    return $this->is_public;
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

  public function setNumber($v)
  {
    if(!isset($v)) return false;
    $v = (int)$v;
    if($this->number !== $v)
    {
      $this->number = $v;
      $this->fieldData["number"] = $v;
    }
  }

  public function setPrice($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->price !== $v)
    {
      $this->price = $v;
      $this->fieldData["price"] = $v;
    }
  }

  public function setUserSex($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->user_sex !== $v)
    {
      $this->user_sex = $v;
      $this->fieldData["user_sex"] = $v;
    }
  }

  public function setUserMobile($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->user_mobile !== $v)
    {
      $this->user_mobile = $v;
      $this->fieldData["user_mobile"] = $v;
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

  public function setUserFax($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->user_fax !== $v)
    {
      $this->user_fax = $v;
      $this->fieldData["user_fax"] = $v;
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

  public function setUserAddress($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->user_address !== $v)
    {
      $this->user_address = $v;
      $this->fieldData["user_address"] = $v;
    }
  }

  public function setNotebook($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->notebook !== $v)
    {
      $this->notebook = $v;
      $this->fieldData["notebook"] = $v;
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
    $sql = "DELETE FROM `order_froms` WHERE $addWhere ";
    $db->query($sql);
    return $db->affected_rows();
  }

  public function toArray()
  {
    return array(
     "id" => $this->getId(),
     "subject" => $this->getSubject(),
     "user_id" => $this->getUserId(),
     "user_name" => $this->getUserName(),
     "number" => $this->getNumber(),
     "price" => $this->getPrice(),
     "user_sex" => $this->getUserSex(),
     "user_mobile" => $this->getUserMobile(),
     "user_phone" => $this->getUserPhone(),
     "user_fax" => $this->getUserFax(),
     "user_email" => $this->getUserEmail(),
     "user_address" => $this->getUserAddress(),
     "notebook" => $this->getNotebook(),
     "is_public" => $this->getIsPublic(),
     "note" => $this->getNote(),
     "updated_at" => $this->getUpdatedAt(),
   );
  }

  public function cleanObject()
  {
    $this->id = '';
    $this->subject = '';
    $this->user_id = '';
    $this->user_name = '';
    $this->number = '';
    $this->price = '';
    $this->user_sex = '';
    $this->user_mobile = '';
    $this->user_phone = '';
    $this->user_fax = '';
    $this->user_email = '';
    $this->user_address = '';
    $this->notebook = '';
    $this->is_public = '';
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
    isset($data["user_id"]) && $this->user_id = $data["user_id"];
    isset($data["user_name"]) && $this->user_name = $data["user_name"];
    isset($data["number"]) && $this->number = $data["number"];
    isset($data["price"]) && $this->price = $data["price"];
    isset($data["user_sex"]) && $this->user_sex = $data["user_sex"];
    isset($data["user_mobile"]) && $this->user_mobile = $data["user_mobile"];
    isset($data["user_phone"]) && $this->user_phone = $data["user_phone"];
    isset($data["user_fax"]) && $this->user_fax = $data["user_fax"];
    isset($data["user_email"]) && $this->user_email = $data["user_email"];
    isset($data["user_address"]) && $this->user_address = $data["user_address"];
    isset($data["notebook"]) && $this->notebook = $data["notebook"];
    isset($data["is_public"]) && $this->is_public = $data["is_public"];
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