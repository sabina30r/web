<?php
//include_once "user.php";
//include_once "connection.php";

class UserDao
{
    function createUser(User $user) {
        $conn = new Connection();
        $conn->OpenCon()->query("INSERT INTO `userdata`(`login`, `password`, `firstname`, `lastname`, `e-mail`, `role`, `url`) VALUES ('".$user->login."','".$user->password."','".$user->firstname."','".$user->lastname."','".$user->email."','".$user->role."','".$user->url."')");
    }

    function getAll() {

        $conn = new Connection();
        $result = $conn->OpenCon()->query(self::GET_ALL);
        $response = array();

        while ($row = $result->fetch_assoc()) {
            $user = new User($row["login"], $row["password"], $row["firstname"], $row["lastname"], $row["e-mail"], $row["role"], $row["url"]);
            $user->id = $row["id"];
            array_push($response, $user);
        }
        echo json_encode($response);
//        CloseCon($conn);
    }

    function getByLogin($login) {
        $conn = new Connection();
        $stmt = $conn->OpenCon()->prepare(self::GET_BY_LOGIN);
        $stmt->bind_param("s", $login);
        $stmt->execute() or die("query wasn't executed" . $stmt->error);
        $result = $stmt->get_result();
        $response = array();

        while ($row = $result->fetch_assoc()) {
            $user = new User($row["login"], $row["password"], $row["firstname"], $row["lastname"], $row["e-mail"], $row["role"], $row["url"]);
            $user->id = $row["id"];
            array_push($response, $user);
        }
        echo json_encode($response);
        CloseCon($conn);
    }

    function updateUser(User $user) {
        $conn = new Connection();
        $conn->OpenCon()->query("UPDATE `userdata` SET `login`='".$user->login."', `password`= '".$user->password."', `firstname` = '".$user->firstname."', `lastname` = '".$user->lastname."', `e-mail` = '".$user->email."', `role` = '".$user->role."', `url` = '".$user->url."' WHERE `id` = '".$user->id."'");
        echo "success";
    }

    function deleteUser($id) {
        $conn = new Connection();
        $stmt = $conn->OpenCon()->prepare(self::DELETE_USER);
        $stmt->bind_param("s", $id);
        $stmt->execute() or die("query wasn't executed" . $stmt->error);
        CloseCon($conn);
        echo "success";
    }

}