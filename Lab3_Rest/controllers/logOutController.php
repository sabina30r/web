<?php
require_once "../utils/sessionExecutor.php";

if (SessionExecutor::isUserAuthorized()){
    SessionExecutor::removeUserFromSession();
    echo json_encode(array("success" => 1));
} else {
    echo json_encode(array("success" => 0));
}