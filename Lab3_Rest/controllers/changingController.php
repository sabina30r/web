<?php
require_once "../utils/sessionExecutor.php";
require_once "../database/userDAO.php";

if (SessionExecutor::isUserAuthorized() && SessionExecutor::getUserData()['role'] == "admin") {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $params = array("firstname", "secondname", "email", "password");
        if (in_array($_POST['param'], $params)) {
            $userDao = new UserDAO();
            $userDao->changeParamByID($_POST['param'], $_POST['value'], $_POST['id']);
        }
    }
    echo json_encode(array("success" => 1));
} else {
    echo json_encode(array("success" => 0, "errorMessage" => "You haven't correct access rights"));
}