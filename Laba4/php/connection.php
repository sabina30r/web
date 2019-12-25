<?php

use Dotenv\Dotenv;

class Connection
{
    function OpenCon()
    {
        $dotEnv = Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
        $dotEnv->load();
        $dbhost = getenv("DB_HOST");
        $dbuser = getenv("DB_USER");
        $dbpass = getenv("DB_PASS");
        $db = getenv("DB_NAME");

        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->connect_error);

        return $conn;
    }

    function CloseCon($conn)
    {
        $conn->close();
    }
}