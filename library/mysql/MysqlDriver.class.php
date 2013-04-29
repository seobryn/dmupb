<?php

class MysqlDriver {

	private $connection;
	private $result;

	public function __construct() {
		$this->connection = null;
		$this->result = null;
	}

	public function __destruct() {

	}

	public function openConnection() {
			$this->connection = mysql_connect(HOST_DBMYSQL, USER_DBMYSQL, PASSWORD_DBMYSQL)
			or die('ERROR: Cannot connect Data Base');
			mysql_select_db(NAME_DBMYSQL, $this->connection)
			or die('ERROR: Cannot select database Data Base');
			return mysql_query("SET NAMES 'UTF8'", $this->connection);
	}

	public function closeConnection() {
			if ($this->result != null) {
				mysql_free_result($this->result);
			}
			return mysql_close($this->connection);
	}

	public function getResult($select) {
		$this->result = mysql_query($select, $this->connection)
		or die('ERROR: Select');
		if (mysql_num_rows($this->result) > 0) {
			return $this->result;
		} else {
			return false;
		}
	}

	public function Insert($sql) {
		if (mysql_query($sql, $this->connection)) {
			$id = mysql_insert_id($this->connection);
			return $id;
		} else {
			return false;
		}
	}

	public function Query($sql) {
		return mysql_query($sql, $this->connection);
	}

}

?>