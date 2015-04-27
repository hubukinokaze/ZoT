<?php

/**
* A class file to connect to database
*/

class DB_CONNECT {

	//constructor
	function _constructor() {
		// connecting to database
		$this->connect();
	}

	// destructor
	function _destruct() {
		// closing db connection
		$this->close();
	}

	/**
	* Function to connect with database
	*/
	function connect(){
		// import database connection variables
		//require_once __DIR__ . '/db_config.php';
		require("db_config.php");

		// connecting to mysql rds database
		$con = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD);
		//$con = mysql_connect("informatics117db.cjtlenhgjvw5.us-west-1.rds.amazonaws.com:3306", "alfonsoaranzazu", "Broncos7");

		//$res = mysql_query("SHOW DATABASES");
		
		//prints database names
		/**while ($row = mysql_fetch_assoc($res)) {
    		*	echo $row['Database'] . "<br/>";
		*}
		*/
	
		// selecting database
		mysql_select_db(DB_DATABASE);
		//mysql_select_db("informatics117db", $con);

		// returning connection cursor
		return $con;
	}

	/**
	* Function to close db connection
	*/
	function close(){
		// closing db connection
		mysql_close();
	}
}
?>