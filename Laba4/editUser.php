<?php require_once 'php/auth.php'?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit (user) page</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <style>
        .formWrapper {
            text-align: center;
        }
        .jumbotron {
            background-color: greenyellow !important;
        }
    </style>
</head>

<body >
    <?php
    require_once('php/connection.php');
    $id = $_REQUEST['id'];
    $conn = OpenCon();
    $query = "SELECT * FROM userdata WHERE id=" . $id;
    $result = $conn->query($query);
    $row = mysqli_fetch_array($result);
    ?>
    <div class="jumbotron">
        <h1 class="display-4">Edit user</h1>
    </div>
    <div class="formWrapper">
    <form method="post" action="php/changeUser.php">
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <input name="role" type="hidden" value="<?php echo $row['role'];?>">
        <p><label>
                Username
                <br>
                <input type="text" name="login" placeholder="Enter username"
                          required value="<?php echo $row['login'];?>" />
            </label></p>
        <p><label>
                Password
                <br>
                <input type="password" name="password" placeholder="Enter password"
                          required value="<?php echo $row['password'];?>" />
            </label></p>
        <p><label>
                First name
                <br>
                <input type="text" name="firstname" placeholder="Enter first name"
                          required value="<?php echo $row['firstname'];?>" />
            </label></p>
        <p><label>
                Last name
                <br>
                <input type="text" name="lastname" placeholder="Enter last name"
                          required value="<?php echo $row['lastname'];?>" />
            </label></p>
        <p><label>
                E-mail
                <br>
                <input type="email" name="e-mail" placeholder="Enter e-mail"
                          required value="<?php echo $row['e-mail'];?>" />
            </label></p>
        <p><label>
                Avatar url
                <br>
                <input type="text" name="url" placeholder="Enter avatar url"
                          required value="<?php echo $row['url'];?>"/>
            </label></p>
        <p><input name="submit" type="submit" value="Update" class="btn btn-primary"/></p>
    </form>
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