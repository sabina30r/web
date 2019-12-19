<?php
require_once('connection.php');
$conn = OpenCon();
session_start();
$id = $_POST['id'];
$login = $_POST['login'];
$password = $_POST['password'];
$fistname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['e-mail'];
$url = $_POST['url'];
$role = $_POST['role'];
$query = "UPDATE userdata SET `login` = '" . $login . "', `password` = '" . $password . "', `firstname` = '" . $fistname . "', `lastname` ='" . $lastname . "', `e-mail` ='" . $email . "',`role` ='".$role."', `url` = '" . $url . "' WHERE `id` ='".(int)$id."';";
$conn->query($query);
CloseCon($conn);
    header('Location: ../adminPage.php');
?>
