<?php
require_once "../entities/userData.php";
require_once "../database/userDAO.php";

const USER_WITH_THE_SAME_EMAIL_IS_PRESENT = "User with same email is present!";
const INCORRECT_INPUT_USER_DATA = "Incorrect input user data.";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userData = new UserData($_POST["firstname"], $_POST["secondname"], $_POST["email"], $_POST["role"], $_POST["password"], $_POST["repassword"]);
    if ($userData->isUserDataValid() == 1) {
        $user = $userData->buildUser();
        $userDao = new UserDAO();
        if (!$userDao->isUserWithSuchEmailPresent($user->email)) {
            $userDao->addUser($user);
            echo json_encode(array("success" => 1));
        } else {
            echo json_encode(array('success' => 0, 'errorMessage' => USER_WITH_THE_SAME_EMAIL_IS_PRESENT));
        }
    } else {
        echo json_encode(array('success' => 0, 'errorMessage' => INCORRECT_INPUT_USER_DATA));
    }
}