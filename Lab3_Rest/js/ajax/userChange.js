$(document).ready(function () {
    $(document.body).on('change', 'input[type=text]', function () {
        var formdata = new FormData();
        formdata.append("id", $(this).attr('id'));
        formdata.append("param", $(this).attr('name'));
        formdata.append("value", $(this).val());
        jQuery.ajax({
            url: "/api/users/change",
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function (result) {
            }
        });
    });
});

$(document).ready(function () {
    $(document.body).on('click', '#buttonRemove', function () {
        var formdata = new FormData();
        var currId = $(this).attr('name');
        formdata.append("id", currId);
        formdata.append("param", "remove");
        jQuery.ajax({
            url: "/api/users/delete",
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function (result) {
                var finalResult = JSON.parse(result);
                if (finalResult.success == "1") {
                    $("#user-" + currId).remove();
                } else {
                    alert(finalResult.errorMessage);
                }
            }
        });
    });
});