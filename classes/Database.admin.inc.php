<?php
	
	define("DB_HOST",$dbhost);
	define("DB_NAME",$dbname);
	define("DB_USER",$dbuser);
	define("DB_PASS",$dbpasswd);
	
	class Database{

	var $rs=0;
	var $dbh;
	var $database_host;		//host name.
	var $database_name;		//database name.
	var $database_user;		//database user.
	var $database_pass;		//database password.

	//Create Class Object
	function Database(){
		$database_host = DB_HOST;
		$database_name = DB_NAME;
		$database_user = DB_USER;
		$database_pass = DB_PASS;

		$this->database_host = $database_host;
		$this->database_name = $database_name;
		$this->database_user = $database_user;
		$this->database_pass = $database_pass;
		return 1;
	}

	//Create New Database
	function create_db () {
		$database_name = $this->database_name;
		return mysql_create_db($database_name);
	}

	//Select Database
	function select_db () {
		$database_name = $this->database_name;
		return mysql_select_db($database_name);
	}

	//Connect to Database
	function connect () {
		$host = $this->database_host;
		$username = $this->database_user;
		$password = $this->database_pass;
		$this->dbh = mysql_connect($host, $username, $password);
		$this->select_db();
		return $this->dbh;
	}

	//Query Database and Return Resource (For Selection Purpose)
	function query($sql){
		//print $sql ."<br>";
		$this->rs=mysql_query($sql,$this->dbh);
		if($this->rs){
			return true;
		}
		else{
			//echo "<br>" .mysql_error(). "-->  $sql<br>";

			$IP		= $_SERVER['REMOTE_ADDR'];
			$HOST	= $_SERVER['HTTP_HOST'];
			$URI	= $_SERVER['REQUEST_URI'];
			$email_msg = mysql_error() ." FOR ". $sql ."\r\n\r\n AT $HOST$URI BY $IP";
			//@mail("", "Error inside Lyrics:", $email_msg, "From: ");
			return false;
		}
	}

	//Query Database and Return True/False (For Insert/Update/Delete)
	function execute($sql){
		//print $sql ."<br>";
		if(mysql_query($sql,$this->dbh)){
			return true;
		}
		else{
			//echo "<br>" .mysql_error(). "-->  $sql<br>";

			$IP		= $_SERVER['REMOTE_ADDR'];
			$HOST	= $_SERVER['HTTP_HOST'];
			$URI	= $_SERVER['REQUEST_URI'];
			$email_msg = mysql_error() ." FOR ". $sql ."\r\n\r\n AT $HOST$URI BY $IP";
			
			return false;
		}
		return false;
	}

	//Fetch Single Record
	function fetch_row(){
		return mysql_fetch_row($this->rs);
	}

	function fetch_row_assoc(){
		return mysql_fetch_assoc($this->rs);
	}
	//Fetch All Records
	function fetch_all(){
		$ret= array();
		$num = $this->get_num_rows();

		for($i=0;$i<$num;$i++){
			array_push($ret,$this->fetch_row());
		}
		return $ret;
	}

	//Fetch Number of Rows Returned
	function get_num_rows(){
		if($this->rs)
		return mysql_num_rows($this->rs);
		else
		return 0;
	}

	//Move in Rows One by One
	function move_to_row($num){
		if($num>=0 && $this->rs){
			return mysql_data_seek($this->rs,$num);
		}
		return 1;
	}

	//Fetch Number of Columns.
	function get_num_columns(){
		return mysql_num_fields($this->rs);
	}

	//Fetch Column Names
	function get_column_names(){
		$nofields= mysql_num_fields($this->rs);
		$fieldnames=array();
		for($k=0;$k<$nofields;$k++){
			array_push($fieldnames,mysql_field_name($this->rs,$k));
		}
		return $fieldnames;
	}

	//Fetch Last Error Produced by MySql (Use for debuging purpose)
	function debug(){
		echo mysql_errno() .": ". mysql_error();
	}

	//Fetch List of All Db Tables
	function list_tables(){
		$database_name = $this->database_name;
		return mysql_list_tables($database_name);
	}

	//Fetch MySql Recent Inserted Id
	function insert_id() {
		return mysql_insert_id ();
	}

	//Fetch Records as an Array
	function fetch_array($res){
		return mysql_fetch_array ($res);
	}

	//Fetch all record as an Associative Array
	function fetch_all_assoc(){
		$ret= array();
		while ($row = mysql_fetch_assoc($this->rs)) {
			array_push($ret,$row);
		}
		return $ret;
	}

	//Fetch single record as an Associative Array
	function fetch_one_assoc(){
		$ret= array();
		$ret = mysql_fetch_assoc($this->rs);
		return $ret;
	}

	//Fetch one cell from given query
	function  executeScalar($sql){
/*		echo $sql;
		exit();*/
		$this->query($sql);
		$row = $this->fetch_row();
		return $row[0];
	}

	//Fetch 2 cell from given query
	function  executeTwise($sql){
		$this->query($sql);
		$row = $this->fetch_row();
		$temp = array();
		$temp[0] =  $row[0];
		$temp[1] =  $row[1];
		return $temp;
	}

	//Close Database Connection
	function close(){
		mysql_close($this->dbh);
	}
	
	
	function validateField($table,$whr_cls){
		return $this->executeScalar("Select 1 from ".$table." where 1=1 ".$whr_cls.";");
	}
	
}// End of class


	// Utility Functions
	function sql_replace($str){
		return mysql_escape_string($str);
	}