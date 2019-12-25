<?php require_once 'php/auth.php' ?>
<!DOCTYPE html>
<html>

<head>
    <title>User page</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <style>
        .editButWrapper {
            text-align: center;
        }
    </style>
</head>

<body>
<div class="jumbotron">
    <h1 class="display-4">Welcome, <?php
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
<div class="editButWrapper">
    <button style="align: center" type="button" class="btn btn-secondary"
            onclick="window.location.href = '/editUser.php?id=<?php echo $_SESSION["id"]; ?>'">Edit
    </button>
</div>
<br>
<h2 style="text-align: center">All users</h2>
<br>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th>Username</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Avatar</th>
    </tr>
    </thead>
    <?php require_once 'php/show_data.php' ?>
</table>
<div class="editButWrapper">
    <button style="align: center" type="button" class="btn btn-secondary"
            onclick="window.location.href='php/logout.php'">Logout
    </button>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>