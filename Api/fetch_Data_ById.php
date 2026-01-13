<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

include 'databasesconnection/config.php';


/// this is a api url
// http://localhost/php-advance-courses/Api/fetch_Data_ById.php
//pass the in this type of json formmat
// {
//     "sId": "1"
// }


// Read JSON data from POST
$data = json_decode(file_get_contents("php://input"), true);

if(isset($data['sId']) && !empty($data['sId'])){
    $student_id = intval($data['sId']); // convert to integer for safety
} else {
    echo json_encode([
        'message' => 'No student ID provided',
        'status' => false
    ]);
    exit;
}

// SQL query
$sql = "SELECT * FROM student WHERE id = {$student_id}";
$result = mysqli_query($conn, $sql) or die("Query failed: " . mysqli_error($conn));

if(mysqli_num_rows($result) > 0){
    $outputs = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($outputs);
} else {
    echo json_encode([
        'message' => "No records found",
        'status' => false
    ]);
}
?>
