<?php
header('Content-Type: application/json');
require_once('connection.php');
$conn = OpenCon();
session_start();
$field = $_POST['filterOptions'];
$filter = $_POST['fieldText'];
$query = "SELECT * FROM userdata WHERE `".$field."` LIKE '".$filter."%'";
$result = $conn->query($query);
if (!$result) die  ("Сбой при доступе к базе данных: " . $conn->error());
$rows = $result->num_rows;
$response = array();
while ($row = $result->fetch_assoc()) {
    $tmp = array();
    $tmp["id"] = $row["id"];
    $tmp["login"] = $row["login"];
    $tmp["password"] = $row["password"];
    $tmp["firstname"] = $row["firstname"];
    $tmp["lastname"] = $row["lastname"];
    $tmp["email"] = $row["e-mail"];
    $tmp["role"] = $row["role"];
    $tmp["url"] = $row["url"];
    array_push($response, $tmp);
}
echo json_encode($response);