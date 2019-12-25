var isIncrease = [0,0,0,0,0,0,0,0,0,0];

$(document).ready(function () {
    jQuery.ajax({
        url: "/api/users",
        type: "GET",
        success: function (result) {
            var responseData = JSON.parse(result);
            $("#userEmails").html(responseData.currentRole == "admin" ? formAdminTableFromResponseData(responseData.usersList) : formTableFromResponseData(responseData.usersList));
        }
    });
});

function formAdminTableFromResponseData(responseData) {
    if (responseData.length == 0) {
        return "<h1>Users wasn't found</h1>"
    } else {
        var tableData = "<table class='table' id='table'>";
        tableData += getAdminTableHeader();
        tableData += "<tbody>";
        for (var i = 0; i < responseData.length; i++) {
            tableData += "<tr id='user-" + responseData[i].id + "'>";
            tableData += "<td><input class='hiddenInput' type='text' name='firstname' id='" + responseData[i].id + "' value='" + responseData[i].firstName + "'></td>";
            tableData += "<td><input class='hiddenInput' type='text' name='secondname' id='" + responseData[i].id + "' value='" + responseData[i].secondName + "'></td>";
            tableData += "<td>" + responseData[i].role + "</td>";
            tableData += "<td><input class='hiddenInput' type='text' name='email' id='" + responseData[i].id + "' value='" + responseData[i].email + "'></td>";
            tableData += "<td><input class='hiddenInput' type='text' name='password' id='" + responseData[i].id + "' value='" + responseData[i].password + "'></td>";
            tableData += "<td><img style='max-height: 5em; max-width: 5em;' name='avatar' class='rounded' id='" + responseData[i].id + "' src='controllers/avatarsController.php?avatar=" + responseData[i].avatar + "'></td>";
            tableData += "<td><button id='buttonRemove' class='bg-danger' name='" + responseData[i].id + "' value='" + responseData[i].email + "'>Delete</button></td>";
            tableData += "</tr>";
        }
        tableData += "</tbody>";
        tableData += "</table>";
        return tableData;
    }
}

function sortTable(cellNum){
    let sortedRows;
    let slicedRows = Array.from(table.rows).slice(1);
    if(isIncrease[cellNum]==1){
        isIncrease[cellNum]=0;
        sortedRows = slicedRows
        .sort((rowA, rowB) => rowA.cells[cellNum].innerHTML > rowB.cells[cellNum].innerHTML ? 1 : -1);
    } else {
        isIncrease[cellNum]=1;
        sortedRows = slicedRows
        .sort((rowA, rowB) => rowA.cells[cellNum].innerHTML < rowB.cells[cellNum].innerHTML ? 1 : -1);
    }
    table.tBodies[0].append(...sortedRows);
}

function formTableFromResponseData(responseData) {
    if (responseData.length == 0) {
        return "<h1>Users wasn't found</h1>"
    } else {
        var tableData = "<table class='table' id='table'>";
        tableData += getTableHeader();
        tableData += "<tbody>";
        for (var i = 0; i < responseData.length; i++) {
            tableData += "<tr>";
            tableData += "<td>" + responseData[i].firstName + "</td>";
            tableData += "<td>" + responseData[i].secondName + "</td>";
            tableData += "<td>" + responseData[i].role + "</td>";
            tableData += "<td>" + responseData[i].email + "</td>";
            tableData += "<td><img style='max-height: 5em; max-width: 5em;' name='avatar' class='rounded' id='" + responseData[i].id + "' src='controllers/avatarsController.php?avatar=" + responseData[i].avatar + "'></td>";
            tableData += "</tr>";
        }
        tableData += "</tbody>";
        tableData += "</table>";
        return tableData;
    }
}

function getAdminTableHeader() {
    return '<thead class="thead-dark">' +
        '<tr>' +
        '<th  onclick="sortTable(0)">First name</th>' +
        '<th onclick="sortTable(1)">Second name</th>' +
        '<th onclick="sortTable(2)">Role</th>' +
        '<th onclick="sortTable(3)">Email</th>' +
        '<th onclick="sortTable(4)">Password</th>' +
        '<th></th>' +
        '<th><input type="text" id="search-text" onkeyup=\'tableSearch()\' placeholder="search"></th>' +
        '<th></th>' +
        '</tr>' +
        '</thead>';
}

function getTableHeader() {
    return '<thead class="thead-dark">' +
        '<tr>' +
        '<th onclick="sortTable(0)">First name</th>' +
        '<th onclick="sortTable(1)">Second name</th>' +
        '<th onclick="sortTable(2)">Role</th>' +
        '<th onclick="sortTable(3)">Email</th>' +
        '<th><input type="text" id="search-text" onkeyup=\'tableSearch()\' placeholder="search"></th>' +
        '</tr>' +
        '</thead>';
}

function tableSearch() {
    var phrase = document.getElementById('search-text');
    var table = document.getElementById('table');
    var regPhrase = new RegExp(phrase.value, 'i');
    var flag = false;
    for (var i = 1; i < table.rows.length; i++) {
        flag = false;
        for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
            flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
            if (flag) break;
        }
        if (flag) {
            table.rows[i].style.display = "";
        } else {
            table.rows[i].style.display = "none";
        }

    }
}