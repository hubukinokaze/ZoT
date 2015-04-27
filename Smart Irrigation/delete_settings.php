<?php
 
/*
 * Following code will delete a setting from table
 */
 
// array for JSON response
$response = array();

if (isset($_POST['username']) && isset($_POST['flower'])) {

    $username = $_POST['username'];
    $flower = $_POST['flower'];

    // connecting to db
    $conn = mysql_connect("informatics117.cjtlenhgjvw5.us-west-1.rds.amazonaws.com:3306", "alfonsoaranzazu", "Broncos7");
    mysql_select_db('informatics117db');

    $sql = "DELETE FROM settings WHERE flower = '$flower'";
 
    // mysql delete row
    $result = mysql_query($sql, $conn);
 
    // check if row deleted or not
    if (mysql_affected_rows() > 0) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Product successfully deleted";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // no product found
        $response["success"] = 0;
        $response["message"] = "No product found";
 
        // echo no users JSON
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