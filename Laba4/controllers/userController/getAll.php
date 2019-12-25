<?php
require_once "../../Daos/UserDao.php";
$userDao = new UserDao();
$userDao->getAll();