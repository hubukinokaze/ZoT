<?php
 
/*
 * Following code will get settings
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
$result = mysql_query("SELECT * FROM informatics117db.settings");
 
if (mysql_num_rows($result) > 0){
    $response["settings"] = array();

    while ($row = mysql_fetch_assoc($result)) {
        $temp_array = array();

        $temp_array["username"] = $row["username"];
        $temp_array["flower"] = $row["flower"];
        $temp_array["min_moisture"] = $row["min_moisture"];
        $temp_array["notify"] = $row["notify"];
        $temp_array["water"] = $row["water"];

        array_push($response["settings"], $temp_array);
    }

    $response["success"] = 1;

    //echoing JSON response
    echo json_encode($response);

    } else{
    $response["success"] = 0;
    $response["message"] = "No settings found";

    // echo no accounts JSON
    echo json_encode($response);
    }
?>