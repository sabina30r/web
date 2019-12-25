<?php
//require_once "model.php";

class User
{
    public $id,
        $login,
        $password,
        $firstname,
        $lastname,
        $email,
        $role,
        $url;

    public function __construct($login, $password, $firstname, $lastname, $email, $role, $url)
    {
        $this->login = $login;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->role = $role;
        $this->password = $password;
        $this->url = $url;
    }


    function getInfo()
    {
        echo " " . $this->firstName . $this->secondName;
    }
}
