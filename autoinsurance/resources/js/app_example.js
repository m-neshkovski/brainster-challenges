require('./bootstrap');

var headers = {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
    'Authorization': 'Bearer ' + $('meta[name="api-token"]').attr('content')
}

// Show the create user form

$('#btn-new-user').on('click', function() {
    $('#users-new').slideToggle()
})

// Load users on homepage
fetch('/api/users/', {
    method: 'GET', // or 'PUT'
    headers: headers,
    // body: JSON.stringify(data),
})
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        $.each(data, function(key, user) {
            $('#users-list tbody').append(`
                <tr>
                    <td>${user.id}</td>
                    <td>${user.name}</td>
                    <td>${user.email}</td>
                    <td><button type="button" class="btn btn-info edit-user-btn" data-user-id="${user.id}">Edit</button></td>
                </tr>
            `)
        })
    })
    .catch((error) => {
        console.error('Error:', error);
    });

$('#users-new').on('submit', function(event) {
    event.preventDefault();

    var action = $(this).attr('action')

    fetch(action, {
        method: 'POST',
        headers: headers,
        body: JSON.stringify({
            name: $(this).find('input[name="name"]').val(),
            email: $(this).find('input[name="email"]').val(),
            password: $(this).find('input[name="password"]').val(),
        }),
    })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);

            if (data.errors) {
                var poraka = ''
                $.each(data.errors, function(fieldName, fieldErrorArr) {
                    poraka = poraka + `${fieldName} errors: ` + fieldErrorArr.join('. ')
                })
                alert(poraka)
            } else {
                $('#users-list tbody').prepend(`
                    <tr>
                        <td>${data.id}</td>
                        <td>${data.name}</td>
                        <td>${data.email}</td>
                    </tr>
                `)
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
})

// $('.edit-user-btn').on('click', function(event) {
//     console.log('proba')
// })

$('#users-list').on('click', '.edit-user-btn', function(event) {
    var user_id = $(this).attr('data-user-id');

    $.ajax({
        type: 'GET',
        url: '/api/users/' + user_id,
        contentType: 'application/json',
        headers: headers,
    }).done(function (data) {
        $('#users-update input[name="id"]').val(data.id)
        $('#users-update input[name="name"]').val(data.name)
        $('#users-update input[name="email"]').val(data.email)
    }).fail(function (msg) {
        console.log('FAIL', msg);
    });
    // var tr = $(this).closest('tr')

    // $('#users-update input[name="id"]').val(tr.find('td').eq(0).text())
    // $('#users-update input[name="name"]').val(tr.find('td').eq(1).text())
    // $('#users-update input[name="email"]').val(tr.find('td').eq(2).text())

    $('#users-update').show()
})

$('#users-update').on('submit', function(event) {
    event.preventDefault();

    var action = $(this).attr('action') + '/' + $(this).find('input[name="id"]').val()

    $.ajax({
        type: 'PUT',
        url: action,
        contentType: 'application/json',
        data: JSON.stringify({
            name: $(this).find('input[name="name"]').val(),
            email: $(this).find('input[name="email"]').val(),
        }),
    }).done(function (data) {
        console.log('SUCCESS', data);
    }).fail(function (msg) {
        console.log('FAIL', msg);
    }).always(function (msg) {
        console.log('ALWAYS', msg);
    });
})

