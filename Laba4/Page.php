<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";

$api = new Api();
try {
    $api->run();
} catch (Exception $e) {
    echo "No api :(".$e;
}

