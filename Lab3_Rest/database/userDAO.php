<?php
include_once "defaultDAO.php";
include_once "../entities/user.php";

class UserDAO extends DefaultDAO
{
    const INSERT_USER_DATA_SQL_QUERY = "INSERT INTO users (firstname, secondname, password, role, email, avatar_path) VALUES (?,?,?,?,?,?)";
    const GET_USER_BY_EMAIL_SQL_QUERY = "SELECT * FROM users WHERE email=? LIMIT 1";
    const GET_USER_BY_ID_SQL_QUERY = "SELECT * FROM users WHERE id=? LIMIT 1";
    const UPDATE_FILE_NAME_SQL_QUERY = "UPDATE users SET avatar_path=? WHERE email=?";
    const SELECT_ALL_USERS = "SELECT * FROM users";
    const DELETE_USER_BY_ID_QUERY = "DELETE FROM users WHERE id=?";

    function addUser(User $user)
    {
        $connection = $this->getSqlConnection();
        $stmt = $connection->prepare(self::INSERT_USER_DATA_SQL_QUERY);
        $stmt->bind_param('ssssss', $user->firstName,
            $user->secondName,
            $user->password,
            $user->role,
            $user->email,
            $user->avatar);
        $stmt->execute() or die('Запрос не удался: ' . $stmt->error);
        $this->closeSqlConnection($connection);
    }

    function getAllUsers()
    {
        $connection = $this->getSqlConnection();
        $stmt = $connection->prepare(self::SELECT_ALL_USERS);
        $stmt->execute() or die('Запрос не удался: ' . $stmt->error);
        $result = $stmt->get_result();
        $userList = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = $this->extractUserFromRow($row);
                array_push($userList, $user);
            }
        }
        $this->closeSqlConnection($connection);
        return $userList;
    }

    function changeAvatarByMail($email, $url)
    {
        $connection = $this->getSqlConnection();
        $stmt = $connection->prepare(self::UPDATE_FILE_NAME_SQL_QUERY);
        $stmt->bind_param('ss', $url, $email);
        $stmt->execute() or die('Запрос не удался: ' . $stmt->error);
        $this->closeSqlConnection($connection);
        return true;
    }

    function deleteUserByID($id)
    {
        $connection = $this->getSqlConnection();
        $stmt = $connection->prepare(self::DELETE_USER_BY_ID_QUERY);
        $stmt->bind_param('i', $id);
        $stmt->execute() or die('Запрос не удался: ' . $stmt->error);
        $this->closeSqlConnection($connection);
        return true;
    }

    function changeParamByID($param, $value, $id)
    {
        $connection = $this->getSqlConnection();
        $stmt = $connection->prepare("UPDATE users SET " . $param . "=? WHERE id=?");
        $stmt->bind_param('si', $value, $id);
        $stmt->execute() or die('Запрос не удался: ' . $stmt->error);
        $this->closeSqlConnection($connection);
        return true;
    }

    function isUserWithSuchEmailPresent($email)
    {
        $connection = $this->getSqlConnection();
        $stmt = $connection->prepare(self::GET_USER_BY_EMAIL_SQL_QUERY);
        $stmt->bind_param('s', $email);
        $stmt->execute() or die('Запрос не удался: ' . $stmt->error);
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $this->closeSqlConnection($connection);
            return true;
        }
        $this->closeSqlConnection($connection);
        return false;
    }

    function getUserWithSuchEmail($email)
    {
        $connection = $this->getSqlConnection();
        $stmt = $connection->prepare(self::GET_USER_BY_EMAIL_SQL_QUERY);
        $stmt->bind_param('s', $email);
        $stmt->execute() or die('Запрос не удался: ' . $stmt->error);
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = $this->extractUserFromRow($row);
                $this->closeSqlConnection($connection);
                return $user;
            }
        }
        $this->closeSqlConnection($connection);
        return null;
    }

    function getUserWithSuchID($id)
    {
        $connection = $this->getSqlConnection();
        $stmt = $connection->prepare(self::GET_USER_BY_ID_SQL_QUERY);
        $stmt->bind_param('i', $id);
        $stmt->execute() or die('Запрос не удался: ' . $stmt->error);
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = $this->extractUserFromRow($row);
                $this->closeSqlConnection($connection);
                return $user;
            }
        }
        $this->closeSqlConnection($connection);
        return null;
    }

    function extractUserFromRow($row)
    {
        $user = new User($row["firstname"],
            $row["secondname"],
            $row["email"],
            $row["role"],
            $row["password"],
            $row["role"]);
        $user->url = $row["avatar_path"];
        $user->id = $row["id"];
        return $user;
    }

}