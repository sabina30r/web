<!DOCTYPE html>
<html>

<head>
    <title>LABA_1</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Text|PT+Serif&display=swap" rel="stylesheet">
</head>

    <body >
    <header id="header">
        <div class="name_wrapper">
            <h3>ВИДАТНІ КОРИСТУВАЧІ ВИДАТНОЇ СИСТЕМИ</h3>
        </div>
        <div class="wrapper">
            <div id="logo"></div>
            <div id="auth_block">

                <div id="link_register">
                    <a href="/registration.php">Sign Up</a>
                </div>
                <div id="link_auth">
                    <a >Sign In</a>
                </div>

                <div class="modal_fade no-display" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<script>
    document.getElementsByClassName('close')[0].addEventListener('click', function () {
        document.getElementsByClassName('modal_fade')[0].classList.toggle('no-display');
    });


    document.getElementById('link_auth').addEventListener('click', function () {
        document.getElementsByClassName('modal_fade')[0].classList.toggle('no-display');
    });

</script>



            </div>
        </div>
        <div class="clear"></div>
    </header>
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