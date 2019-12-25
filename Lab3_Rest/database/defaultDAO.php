<?php
abstract class DefaultDAO{

    function getSqlConnection()
    {
        $host = 'localhost'; // адрес сервера
        $database = 'userdata'; // имя базы данных
        $user = 'root'; // имя пользователя
        $password = ''; // пароль
        $link = mysqli_connect($host, $user, $password, $database)
        or die("Ошибка " . mysqli_error($link));
        return $link;
    }

    function closeSqlConnection($link)
    {
        mysqli_close($link);
    }
}