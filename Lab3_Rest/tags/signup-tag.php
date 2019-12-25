<script>
    $('.js-click-modal').click(function () {
        $('.container-fluid').addClass('modal-open');
    });

    $('.js-close-modal').click(function () {
        $('.container-fluid').removeClass('modal-open');
    });
</script>

<div class="modal" id="signUpModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h1 id="signup">Sign up</h1>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="signupForm">
                    <div class="row justify-content-center">
                        <div class="col-12 right">
                            <span id="validation-errors"></span>
                            <h5 id="error-info"></h5>
                            <div class="form-group">
                                <label for="firstname">Enter your firstname</label>
                                <input type="text" class="form-control form-control-lg" id="firstname"
                                       name="firstname"
                                       required/>
                                <small class="form-text" id="firstname-info"></small>
                            </div>
                            <div class="form-group">
                                <label for="secondname">Enter your secondname</label>
                                <input type="text" class="form-control form-control-lg" id="secondname"
                                       name="secondname" required/>
                                <small class="form-text" id="secondname-info"></small>
                            </div>
                            <div class="form-group">
                                <label for="email">Enter your email</label>
                                <input type="email" class="form-control form-control-lg" id="email"
                                       name="email" required/>
                                <small class="form-text" id="email-info"></small>
                            </div>
                            <div class="form-group">
                                <label for="role-selector">Select role:</label>
                                <select name="role" id="role-selector" class="form-control" required>
                                    <option value="user">Simple user</option>
                                    <option value="admin">Moderator</option>
                                </select>
                                <small class="form-text" id="role-selector-info"></small>
                            </div>
                            <div class="form-group">
                                <label for="password">Enter your password</label>
                                <input type="password" class="form-control form-control-lg" id="password"
                                       name="password"
                                       required/>
                                <small class="form-text" id="password-info"></small>
                            </div>
                            <div class="form-group">
                                <label for="repassword">Repeat your password</label>
                                <input type="password" class="form-control form-control-lg" id="repassword"
                                       name="repassword" required/>
                                <small class="form-text" id="repassword-info"></small>
                            </div>
                            <input type="submit" class="btn btn-secondary btn-block" value="Sign UP"
                                   name=""/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>