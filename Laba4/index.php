<!DOCTYPE html>
<html>

<head>
    <title>LABA_2</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Text|PT+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/validatorRegister.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script>
    </script>
</head>
<header id="header">
    <div class="name_wrapper">
        <h3>ВИДАТНІ КОРИСТУВАЧІ ВИДАТНОЇ СИСТЕМИ</h3>
    </div>
    <div class="wrapper">
    </div>
</header>
<body>
<nav class="navbar navbar-light bg-light">
    <div class="btn-group" role="group" aria-label="Basic example">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
            SIGN IN
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="php/login.php">
                            <label>
                                Username
                                <br>
                                <input required type="text" name="login" placeholder="username">
                            </label>
                            <br>
                            <label>
                                Password
                                <br>
                                <input required type="password" name="password" placeholder="password">
                                <br>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </label>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal1">
            SIGN UP
        </button>

        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registration form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="registration" name="registration" method="post" action="php/sign_up.php" onsubmit="return(validate(registration))">
                            <label>
                                Username
                                <br>
                                <input type="text" id="login" name="login" placeholder="Your username">
                            </label>
                            <br>
                            <div id="errorLogin">

                            </div>
                            <br>
                            <label>
                                Password
                                <br>
                                <input type="password" name="password"
                                       placeholder="Your password">
                            </label>
                            <br>
                            <div id="errorPassword">

                            </div>
                            <br>
                            <label>
                                First name
                                <br>
                                <input type="text" name="firstname"
                                       placeholder="First name">
                            </label>
                            <br>
                            <div id="errorFN">

                            </div>
                            <br>
                            <label>
                                Last name
                                <br>
                                <input type="text" name="lastname">
                            </label>
                            <br>
                            <div id="errorLN">

                            </div>
                            <br>
                            <label>
                                Email
                                <br>
                                <input type="text" name="email" placeholder="E-mail">
                            </label>
                            <br>
                            <div id="errorEM">
                            </div>
                            <br>
                            <label>
                                Avatar url
                                <br>
                                <input type="text" name="url" placeholder="url">
                            </label>
                            <br>
                            <button id="subm" type="submit" class="btn btn-primary" data-backdrop="static" >Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
        <div class="clear"></div>
<div class="content">
    <table id="table">
        <tr>
            <th>Username</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Avatar</th>
        </tr>
        <?php require_once 'php/show_data.php'?>
        </tr>

    </table>
</div>

</body>
</html>