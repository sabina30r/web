<?php require_once 'php/auth.php'?>
<!DOCTYPE html>
<html>

<head>
    <title>editUser</title>
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

<body >
    <?php
    require_once('php/connection.php');
    $id = $_REQUEST['id'];
    $conn = OpenCon();
    $query = "SELECT * FROM userdata WHERE id=" . $id;
    $result = $conn->query($query);
    $row = mysqli_fetch_array($result);
    CloseCon($conn);
    ?>
    <div class="welcome">
        <h1 class="name_welcome">Edit user</h1>
    </div>
    <div class="formWrapper">
        <img src="public/images/<?php echo $row['url']?>" width="100" height="100">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="hidden" name="editId" value="<?php echo $_REQUEST['id']?>">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
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
            </label></p>
        <p><input name="submit" type="submit" value="Update" class="btn btn-primary"/></p>
    </form>

    </div>
</body>
</html>