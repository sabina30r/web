<?php
require_once "../utils/sessionExecutor.php";
require_once "../utils/dirPaths.php";

if (isset($_GET['avatar'])) {
    $name = "../" .AVATARS_PATH . $_GET['avatar'];
    $fp = fopen($name, 'rb');
    if (!$fp){
        $fp = fopen("../" . AVATARS_PATH . "default.jpg","rb");
    }
    // send the right headers
    header("Content-Type: image/jpg");
    header("Content-Length: " . filesize($name));

    // dump the picture and stop the script
    fpassthru($fp);
    exit;
}