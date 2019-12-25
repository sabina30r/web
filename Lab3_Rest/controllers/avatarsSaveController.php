<?php
require_once "../utils/sessionExecutor.php";
require_once "../utils/dirPaths.php";
require_once "../database/userDAO.php";

if (SessionExecutor::isUserAuthorized()) {
    $uploads_dir = "../" . AVATARS_PATH;
    if ($_FILES["filename"]["size"] > 1024 * 3 * 1024) {
        echo json_encode(array('success' => 0, 'errorMessage' => "Incorrect file size!"));
        exit;
    }
    if (is_uploaded_file($_FILES["avatar"]["tmp_name"])) {
        $userDAO = new UserDAO();
        $userData = SessionExecutor::getUserData();
        $fileName = microtime(true) . ".jpg";
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $uploads_dir . $fileName) && $userDAO->changeAvatarByMail($userData['email'], $fileName)) {
            SessionExecutor::changeUserAvatar($fileName);
            echo json_encode(array('success' => 1));
        } else {
            echo json_encode(array('success' => 0, 'errorMessage' => "Error during file upload1"));
        }
    } else {
        echo json_encode(array('success' => 0, 'errorMessage' => "Error during file upload"));
    }
}

