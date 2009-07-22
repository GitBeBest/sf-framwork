<?php

/**
 * 类名：数据模型基本类
 * 说明：提供数据模型公用方法。
 * $Id$
 */

class BaseJobs extends model
{
  private $id  = '';
  private $subject  = '';
  private $guerdon  = '';
  private $department  = '';
  private $age  = '';
  private $number  = '';
  private $work_address  = '';
  private $degree  = '';
  private $content  = '';
  private $linkman  = '';
  private $linkman_phone  = '';
  private $linkman_email  = '';
  private $linkman_im  = '';
  private $address  = '';
  private $updated_at  = '';
  public $table = "jobs";
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

  public function getGuerdon($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->guerdon,0,$len,"utf-8");
    	else return substr($this->guerdon,0,$len);
    }
    return $this->guerdon;
  }

  public function getDepartment($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->department,0,$len,"utf-8");
    	else return substr($this->department,0,$len);
    }
    return $this->department;
  }

  public function getAge($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->age,0,$len,"utf-8");
    	else return substr($this->age,0,$len);
    }
    return $this->age;
  }

  public function getNumber()
  {
    return $this->number;
  }

  public function getWorkAddress($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->work_address,0,$len,"utf-8");
    	else return substr($this->work_address,0,$len);
    }
    return $this->work_address;
  }

  public function getDegree($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->degree,0,$len,"utf-8");
    	else return substr($this->degree,0,$len);
    }
    return $this->degree;
  }

  public function getContent($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->content,0,$len,"utf-8");
    	else return substr($this->content,0,$len);
    }
    return $this->content;
  }

  public function getLinkman($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->linkman,0,$len,"utf-8");
    	else return substr($this->linkman,0,$len);
    }
    return $this->linkman;
  }

  public function getLinkmanPhone($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->linkman_phone,0,$len,"utf-8");
    	else return substr($this->linkman_phone,0,$len);
    }
    return $this->linkman_phone;
  }

  public function getLinkmanEmail($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->linkman_email,0,$len,"utf-8");
    	else return substr($this->linkman_email,0,$len);
    }
    return $this->linkman_email;
  }

  public function getLinkmanIm($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->linkman_im,0,$len,"utf-8");
    	else return substr($this->linkman_im,0,$len);
    }
    return $this->linkman_im;
  }

  public function getAddress($len=0)
  {
    if($len){
    	if(function_exists("mb_substr")) return mb_substr($this->address,0,$len,"utf-8");
    	else return substr($this->address,0,$len);
    }
    return $this->address;
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

  public function setGuerdon($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->guerdon !== $v)
    {
      $this->guerdon = $v;
      $this->fieldData["guerdon"] = $v;
    }
  }

  public function setDepartment($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->department !== $v)
    {
      $this->department = $v;
      $this->fieldData["department"] = $v;
    }
  }

  public function setAge($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->age !== $v)
    {
      $this->age = $v;
      $this->fieldData["age"] = $v;
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

  public function setWorkAddress($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->work_address !== $v)
    {
      $this->work_address = $v;
      $this->fieldData["work_address"] = $v;
    }
  }

  public function setDegree($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->degree !== $v)
    {
      $this->degree = $v;
      $this->fieldData["degree"] = $v;
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

  public function setLinkman($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->linkman !== $v)
    {
      $this->linkman = $v;
      $this->fieldData["linkman"] = $v;
    }
  }

  public function setLinkmanPhone($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->linkman_phone !== $v)
    {
      $this->linkman_phone = $v;
      $this->fieldData["linkman_phone"] = $v;
    }
  }

  public function setLinkmanEmail($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->linkman_email !== $v)
    {
      $this->linkman_email = $v;
      $this->fieldData["linkman_email"] = $v;
    }
  }

  public function setLinkmanIm($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->linkman_im !== $v)
    {
      $this->linkman_im = $v;
      $this->fieldData["linkman_im"] = $v;
    }
  }

  public function setAddress($v)
  {
    if(!isset($v)) return false;
    $v = (string)$v;
    if($this->address !== $v)
    {
      $this->address = $v;
      $this->fieldData["address"] = $v;
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
    $sql = "DELETE FROM `jobs` WHERE $addWhere ";
    $db->query($sql);
    return $db->affected_rows();
  }

  public function toArray()
  {
    return array(
     "id" => $this->getId(),
     "subject" => $this->getSubject(),
     "guerdon" => $this->getGuerdon(),
     "department" => $this->getDepartment(),
     "age" => $this->getAge(),
     "number" => $this->getNumber(),
     "work_address" => $this->getWorkAddress(),
     "degree" => $this->getDegree(),
     "content" => $this->getContent(),
     "linkman" => $this->getLinkman(),
     "linkman_phone" => $this->getLinkmanPhone(),
     "linkman_email" => $this->getLinkmanEmail(),
     "linkman_im" => $this->getLinkmanIm(),
     "address" => $this->getAddress(),
     "updated_at" => $this->getUpdatedAt(),
   );
  }

  public function cleanObject()
  {
    $this->id = '';
    $this->subject = '';
    $this->guerdon = '';
    $this->department = '';
    $this->age = '';
    $this->number = '';
    $this->work_address = '';
    $this->degree = '';
    $this->content = '';
    $this->linkman = '';
    $this->linkman_phone = '';
    $this->linkman_email = '';
    $this->linkman_im = '';
    $this->address = '';
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
    isset($data["guerdon"]) && $this->guerdon = $data["guerdon"];
    isset($data["department"]) && $this->department = $data["department"];
    isset($data["age"]) && $this->age = $data["age"];
    isset($data["number"]) && $this->number = $data["number"];
    isset($data["work_address"]) && $this->work_address = $data["work_address"];
    isset($data["degree"]) && $this->degree = $data["degree"];
    isset($data["content"]) && $this->content = $data["content"];
    isset($data["linkman"]) && $this->linkman = $data["linkman"];
    isset($data["linkman_phone"]) && $this->linkman_phone = $data["linkman_phone"];
    isset($data["linkman_email"]) && $this->linkman_email = $data["linkman_email"];
    isset($data["linkman_im"]) && $this->linkman_im = $data["linkman_im"];
    isset($data["address"]) && $this->address = $data["address"];
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