<?php

/**
 * 类名：数据模型扩展类
 * 说明：提供数据模型扩展方法。
 * $Id: init-model.php 151 2008-10-20 17:20:26Z meetcd $
 */

include_once("BaseCategory.php");
class Categorypeer extends BaseCategory
{
	function save()
	{
		$result = parent::save();
		$this->rebuildTree();
		return $result;
	}
	
	function selectAllForDropdown($addWhere='',$addSql='',$showMax=200,$filed="id")
	{
		$result = $this->selectAll($addWhere,$addSql,$showMax);
		$options = array('0'=>"--Select--");
		$result_a = $result->toArray();
		foreach($result_a as $row)
			$options[$row[$filed]] = $row["head_str"].$row["subject"];		
		return $options;
	}
	
	/**
   * 取得格式化后的数据
   * 可以构造成带分层信息的分类信息
   * $Pidwei 为父类id，$stopid为停止的id，$one_grade为是否只遍历一层
   *
   */
  function getFormatList( $pid = 0)
  {
    $this->category_type && $this->db->where("type",$this->category_type);
    $this->db->order_by("orders ASC");
		$query = $this->db->get($this->table);
    $result = $query->result_array();
    foreach($result as $row)
    {
			$num = count($tmpData[$row['parent_id']]);
			$tmpData[$row['parent_id']][$num] = $row;
    }
    if (count($tmpData) == 0)
      return;
    $showData = array();
    $this->getFormatList_c($tmpData, $showData, $pid, '',1);
    return $showData;
  }

  /**
   * 取得格式化后的数据，内部递归调用函数。
   *
   */
  function getFormatList_c(&$tmpData, &$showData, $pid, $headstr = '', $level = 1, $left = 1)
  {
    $num = count($tmpData[$pid]);
    $i = 0;

    if(!is_array($tmpData[$pid]))
      return false;

    foreach ($tmpData[$pid] as $key => $val)
    {
      $id     = $val['id'];
      $tmplen = count($showData);
      $showData[$tmplen] = $val;
      $showData[$tmplen]['left'] = $left;
      $right = $left + 1;

      if (!empty($headstr))
        $showData[$tmplen]['HeadStr'] = $headstr;

      if ($i == $num-1)
      {
        $showData[$tmplen]['HeadStr'] .= '└';
        $headstr_1 =  $headstr."&nbsp;&nbsp;";
        $level_1   =  $level + 1;
      }
      else
      {
        $showData[$tmplen]['HeadStr'] .= '├';
        $headstr_1 = $headstr.'│';
        $level_1   =  $level + 1;
      }
      $showData[$tmplen]['level'] = $level;
      $i++;

      if ((count($tmpData[$id]) > 0))
        $right = $this->getFormatList_c($tmpData, $showData, $id, $headstr_1, $level_1, $right);
            
      $showData[$tmplen]['right'] = $right;
      $left = $right + 1;
    }
    return $right + 1;
  }

  /**
   * 重新生成树
   */
  function rebuildTree()
  {
    $data = $this->getFormatList();
    for ($i = 0, $n = count($data); $i < $n; $i++ )
    {
      $result = array("left"=>$data[$i]['left'],
                     "right"=>$data[$i]['right'],
                     "head_str"=>$data[$i]['HeadStr'],
                     "level"=>$data[$i]['level']);
      $this->db->where("id",$data[$i]['id']);
      $this->db->update($this->table,$result);
    }
  }
	
	/**
	 * 根据pid显示分类
	 */
	function selectAllByParentId($pid)
	{
		if(!$pid) return false;
		$addWhere = " `parent_id` = '".$pid."'";
		return $this->selectAll($addWhere);
	}
	
	function selectIdsByParentId($pid)
	{
		if(!$pid) return false;
		$addWhere = "`parent_id` = '".$pid."'";
		$data = $this->selectAll($addWhere);
		for($i=0,$n=count($data);$i<$n;$i++){
			$result[] = $data[$i]['id'];
		}
		$result[] = $pid;
		return implode(",",$result);
	}
	
	/**
	 * 取得子分类
	 */
	function selectSonTree($id)
	{
		if(!$node = $this->selectNode($id)) return false;
		$addWhere = "`left` BETWEEN '".$node['left']."' AND '".$node['right']."' ";
		return $this->selectAll($addWhere);
	}
	
	/**
	 * 取得一条记录
	 */
	function selectNode($id)
	{
		if(!(int)$id) return false;
		return $this->selectByPk($id);
	}

	/**
	 * 取得需要删除的分类的id
	 */
	function selectDelIds($id)
	{
		$data = $this->selectSonTree($id);
		$data = $data->toArray();
		for($i=0,$n=count($data);$i<$n;$i++){
			$result[] = $data[$i]['id'];
		}
		return implode(",",$result);
	}
	
	/**
	 * 取得上级导航
	 */
	function selectNav($id)
	{
		$node = $this->selectNode($id);
		if(!$node) return false;
		$addWhere = $addSql='';
		$addWhere .= "`left` <= '".$node['left']."' AND `right` >= '".$node['right']."' ";
		if($this->category_type)
			$addWhere .= " AND `type` = '".$this->category_type."' ";
		$addSql .= "ORDER BY `right` DESC ";
		return $this->selectAll($addWhere,$addSql);
	}
	
	/**
	 * 取得上级分类
	 */
	function selectParentById($id,$type = '')
	{
		if(empty($id)) return false;
		if($result = $this->selectNav($id)) $data = array_pop($result);
		else return false;
		if($type) return $data[$type];
		else return $data;
     }
	 
	 function selectAll($addWhere="type = 'country'",$orderBy='',$showMax=20,$fields='')
	 {
	 	!$orderBy && $orderBy = "`left` ASC";
		return parent::selectAll($addWhere,$orderBy,$showMax,$fields);
	 } 
	 
	 function getPager($addWhere="type = 'country'",$orderBy='',$showMax=20,$fields='')
	 {
	 	!$orderBy && $orderBy = "`left` ASC";
		return parent::getPager($addWhere,$orderBy,$showMax,$fields);
	 }
}