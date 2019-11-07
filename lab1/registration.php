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
<section class="form-wrapper">
    <div class="form__title">Registration</div>
    <form method="POST" action="php/sign_up.php">
        <div class='form__field'>
            <label for="login">Login </label>
            <input required type="text" id='login' name="login" placeholder="Login">
        </div>
        <div class='form__field'>
            <label for="password">Password</label>
            <input required type="password" id='password' name="password" placeholder="Password">
        </div>
        <div class='form__field'>
            <label for="firstname">First name</label>
            <input required type="text" id='firstname' name="firstname" placeholder="First name">
        </div>
        <div class='form__field'>
            <label for="lastname">Last name </label>
            <input required type="text" id='lastname' name="lastname" placeholder="Last name">
        </div>
        <div class='form__field'>
            <label for="email">E-mail </label>
            <input required type="text" id='email' name="email" placeholder="E-mail">
        </div>
        <div class='form__field'>
            <label for="url">Photo </label>
            <input required type="text" id='image' name="url" placeholder="Url">
        </div>
        <div class='form__field submit-btn'>
            <input type="submit" class="submit" value="Register">
        </div>
    </form>
</section>

</body>
</html>