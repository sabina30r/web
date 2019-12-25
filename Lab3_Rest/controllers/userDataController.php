<?php
require_once "../database/userDAO.php";
require_once "../utils/sessionExecutor.php";

 $userDAO = new UserDAO();
 $userArray = $userDAO->getAllUsers();
 $currentRole = SessionExecutor::isUserAuthorized()? SessionExecutor::getUserData()['role'] : "none";
 echo json_encode(array("currentRole" => $currentRole,"usersList" => $userArray));