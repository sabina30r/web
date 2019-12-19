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

$_SESSION['login'] = $login;
$_SESSION['password'] = $password;
$_SESSION['firstname'] = $fistname;
$_SESSION['lastname'] = $lastname;
$_SESSION['e-mail'] = $email;
$_SESSION['url'] = $url;
$_SESSION['role'] = $role;
$query = "UPDATE userdata SET `login` = '" . $login . "', `password` = '" . $password . "', `firstname` = '" . $fistname . "', `lastname` ='" . $lastname . "', `e-mail` ='" . $email . "', `url` = '" . $url . "' WHERE `id` ='".(int)$id."';";
$conn->query($query);
CloseCon($conn);
if($_SESSION['role']='user'){
header('Location: ../userPage.php');
}
//if($_SESSION['role']='admin'){
//    header('Location: ../adminPage.php');
//}
?>