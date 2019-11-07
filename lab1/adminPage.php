<?php require_once 'php/auth_admin.php'?>
<!DOCTYPE html>
<html>

<head>
    <title>adminPage</title>
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <link href="https://fonts.googleapis.com/css?family=Yeon+Sung&display=swap" rel="stylesheet">
</head>

<body>
<header id="header">
    <div class="name_wrapper">
        <h3>ВИДАТНІ КОРИСТУВАЧІ ВИДАТНОЇ СИСТЕМИ</h3>
    </div>
    <div class="wrapper">
        <div id="logo"></div>
    </div>
</header>

<body>
<div class="welcome">
    <h1 class="name_welcome">Welcome, <?php
        echo " " . $_SESSION['login']; ?></h1>
</div>
<h2 style="text-align: center">User control panel</h2>
<br>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th>Username</th>
        <th>Password</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Avatar</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <?php require_once 'php/show_editableData.php'?>
</table>
<div class = "ButWrapper">
    <button onclick="window.location.href='php/logout.php'">Logout</button>
</div>

</body>
</html>