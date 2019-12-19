<?php require_once 'php/auth_admin.php'?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin page</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <style>
        .ButWrapper {
            text-align: center;
        }
    </style>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script src="js/sorting.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

</head>

<body>
<div class="jumbotron">
    <h1 class="display-4">Welcome, <?php
        echo " " . $_SESSION['login']; ?>. Admin page</h1>
</div>
<h2 style="text-align: center">User control panel</h2>
<br>
    <form method="post" id="filterForm" action="php/filter.php">
        <label for="filter"></label><select id="filterOptions">
                <option selected value="login">Username</option>
                <option value="password">Password</option>
                <option value="firstname">First name</option>
                <option value="lastname" >Last name</option>
                <option value="e-mail">e-mail</option>
                <option value="role">role</option>
                <option value="url">avatar</option>
            </select>
        <label for="fieldText"></label><input type="text" id="fieldText">
        <input type="submit" value="filter" id="123">
    </form>
<br>
<table id="MyTable" class="table" width="100%">
        <thead class="thead-dark">
    <tr>
        <th onclick="sortTable(0)">Username</th>
        <th onclick="sortTable(1)">Password</th>
        <th onclick="sortTable(2)">First name</th>
        <th onclick="sortTable(3)">Last name</th>
        <th onclick="sortTable(4)">Email</th>
        <th onclick="sortTable(5)">Role</th>
        <th onclick="sortTable(6)">Avatar</th>
        <th onclick="sortTable(7)">Edit</th>
    </tr>
    </thead>
    <tbody id="body">
    <?php require_once 'php/show_editableData.php'?>
    </tbody>
</table>
<br>
<div align="center">
<form id="addingUser" action="php/sign_up.php" method="post">
    <label>
        Username
        <br>
        <input required type="text" name="login" placeholder="Your username">
    </label>
    <br>
    <label>
        Password
        <br>
        <input required type="password" name="password"
               placeholder="Your password">
    </label>
    <br>
    <label>
        First name
        <br>
        <input required type="text" name="firstname"
               placeholder="First name">
    </label>
    <br>
    <label>
        Last name
        <br>
        <input required type="text" name="lastname">
    </label>
    <br>
    <label>
        Email
        <br>
        <input required type="email" name="email" placeholder="E-mail">
    </label>
    <br>
    <label>
        Avatar url
        <br>
        <input required type="text" name="url" placeholder="url">
    </label>
    <br>
    <input type="submit"  class="btn btn-primary" value="Register" id="addButton">
</form>
</div>
<br>
<div class="jumbotron">
    <div class = "ButWrapper">
        <button style="align: center"  type="button" class="btn btn-secondary" onclick="window.location.href='php/logout.php'">Logout</button>
    </div>
</div>
<script src="js/filter.js?11111"></script>
<script src="js/adminAdding.js"></script>
    <script src='js/edit.js'></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

</script>

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