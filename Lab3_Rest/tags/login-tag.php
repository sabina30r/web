<script>
    $('.js-click-modal').click(function () {
        $('.container-fluid').addClass('modal-open');
    });

    $('.js-close-modal').click(function () {
        $('.container-fluid').removeClass('modal-open');
    });
</script>
<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="myModal" role="dialog"
     tabindex="-1">
    <div class="modal-fade" role="document">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        Login form
                    </h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="login-validation-errors"></div>
                    <form id="loginForm">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                e-mail
                            </label>
                            <input aria-describedby="emailHelp" class="form-control" id="exampleInputEmail1"
                                   name="email"
                                   placeholder="Enter e-mail"
                                   type="email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">
                                password
                            </label>
                            <input class="form-control" id="exampleInputPassword1" name='password'
                                   placeholder="Password"
                                   type="password" required>
                        </div>
                        <input type="submit" class="btn btn-secondary btn-block" value="LogIN"
                               name=""/>
                    </form>
                    <small class="form-text text-muted" id="emailHelp">We'll never share your account
                        data with anyone else.
                    </small>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark" data-dismiss="modal" type="button">
                        Back
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
