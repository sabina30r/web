<?php
header('Content-Type: application/json');
require_once('connection.php');
$conn = OpenCon();
session_start();

$email = $_POST["email"];
$query = "SELECT login FROM userdata WHERE `e-mail` = '".$email."'";
$result = $conn->query($query);
CloseCon($conn);
$strResult = $result->fetch_assoc();
$response = array();
if(!empty($strResult)) {
    $response = array(
        "is" => 'true'
    );
}
else {
    $response = array(
        "is" => 'false'
    );
}
echo json_encode($response);
