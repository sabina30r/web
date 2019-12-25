<?php

namespace controllers\userController;

use User;
use UserDao;

class UserController
{
    function delete($ID) {
        $id = $ID;
        $userDao = new UserDao();
        $userDao->deleteUser($id);
    }

    function get($LOGIN) {
        $userDao = new UserDao();
        $login = $LOGIN;
        $userDao->getByLogin($login);
    }

    function getAll() {
        $userDao = new UserDao();
        $userDao->getAll();
    }

    function saveUser($LOGIN, $PASSWORD, $FIRSTNAME, $LASTNAME, $EMAIL, $URL, $ROLE){
        $login = $LOGIN;
        $password = $PASSWORD;
        $firstname = $FIRSTNAME;
        $lastname = $LASTNAME;
        $email = $EMAIL;
        $url = $URL;
        $role = $ROLE;

        $user = new User($login, $password, $firstname, $lastname, $email, $role, $url);

        $UserDao = new UserDao();
        $UserDao->createUser($user);
    }

    function updateUser($LOGIN, $PASSWORD, $FIRSTNAME, $LASTNAME, $EMAIL, $URL, $ROLE, $ID) {
        $login = $LOGIN;
        $password = $PASSWORD;
        $firstname = $FIRSTNAME;
        $lastname = $LASTNAME;
        $email = $EMAIL;
        $url = $URL;
        $role = $ROLE;
        $id = $ID;

        $user = new User($login, $password, $firstname, $lastname, $email, $role, $url);
        $user->id =$id;

        $userDao = new UserDao();
        $userDao->updateUser($user);
    }

}