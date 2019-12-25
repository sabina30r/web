<?php
require_once "../utils/model.php";

class User extends Model
{
    public $firstName,
        $secondName,
        $role,
        $email,
        $password,
        $activationStatus;
    public $avatar = "default.jpg";
    public $id;

    public function __construct($firstName, $secondName, $email, $role, $password)
    {
        $this->email = $email;
        $this->firstName = $firstName;
        $this->secondName = $secondName;
        $this->role = $role;
        $this->password = $password;
    }

    function getInfo()
    {
        echo " " . $this->firstName . $this->secondName;
    }
}
