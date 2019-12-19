<?php

require_once('connection.php');

$conn = OpenCon();
if (($_POST['login']) &&
    ($_POST['password'])){
        if (!mysqli_num_rows($conn->query("SELECT login FROM userdata WHERE login='".$_POST['login']."'"))){            
            $login = $_POST['login'];
            $password = $_POST['password'];
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $e_mail = $_POST['email'];
            $url = $_POST['url'];
            $id = 1;
            while(mysqli_num_rows($conn->query("SELECT id FROM userdata WHERE id=" . $id)))
                $id++;
            $query = "INSERT INTO userdata VALUES" .
                "('$id','$login', '$password', '$fname','$lname','$e_mail','user','$url')";
            $result = $conn->query($query);
            if (!$result) echo "Сбой при вставке данных: $query<br>" .
                $conn->error . "<br><br>";
        }
}

CloseCon($conn);
//if(!($_SESSION['role'] == 'admin')) {
//    header('Location: ../adminPage.php');
//}
//else
//header('Location: ../index.php');;
