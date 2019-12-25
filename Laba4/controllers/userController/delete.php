<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";

$id = $_POST['id'];
$userDao = new UserDao();
$userDao->deleteUser($id);