<?php
 
/*
 * Following code will get single product details
 * A product is identified by product id (pid)
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
$result = mysql_query("SELECT * FROM informatics117db.accounts");
 
if (mysql_num_rows($result) > 0){
    $response["accounts"] = array();

    while ($row = mysql_fetch_assoc($result)) {
        $temp_array = array();

        $temp_array["account_number"] = $row["account_number"];
        $temp_array["username"] = $row["username"];
        $temp_array["password"] = $row["password"];

        array_push($response["accounts"], $temp_array);
    }

    $response["success"] = 1;

    //echoing JSON response
    echo json_encode($response);

    } else{
    $response["success"] = 0;
    $response["message"] = "No accounts found";

    // echo no accounts JSON
    echo json_encode($response);
    }
?>