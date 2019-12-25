<?php
require_once "../utils/sessionExecutor.php";
require_once "../database/userDAO.php";

if (SessionExecutor::isUserAuthorized() && SessionExecutor::getUserData()['role'] == "admin") {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $params = array("remove");
        if (in_array($_POST['param'], $params)) {
            $userDao = new UserDAO();
            if ($userDao->deleteUserByID($_POST['id'])) {
                echo json_encode(array("success" => 1));
            } else {
                echo json_encode(array("success" => 0));
            }
        }
    }
} else {
    echo json_encode(array("success" => 0, "errorMessage" => "You haven't correct access rights"));
}