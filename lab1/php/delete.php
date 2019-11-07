<?php
require_once('connection.php');
$conn = OpenCon();
$id = $_REQUEST['id'];

$query = "DELETE FROM userdata where id =" . $id .";";
$conn->query($query);
CloseCon($conn);
header('Location: ../adminPage.php');
?>