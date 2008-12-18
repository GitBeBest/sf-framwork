<?php
class db{

	private $version = '';
	private $querynum = 0;
	private $link;
	
	public function __construct()
	{
		$this->connect(config::get("mysql.hostname"),config::get("mysql.user"),config::get("mysql.passwd"),config::get("mysql.database"));
	}
	
	public function connect($dbhost, $dbuser, $dbpw, $dbname = '', $pconnect = 0, $charset = 'utf8')
	{
		try{
			$func = empty($pconnect) ? 'mysql_connect' : 'mysql_pconnect';
			if(!$this->link = @$func($dbhost, $dbuser, $dbpw, 1)) {
				throw new sfException(lang::get("Can not connect to MySQL server!"));
			} else {
				if($this->version() > '4.1') {
					$dbcharset = $charset ? $charset : 'utf8';
					$serverset = $dbcharset ? 'character_set_connection='.$dbcharset.', character_set_results='.$dbcharset.', character_set_client=binary' : '';
					$serverset .= $this->version() > '5.0.1' ? ((empty($serverset) ? '' : ',').'sql_mode=\'\'') : '';
					$serverset && mysql_query("SET $serverset", $this->link);
				}
				$dbname && @mysql_select_db($dbname, $this->link);
			}
		}catch(sfException $e){
			$e->halt();
		}

	}

	public function select_db($dbname) {
		return mysql_select_db($dbname, $this->link);
	}

	public function fetch_array($query, $result_type = MYSQL_ASSOC) {
		return mysql_fetch_array($query, $result_type);
	}
	
	public function result_array($query, $result_type = MYSQL_ASSOC) {
		while($row = mysql_fetch_array($query, $result_type))
			$result[] = $row;
		return $result;
	}

	public function fetch_first($sql) {
		return $this->fetch_array($this->query($sql));
	}

	public function result_first($sql) {
		return $this->result($this->query($sql), 0);
	}

	public function query($sql, $type = '')
	{
		try{
			$func = $type == 'UNBUFFERED' && @function_exists('mysql_unbuffered_query') ?
				'mysql_unbuffered_query' : 'mysql_query';
			if(!$query = $func($sql, $this->link)) throw new sfException(lang::get($this->error()));
			$this->querynum++;
			return $query;
		}catch(sfException $e){
			$e->halt();
		}
	}

	public function affected_rows() {
		return mysql_affected_rows($this->link);
	}

	public function error() {
		return (($this->link) ? mysql_error($this->link) : mysql_error());
	}

	public function errno() {
		return intval(($this->link) ? mysql_errno($this->link) : mysql_errno());
	}

	public function result($query, $row = 0) {
		$query = @mysql_result($query, $row);
		return $query;
	}

	public function num_rows($query) {
		$query = mysql_num_rows($query);
		return $query;
	}

	public function num_fields($query) {
		return mysql_num_fields($query);
	}

	public function free_result($query) {
		return mysql_free_result($query);
	}

	public function insert_id() {
		return ($id = mysql_insert_id($this->link)) >= 0 ? $id : $this->result($this->query("SELECT last_insert_id()"), 0);
	}

	public function fetch_row($query) {
		$query = mysql_fetch_row($query);
		return $query;
	}

	public function fetch_fields($query) {
		return mysql_fetch_field($query);
	}

	public function version() {
		if(empty($this->version)) {
			$this->version = mysql_get_server_info($this->link);
		}
		return $this->version;
	}

	public function close() {
		return mysql_close($this->link);
	}

	public function halt($message = '', $sql = '') {
		exit($message .":".$sql);
	}
	
	public function createSql($data=array(),$table='',$type="insert",$where='')
	{
		if(!$data) return false;
		$set = array();
		foreach((array)$data as $key => $val) $set[] = "`$key` = '$val'";
		if($type == 'insert'){
			return "INSERT INTO `$table` SET ".implode(",",$set);
		}elseif($type == 'update'){
			return "UPDATE `$table` SET ".implode(",",$set)." WHERE $where ";
		}else return false;
	}
	
	public function insert($data,$table)
	{
		if($sql = $this->createSql($data,$table))
		{
			$this->query($sql);
			return $this->insert_id();
		}
		return false;
	}
	
	public function update($data,$where,$table)
	{
		if($sql = $this->createSql($data,$table,"update",$where))
		{
			$this->query($sql);
			return $this->affected_rows();
		}
		return false;
	}
	
}