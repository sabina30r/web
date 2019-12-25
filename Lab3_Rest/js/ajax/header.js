$(document).ready(function () {
    $("#loginForm").submit(function (e) {
        e.preventDefault();
        var data = $(this);
        var url = '/api/login';
        $.ajax({
            type: "POST",
            url: url,
            data: data.serialize(),
            success: function (response) {
                var responseData = JSON.parse(response);
                if (responseData.success == "0") {
                    var message = '<div class="alert alert-danger" role="alert">' + responseData.errorMessage + '</div>';
                    $("#login-validation-errors").html(message);
                } else {
                    window.location.href = "/";
                }
            }
        });
    });
});

$(document).ready(function () {
    $("#logoutForm").submit(function (e) {
        e.preventDefault();
        var data = $(this);
        var url = '/api/logout';
        $.ajax({
            type: "POST",
            url: url,
            data: data.serialize(),
            success: function (response) {
                var responseData = JSON.parse(response);
                if (responseData.success == "1") {
                    window.location.href = "/";
                }
            }
        });
    });
});

$(document).ready(function () {
    $("#userImage").on("click", function () {
        $('#fileChooser').trigger('click');
    });
});

$(document).ready(function () {
    $("#fileChooser").on("change", function () {
        formdata = new FormData();
        if ($(this).prop('files').length > 0) {
            file = $(this).prop('files')[0];
            formdata.append("avatar", file);
        }
        jQuery.ajax({
            url: "/api/user/avatar",
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function (response) {
                window.location.href = "/personalPage.php";
            }
        });
    });
});