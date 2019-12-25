<?php
require_once "../utils/model.php";
require_once "../utils/validator/userDataValidator.php";
require_once "../entities/user.php";

class UserData extends Model
{
    public $firstName,
        $secondName,
        $role,
        $password,
        $email,
        $repeatedPassword;

    function __construct($firstName, $secondName, $email, $role, $password, $repeatedPassword)
    {
        $this->firstName = $firstName;
        $this->secondName = $secondName;
        $this->role = $role;
        $this->password = $password;
        $this->repeatedPassword = $repeatedPassword;
        $this->email = $email;
    }

    function isUserDataValid()
    {
        return isUserNameValid($this->firstName) &&
            isUserNameValid($this->secondName) &&
            isRoleValid($this->role) &&
            isPasswordsValid($this->password, $this->repeatedPassword) &&
            isEmailValid($this->email);
    }

    function buildUser()
    {
        $hashedPassword = $this->password;
        return new User($this->firstName, $this->secondName, $this->email, $this->role, $hashedPassword);
    }

    function getInfo()
    {
        echo " " . $this->firstName . $this->secondName;
    }
}