document.getElementById("filterForm").addEventListener('submit', function (event) {
    event.preventDefault();
    let formData = new FormData();
    let selector = document.getElementById('filterOptions');
    let value = selector[selector.selectedIndex].value;
    formData.append("filterOptions", value);
    let text = document.getElementById("fieldText").value;
    formData.append('fieldText', text);
    fetch("/php/filter.php", {
        method: "POST",
        datatype: JSON,
        body: formData
    }).then(response => response.json().then(data => ({
        data: data,
        status: response.status
    })).then(res =>  {
        console.log(res.data[0]);
        let tBody = document.getElementById("body");
        tBody.innerHTML = "";
        for (let i = 0; i < res.data.length; i++) {
            tBody.innerHTML += "<tr><td>" + res.data[i].login + "</td><td>" + res.data[i].password + "</td><td>" + res.data[i].firstname + "</td><td>" + res.data[i].lastname + "</td><td>" + res.data[i].email + "</td><td>" + res.data[i].role + "</td><td><img src='" + res.data[i].url + "' width='40' height='40' /></td><td> <button type=\"button\" class=\"btn btn-secondary\" data-toggle=\"modal\" data-target=\"#exampleModal" + res.data[i].id + "\"> Edit </button> <div id='exampleModal" + res.data[i].id + "' class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"> <div class='modal-dialog' role='document'> <div class='modal-content'> <div class=\"modal-header\"> <h5 class=\"modal-title\" id='exampleModal" + res.data[i].id + "'>Edit</h5> <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"> <span aria-hidden=\"true\">&times;</span> </button> </div> <div class=\"modal-body\"> <form method='post' action='php/changeAdmin.php' id='editForm' name=\"editForm\"> <input name='id' type='hidden' value='" + res.data[i].id + "'> <p> <label> Username <br> <input name='login' type='text' required value='" + res.data[i].login + "'> </label> </p> <p> <label> Password <br> <input name='password' type='password' required value='" + res.data[i].password + "'> </label> </p> <p> <label> First name <br> <input name='firstname' type='text' required value='" + res.data[i].firstname + "'> </label> </p> <p> <label> Last name <br> <input name='lastname' type='text' required value='" + res.data[i].lastname + "'> </label> </p> <p> <label> E-mail <br> <input name='e-mail' type='email' required value='" + res.data[i].email + "'> </label> </p> <p><label> Role <br> <select name=\"role\"> <option value=\"user\">user</option> <option value=\"admin\">admin</option> </select> </label></p> <p><label> Avatar url <br> <input type=\"text\" name=\"url\" placeholder=\"Enter avatar url\" required value='" + res.data[i].url + "'/> </label></p> <p><button name=\"submit\" type=\"submit\" value=\"Update\" class=\"btn btn-primary\" data-backdrop='static'>Update</button></p> </form> </div> </div> </div> </div</td></tr>";
        }

    }))
});

