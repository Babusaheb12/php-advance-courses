<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

/// API URL:
/// http://localhost/php-advance-courses/Api/fetchAllData.php

include 'databasesconnection/config.php';


$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql) or die("Query Failed: " . mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {

    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);

} else {

    echo json_encode(array(
        "message" => "No Records Found",
        "status" => false
    ));
}

