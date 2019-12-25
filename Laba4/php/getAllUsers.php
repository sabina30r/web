<?php
require_once('connection.php');

$conn = OpenCon();
$query = "SELECT * FROM userdata";
$result = $conn->query($query);
if (!$result) die  ("Сбой при доступе к базе данных: " . $conn->error());
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