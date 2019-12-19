window.onerror = function (msg, url, line, col, error) {
    // Note that col & error are new to the HTML 5 spec and may not be
    // supported in every browser.  It worked for me in Chrome.
    let extra = !col ? '' : '\ncolumn: ' + col;
    extra += !error ? '' : '\nerror: ' + error;

    // You can view the information in an alert to see things working like this:
    alert("Error: " + msg + "\nurl: " + url + "\nline: " + line + extra);

    // TODO: Report this error via ajax so you can keep track
    //       of what pages have JS issues

    let suppressErrorAlert = true;
    // If you return true, then error alerts (like in older versions of
    // Internet Explorer) will be suppressed.
    return suppressErrorAlert;
};


let options = {
    username: [
        {
            isValid: function (domElement) {
                return (domElement.length >= 3) && (domElement.length <= 16);
            },
            message: "Username length between 3 and 16 characters"
        },
        {
            isValid: function (domElement) {
                return /^[A-Za-z]+$/.test(domElement);
            },
            message: "The field should contain only letter. Numbers are not allowed"
        },
        {
            isValid: function (domElement) {
                let formData = new FormData();
                formData.append('login', domElement);
                fetch("/php/validateUsername.php", {
                    method: "POST",
                    datatype: JSON,
                    body: formData
                }).then(response => response.json().then(data => ({
                        data: data,
                        status: response.status
                    })
                    ).then(res => {
                        if (res.data['is'] === "true") {
                            document.getElementById("errorLogin").innerText += options.username[2].message + "\n"
                        }
                    })
                );

            },
            message: "Username is already in use"
        }
    ],
    password: [
        {
            isValid: function (domElement) {
                return domElement.length >= 6;
            },
            message: "Must be longer then 5 chars"
        }

    ],
    firstName: [
        {
            isValid: function (domElement) {
                return !domElement.includes(" ") && domElement !== "";
            },
            message: "Must be one word."
        }
    ],
    lastName: [
        {
            isValid: function (domElement) {
                return !domElement.includes(" ") && domElement !== "";
            },
            message: "Must be one word"
        }
    ],
    email: [
        {
            isValid: function (domElement) {
                return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(domElement);
            },
            message: "Not correct e-mail format"
        },
        {
            isValid: function (domElement) {
                let formData = new FormData();
                formData.append('email', domElement);
                fetch("/php/validateEmail.php", {
                    method: "POST",
                    datatype: JSON,
                    body: formData
                }).then(response => response.json().then(data => ({
                        data: data,
                        status: response.status
                    })
                    ).then(res => {
                        if(res.data['is'] === "true"){
                            document.getElementById("errorEM").innerText += options.email[1].message + "\n"
                        }
                    })
                );

            },
            message: "E-Mail is already in use"
        }
    ]
};

function validate(registrationForm) {
    cleanErrors();
    let isUser = true;
    let isPass = true;
    let isFN = true;
    let isLN = true;
    let isCEM = true;
    let isAEM = true;
    let isAUser = true;
    options.username[2].isValid(registrationForm.login.value);
    isAUser = document.getElementById("errorLogin").innerText === "";
    for (let i = 0; i < options.username.length-1; i++) {
        isUser = options.username[i].isValid(registrationForm.login.value);
        if (!isUser) {
            document.getElementById("errorLogin").innerText += options.username[i].message + "\n";
        }
    }
    for (let i = 0; i < options.password.length; i++) {
        isPass = options.password[i].isValid(registrationForm.password.value);
        if (!isPass) {
            document.getElementById("errorPassword").innerText += options.password[i].message + "\n";
        }
    }
    for (let i = 0; i < options.firstName.length; i++) {
        isFN = options.firstName[i].isValid(registrationForm.firstname.value);
        if (!isFN) {
            document.getElementById("errorFN").innerText += options.firstName[i].message + "\n";
        }
    }
    for (let i = 0; i < options.lastName.length; i++) {
        isLN = options.lastName[i].isValid(registrationForm.lastname.value);
        if (!isLN) {
            document.getElementById("errorLN").innerText += options.lastName[i].message + "\n";
        }
    }
        options.email[1].isValid(registrationForm.email.value);
        isAEM = document.getElementById("errorEM").innerText === "";
        console.log(isAEM);
        isCEM = options.email[0].isValid(registrationForm.email.value);
        console.log("Here");
        if(!isCEM) {
            document.getElementById("errorEM").innerText += options.email[0].message + "\n"
        }
        console.log(isUser && isAEM && isCEM && isFN && isLN && isPass);
    return isUser && isAEM && isCEM && isFN && isLN && isPass && isAUser;
}

function cleanErrors() {
    document.getElementById("errorLogin").innerText = "";
    document.getElementById("errorPassword").innerText = "";
    document.getElementById("errorFN").innerText = "";
    document.getElementById("errorLN").innerText = "";
    document.getElementById("errorEM").innerText = "";
}

