<?php
 
/*
 * Following code will create a new settings row
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['username']) && isset($_POST['flower']) && isset($_POST['notify'])) {
    $username = $_POST['username'];
    $flower = $_POST['flower'];
    $notify = $_POST['notify'];

    // create connection
	$conn = mysql_connect("informatics117.cjtlenhgjvw5.us-west-1.rds.amazonaws.com:3306", "alfonsoaranzazu", "Broncos7");
    mysql_select_db('informatics117db');

    $sql = "INSERT INTO settings".
					"(username, flower, notify)".
					"VALUES ".
					"('$username', '$flower', '$notify')";
 
    // mysql inserting a new row
    $result = mysql_query($sql, $conn);
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Settings successfully created.";
 
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