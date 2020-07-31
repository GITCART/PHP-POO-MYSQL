function init() {
    getAllUsers();
}

function getAllUsers() {
    $.ajax({
        type: "GET",
        url: "ajax/UsuarioAjax.php",
        data: { action: "listUser" },
        success: function(data) {
            let dataJson = JSON.parse(data);
            let template = "";

            dataJson.forEach(element => {
                template += `<tr>
                                <th scope="row">${element.id}</th>
                                <td>${element.username}</td>
                                <td>${element.password}</td>
                                <td>${element.email}</td>
                                <td>
                                    <button onclick="deleteUser(${element.id})" class="btn btn-danger">Delete</button>
                                    <button onclick="getUser(${element.id})" class="btn btn-success">Update</button>
                                </td>
                            </tr>`
            });

            $("#dataList").html(template);
        }
    });
}

function createUser() {
    let email = $("#email").val();
    let password = $("#password").val();
    let username = $("#username").val();

    let userData = {
        username,
        password,
        email
    };

    let user = JSON.stringify(userData);

    $.ajax({
        type: "POST",
        url: "ajax/UsuarioAjax.php",
        data: { action: "insertUser", user },
        success: function(data) {
            console.log('lo que recibo en js', data);
            getAllUsers();
        }
    });
}

function getUser(id) {
    $.ajax({
        type: "GET",
        url: "ajax/UsuarioAjax.php",
        data: { action: "oneUser", id },
        success: function(data) {
            let response = JSON.parse(data);
            $('#modalUser').modal('show');
            $('#emailM').val(response[0].email);
            $('#idM').val(response[0].id);
            $('#passwordM').val(response[0].password);
            $('#usernameM').val(response[0].username);
        }
    });
}

function udpateUser() {
    let id = $("#idM").val();
    let email = $("#emailM").val();
    let password = $("#passwordM").val();
    let username = $("#usernameM").val();

    let userData = {
        id,
        username,
        password,
        email
    };

    let user = JSON.stringify(userData);

    $.ajax({
        type: "POST",
        url: "ajax/UsuarioAjax.php",
        data: { action: "updateUser", user },
        success: function(data) {
            $('#modalUser').modal('hide');
            getAllUsers();
        }
    });
}

function deleteUser(id) {
    $.ajax({
        type: "POST",
        url: "ajax/UsuarioAjax.php",
        data: { action: "deleteUser", id },
        success: function(data) {
            if (data) {
                getAllUsers();
            }
        }
    });
}


init();