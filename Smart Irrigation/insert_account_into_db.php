<?php
 
/*
 * Following code will create a new account row
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    // create connection
	$conn = mysql_connect("informatics117.cjtlenhgjvw5.us-west-1.rds.amazonaws.com:3306", "alfonsoaranzazu", "Broncos7");
    mysql_select_db('informatics117db');

    $sql = "INSERT INTO accounts".
					"(username, password)".
					"VALUES ".
					"('$username', '$password')";
 
    // mysql inserting a new row
    $result = mysql_query($sql, $conn);
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Product successfully created.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>