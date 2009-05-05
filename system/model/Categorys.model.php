<?php

/**
 * 类名：数据模型扩展类
 * 说明：提供数据模型扩展方法。
 * $Id$
 */

loader::model("BaseCategorys");
class Categorys extends BaseCategorys
{
	private $category_type = 'default';
	
	public function __construct($data='',$type='default')
  	{
    	$type && $this->category_type = $type;
    	parent::__construct($data);
  	}
	
	function selectAll($addWhere='',$orderBy='',$showMax=0,$fields='')
	 {
	 	!$orderBy && $orderBy = 'ORDER BY `left` ASC,orders asc';
		if($addWhere) $addWhere .= " AND `type` = '".$this->category_type."' ";
		else $addWhere .= "`type` = '".$this->category_type."' ";
		return parent::selectAll($addWhere,$orderBy,$showMax,$fields);
	 } 
	 
	 function getPager($addWhere='',$orderBy='',$showMax=20,$fields='')
	 {
	 	!$orderBy && $orderBy = 'ORDER BY `left` ASC,orders ASC';
		if($addWhere) $addWhere .= " AND `type` = '".$this->category_type."' ";
		else $addWhere .= "`type` = '".$this->category_type."' ";
		return parent::getPager($addWhere,$orderBy,$showMax,$fields);
	 }
	 
	 function rebuildTree()
	 {
		$data = $this->getFormatList();
		$db = sf::getLib("db");
		for ($i = 0, $n = count($data); $i < $n; $i++ )
		{
		  	$result = array("left"=>$data[$i]['left'],
						 	"right"=>$data[$i]['right'],
						 	"head_str"=>$data[$i]['HeadStr'],
						 	"level"=>$data[$i]['level']);
		  	$db->update($result,"id = '".$data[$i]['id']."'",$this->table);
		}
	 }
	 
	 function save()
	 {
		 $result = parent::save();
		 $this->rebuildTree();
		 return $result;
	 }
	 
	 function getFormatList($pid = 0)
	 {
		$result = $this->selectAll("`type` = '".$this->category_type."' ",'ORDER BY `orders` ASC')->toArray();
		foreach((array)$result as $row){
			$num = count($tmpData[$row['parent_id']]);
			$tmpData[$row['parent_id']][$num] = $row;
		}
		if (count($tmpData) == 0) return;
		$showData = array();
		$this->getFormatList_c($tmpData, $showData, $pid, '',1);
		return $showData;
	 }
	 
	 function getFormatList_c(&$tmpData, &$showData, $pid, $headstr = '', $level = 1, $left = 1)
	 {
		$num = count($tmpData[$pid]);
		$i = 0;
		if(!is_array($tmpData[$pid])) return false;
		foreach ($tmpData[$pid] as $key => $val)
		{
		  	$id     = $val['id'];
		  	$tmplen = count($showData);
		  	$showData[$tmplen] = $val;
		  	$showData[$tmplen]['left'] = $left;
		  	$right = $left + 1;
	
		  	if (!empty($headstr)) $showData[$tmplen]['HeadStr'] = $headstr;
	
		  	if ($i == $num-1){
				$showData[$tmplen]['HeadStr'] .= '└';
				$headstr_1 =  $headstr."&nbsp;&nbsp;";
				$level_1   =  $level + 1;
		  	}else{
				$showData[$tmplen]['HeadStr'] .= '├';
				$headstr_1 = $headstr.'│';
				$level_1   =  $level + 1;
		  	}
		  	$showData[$tmplen]['level'] = $level;
		  	$i++;
	
		  	if ((count($tmpData[$id]) > 0)) $right = $this->getFormatList_c($tmpData, $showData, $id, $headstr_1, $level_1, $right);
				
		  	$showData[$tmplen]['right'] = $right;
		  	$left = $right + 1;
		}
		return $right + 1;
	 }
	 
	 function remove()
	 {
		 $result = $this->selectSonTree($this);
		 while($object = $result->getObject()){
			 $object->delete();
		 }
		 return $this->delete();
	 }
	 
	 function selectSonTree($object)
	 {
		 if(!is_object($object)){
			$this->selectByPk((int)$object);
			$object = & $this;
		}
		 return $this->selectAll('`left` > '.$object->getLeft().' AND `left` <'.$object->getRight(),'ORDER BY `left` ASC');
	 }
}