<?php
require_once "../database/userDAO.php";
require_once "../utils/sessionExecutor.php";


if (SessionExecutor::isUserAuthorized()) {
    echo json_encode(array('success' => 0, "errorMessage" => "User already authorized!"));
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
        $userDAO = new UserDAO();
        $user = $userDAO->getUserWithSuchEmail($_POST['email']);
        if ($user != null) {
            if ($user->password === $_POST['password']) {
                SessionExecutor::setUserToSession($user);
                echo json_encode(array('success' => 1));
            } else {
                echo json_encode(array('success' => 0, "errorMessage" => "Incorrect password"));
            }
        } else {
            echo json_encode(array('success' => 0, "errorMessage" => "Incorrect e-mail"));
        }
    }
}