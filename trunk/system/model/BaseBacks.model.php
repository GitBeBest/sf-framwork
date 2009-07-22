<?php

/**
 * 类名：数据模型基本类
 * 说明：提供数据模型公用方法。
 * $Id$
 */

class BaseBacks extends model
{
  private $id  = '';
  private $subject  = '';
  private $user_name  = '';
  private $user_sex  = '';
  private $user_age  = '';
  private $user_degree  = '';
  private $idcard  = '';
  private $user_phone  = '';
  private $user_im  = '';
  private $user_email  = '';
  private $user_address  = '';
  private $post_code  = '';
  private $work_at  = '';
  private $study_list  = '';
  private $work_list  = '';
  private $note  = '';
  private $updated_at  = '';
  public $table = "backs";
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

  public function getUserName($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_name,0,$len,"utf-8");
    	else return substr($this->user_name,0,$len);
    }
    return $this->user_name;
  }

  public function getUserSex($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_sex,0,$len,"utf-8");
    	else return substr($this->user_sex,0,$len);
    }
    return $this->user_sex;
  }

  public function getUserAge($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_age,0,$len,"utf-8");
    	else return substr($this->user_age,0,$len);
    }
    return $this->user_age;
  }

  public function getUserDegree($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_degree,0,$len,"utf-8");
    	else return substr($this->user_degree,0,$len);
    }
    return $this->user_degree;
  }

  public function getIdcard($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->idcard,0,$len,"utf-8");
    	else return substr($this->idcard,0,$len);
    }
    return $this->idcard;
  }

  public function getUserPhone($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_phone,0,$len,"utf-8");
    	else return substr($this->user_phone,0,$len);
    }
    return $this->user_phone;
  }

  public function getUserIm($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->user_im,0,$len,"utf-8");
    	else return substr($this->user_im,0,$len);
    }
    return $this->user_im;
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

  public function getPostCode()
  {
    return $this->post_code;
  }

  public function getWorkAt($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->work_at,0,$len,"utf-8");
    	else return substr($this->work_at,0,$len);
    }
    return $this->work_at;
  }

  public function getStudyList($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->study_list,0,$len,"utf-8");
    	else return substr($this->study_list,0,$len);
    }
    return $this->study_list;
  }

  public function getWorkList($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->work_list,0,$len,"utf-8");
    	else return substr($this->work_list,0,$len);
    }
    return $this->work_list;
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

  public function setUserAge($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->user_age !== $v)
    {
      $this->user_age = $v;
      $this->fieldData["user_age"] = $v;
    }
  }

  public function setUserDegree($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->user_degree !== $v)
    {
      $this->user_degree = $v;
      $this->fieldData["user_degree"] = $v;
    }
  }

  public function setIdcard($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->idcard !== $v)
    {
      $this->idcard = $v;
      $this->fieldData["idcard"] = $v;
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

  public function setUserIm($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->user_im !== $v)
    {
      $this->user_im = $v;
      $this->fieldData["user_im"] = $v;
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

  public function setPostCode($v)
  {
    if(!isset($v)) return false;
    $v = (int)$v;
    if($this->post_code !== $v)
    {
      $this->post_code = $v;
      $this->fieldData["post_code"] = $v;
    }
  }

  public function setWorkAt($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->work_at !== $v)
    {
      $this->work_at = $v;
      $this->fieldData["work_at"] = $v;
    }
  }

  public function setStudyList($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->study_list !== $v)
    {
      $this->study_list = $v;
      $this->fieldData["study_list"] = $v;
    }
  }

  public function setWorkList($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->work_list !== $v)
    {
      $this->work_list = $v;
      $this->fieldData["work_list"] = $v;
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
    $sql = "DELETE FROM `backs` WHERE $addWhere ";
    $db->query($sql);
    return $db->affected_rows();
  }

  public function toArray()
  {
    return array(
     "id" => $this->getId(),
     "subject" => $this->getSubject(),
     "user_name" => $this->getUserName(),
     "user_sex" => $this->getUserSex(),
     "user_age" => $this->getUserAge(),
     "user_degree" => $this->getUserDegree(),
     "idcard" => $this->getIdcard(),
     "user_phone" => $this->getUserPhone(),
     "user_im" => $this->getUserIm(),
     "user_email" => $this->getUserEmail(),
     "user_address" => $this->getUserAddress(),
     "post_code" => $this->getPostCode(),
     "work_at" => $this->getWorkAt(),
     "study_list" => $this->getStudyList(),
     "work_list" => $this->getWorkList(),
     "note" => $this->getNote(),
     "updated_at" => $this->getUpdatedAt(),
   );
  }

  public function cleanObject()
  {
    $this->id = '';
    $this->subject = '';
    $this->user_name = '';
    $this->user_sex = '';
    $this->user_age = '';
    $this->user_degree = '';
    $this->idcard = '';
    $this->user_phone = '';
    $this->user_im = '';
    $this->user_email = '';
    $this->user_address = '';
    $this->post_code = '';
    $this->work_at = '';
    $this->study_list = '';
    $this->work_list = '';
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
    isset($data["user_name"]) && $this->user_name = $data["user_name"];
    isset($data["user_sex"]) && $this->user_sex = $data["user_sex"];
    isset($data["user_age"]) && $this->user_age = $data["user_age"];
    isset($data["user_degree"]) && $this->user_degree = $data["user_degree"];
    isset($data["idcard"]) && $this->idcard = $data["idcard"];
    isset($data["user_phone"]) && $this->user_phone = $data["user_phone"];
    isset($data["user_im"]) && $this->user_im = $data["user_im"];
    isset($data["user_email"]) && $this->user_email = $data["user_email"];
    isset($data["user_address"]) && $this->user_address = $data["user_address"];
    isset($data["post_code"]) && $this->post_code = $data["post_code"];
    isset($data["work_at"]) && $this->work_at = $data["work_at"];
    isset($data["study_list"]) && $this->study_list = $data["study_list"];
    isset($data["work_list"]) && $this->work_list = $data["work_list"];
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