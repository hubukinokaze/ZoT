<?php

/*
* Following code will list all the rows in database
*/


//array for JSON response
$response = array();
// echo "creating response array....<br/>";

//include db connect class
require("db_connect.php");

//connecting to db
// echo "creating db connection....<br/>";
$db = new DB_CONNECT();

// echo "printing db....<br/>";
$con = $db->connect();

// // get all products from products table
$result = mysql_query("SELECT * FROM informatics117db.moisture_levels");


if (mysql_num_rows($result) > 0){
	$response["moisture_levels"] = array();

	//echo "going into while loop";
	while ($row = mysql_fetch_assoc($result)) {
		$temp_array = array();

	    $temp_array["entry_number"] = $row["entry_number"];
	    //echo $temp_array["entry_number"] . "<br/>";

	    $temp_array["username"] = $row["username"];

	    $temp_array["flower"] = $row["flower"];
	    
	    $temp_array["date"] = $row["date"];
	    //echo $temp_array["date"] . "<br/>";

	    $temp_array["time"] = $row["time"];
	    // echo $temp_array["time"] . "<br/>";

	    $temp_array["moisture_level"] = $row["moisture_level"];
	    // echo $temp_array["moisture_level"] . "<br/><br/>";

	    $temp_array["watered"] = $row["watered"];

	    array_push($response["moisture_levels"], $temp_array);
	    // print_r($temp_array);
	}

	// echo "printing response ...";	
	// print_r(array_values($response));
	$response["success"] = 1;

	//echoing JSON response
	echo json_encode($response);

	} else{
	// no moisture levels found
	$response["success"] = 0;
	$response["message"] = "No Moisture levels found";

	// echo no moisture levels JSON
	echo json_encode($response);
	}	

?>