<?php

function isUserNameValid($userName)
{
    return preg_match("/^[A-Z][ A-Z]*[ a-zA-Z']*$/", $userName);
}

function isRoleValid($role)
{
    return $role == "user" || $role == "admin";
}

function isPasswordsValid($password, $repassword)
{
    return $password!=null && $repassword == $password;
}

function isEmailValid($email)
{
    return preg_match("/^[A-Za-z_0-9]+@[a-z]+.[a-z]+$/", $email);
}