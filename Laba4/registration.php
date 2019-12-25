<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <style>
        .formWrapper {
            text-align: center;
        }
        .jumbotron {
            background-color: #d949ff !important;
        }
    </style>
</head>

<body >
        <div class="jumbotron"><h1 class="display-4">Registration</h1></div>
        <div class="formWrapper">
        <form method="post" action="php/sign_up.php">
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
            <input type="submit" class="btn btn-primary" value="Register">
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