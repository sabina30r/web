const NAME_ATTRIBUTE = "name";
const VALID_NAME_CLASS = "valid";
const NON_VALID_NAME_CLASS = "non-valid";
const NAME_FALSE_VALIDATING_MESSAGE = "Name must include only latin letters, and start from upper-case letter!";
const INCORRECT_PASSWORD_LENGTH = "Length of passwords must be 8 or more literals";
const PASSWORDS_NOT_THE_SAMES = "Passwords are not the sames!";
const INFO_FIELD_ID = "-info";

$(document).ready(function () {
    $("#signupForm").submit(function (e) {
        e.preventDefault();
        let validationResult = true;
        $(this).each(function () {
            $(this).find("input[id*='" + NAME_ATTRIBUTE + "']").each(function () {
                validationResult = validationResult & isNamesValid($(this));
            })
        });
        validationResult = validationResult & isPasswordsValid($("#password"), $("#repassword"));
        if (validationResult == true) {
            var data = $(this);
            var url = '../controllers/registrationController.php';

            $.ajax({
                type: "POST",
                url: url,
                data: data.serialize(),
                success: function (response) {
                    var responseData = JSON.parse(response);
                    if (responseData.success == "0"){
                        var message = '<div class="alert alert-danger" role="alert">' + responseData.errorMessage + '</div>';
                        $("#validation-errors").html(message);
                    } else {
                        window.location.href = "/";
                    }
                }
            });
        }
    });
});

function isNamesValid(element) {
    let validatingResult = validateUserName(element.val());
    $("#" + element.attr("id") + INFO_FIELD_ID).html(validatingResult);
    if (validatingResult != null) {
        changeClassInElements(element, VALID_NAME_CLASS, NON_VALID_NAME_CLASS);
        return false;
    }
    changeClassInElements(element, NON_VALID_NAME_CLASS, VALID_NAME_CLASS);
    return true;
}

function validateUserName(username) {
    if (username == null || !username.match(/^[A-Z][ A-Z]*[ a-zA-Z']*$/)) {
        return NAME_FALSE_VALIDATING_MESSAGE;
    }
    return null;
}

function changeClassInElements(element, oldClass, newClass) {
    element.removeClass(oldClass);
    element.addClass(newClass);
}

function isPasswordsValid(password, repeatedPassword) {
    let validatingResult = validatePasswords(password.val(), repeatedPassword.val());
    $("#" + password.attr("id") + INFO_FIELD_ID).html(validatingResult);
    $("#" + repeatedPassword.attr("id") + INFO_FIELD_ID).html(validatingResult);
    if (validatingResult != null) {
        changeClassInElements(password, VALID_NAME_CLASS, NON_VALID_NAME_CLASS);
        changeClassInElements(repeatedPassword, VALID_NAME_CLASS, NON_VALID_NAME_CLASS);
        return false;
    }
    changeClassInElements(password, NON_VALID_NAME_CLASS, VALID_NAME_CLASS);
    changeClassInElements(repeatedPassword, NON_VALID_NAME_CLASS, VALID_NAME_CLASS);
    return true;
}

function validatePasswords(password, repeatedPassword) {
    if (password == null || repeatedPassword == null || password.length < 8) {
        return INCORRECT_PASSWORD_LENGTH;
    }
    if (password != repeatedPassword) {
        return PASSWORDS_NOT_THE_SAMES;
    }
    return null;
}