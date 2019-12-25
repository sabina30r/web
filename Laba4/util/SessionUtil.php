<?php

session_start();

class SessionExecutor
{
    public static function setUserToSession($user)
    {
        $_SESSION['firstname'] = $user->firstName;
        $_SESSION['secondname'] = $user->secondName;
        $_SESSION['role'] = $user->role;
        $_SESSION['email'] = $user->email;
        $_SESSION['avatar'] = $user->avatar;
        $_SESSION['id'] = $user->id;
    }

    public static function removeUserFromSession()
    {
        unset ($_SESSION['firstname']);
        unset ($_SESSION['secondname']);
        unset ($_SESSION['role']);
        unset ($_SESSION['email']);
        unset ($_SESSION['avatar']);
        unset ($_SESSION['id']);
    }

    public static function changeUserAvatar($avatar)
    {
        $_SESSION['avatar'] = $avatar;
    }

    public static function isUserAuthorized()
    {
        return isset($_SESSION['firstname']);
    }

    public static function getUserData()
    {
        return array('firstname' => $_SESSION['firstname'],
            'secondname' => $_SESSION['secondname'],
            'role' => $_SESSION['role'],
            'email' => $_SESSION['email'],
            'avatar' => $_SESSION['avatar'],
            'id' => $_SESSION['id']);
    }
}