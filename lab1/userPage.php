<?php require_once 'php/auth.php'?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
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
<div class="welcome">
    <h1 class="name_welcome">Welcome, <?php
        echo " " . $_SESSION['login']; ?></h1>
</div>
<br>
<h2 style="text-align: center"> It's you</h2>
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
        </tr>
        </thead>
        <?php echo "<tr><td>" . $_SESSION["login"] . "</td><td>" . $_SESSION['password'] . "</td><td>" . $_SESSION["firstname"] . "</td><td>" . $_SESSION["lastname"] . "</td><td>" . $_SESSION["e-mail"] . "</td><td>" . $_SESSION["role"] . "</td><td><img src=\"" . $_SESSION["url"] . "\" width=\"40\" height=\"40\" /></td></tr>"; ?>
    </table>
    <div class = "editButWrapper">
        <button  onclick="window.location.href = '/editUser.php?id=<?php echo $_SESSION["id"];?>'">Edit</button>
    </div>
<br>
<h2 style="text-align: center">All users</h2>
<br>
<table class="table">
    <thead class="users-table">
    <tr>
        <th>Username</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Avatar</th>
    </tr>
    </thead>
    <?php require_once 'php/show_data.php'?>
</table>
<div class = "logoutButWrapper">
    <button onclick="window.location.href='php/logout.php'">Logout</button>
</div>

</body>
</html>