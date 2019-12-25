<?php

use controllers\userController;

class Api
{

    protected $method;
    public $requestUri= [];
    public $requestParams= [];


    public function __construct() {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");

        //Массив GET параметров разделенных слешем
        $this->requestUri = explode('/', trim($_SERVER['REQUEST_URI'],'/'));
        $this->requestParams = $_REQUEST;

        //Определение метода запроса
        $this->method = $_SERVER['REQUEST_METHOD'];
        if ($this->method == 'POST' && array_key_exists('HTTP_X_HTTP_METHOD', $_SERVER)) {
            if ($_SERVER['HTTP_X_HTTP_METHOD'] == 'DELETE') {
                $this->method = 'DELETE';
            } else if ($_SERVER['HTTP_X_HTTP_METHOD'] == 'PUT') {
                $this->method = 'PUT';
            } else {
                throw new Exception("Unexpected Header");
            }
        }
    }


    function run()
    {
        $userController = new userController\UserController();
        if ($this->method == 'POST') {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['e-mail'];
            $url = $_POST['url'];
            $role = $_POST['role'];
            $userController->saveUser($login, $password, $firstname, $lastname, $email, $url, $role);

        }
        if ($this->method == 'DELETE') {
            $id = $_GET['id'];
            $userController->delete($id);
        }
        if ($this->method == 'PUT') {
            $json = file_get_contents('php://input');
            $decodedJson = json_decode($json);
            $login = $decodedJson->login;
            $password = $decodedJson->password;
            $firstname = $decodedJson->firstname;
            $lastname = $decodedJson->lastname;
            $email = $decodedJson->email;
            $url = $decodedJson->url;
            $role = $decodedJson->role;
            $id = $decodedJson->id;
            $userController->updateUser($login, $password, $firstname, $lastname, $email, $url, $role, $id);
        }
        if($this->method == 'GET') {
            $userController->getAll();
        }
        else {
//            echo "Ne poluchilos'";
        }
    }
}