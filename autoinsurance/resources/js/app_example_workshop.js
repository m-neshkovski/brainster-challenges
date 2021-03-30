require('./bootstrap');

function add_user_to_table(user) {

    var actions = 'N/A';
    if ( user.role == 'student' ) {
        actions = `
        <button class="btn btn-info" data-toggle="modal" data-target="#EditUser" data-user-id="${user.id}">Edit</button>
        <button class="btn btn-danger" data-toggle="modal" data-target="#DeleteUser" data-user-id="${user.id}">Delete</button>
        `
    }

    $('#users tbody').prepend(`
        <tr data-user-id="${user.id}">
            <td>${user.id}</td>
            <td>${user.name}</td>
            <td>${user.email}</td>
            <td>${user.role}</td>
            <td>${actions}</td>
        </tr>
    `)
}

if( $('#users-list').length ) {

    axios.get('/api/users')
        .then(function (response) {
            var users = response.data

            $('#users tbody').html('');
            $(users).each(function(i, user) {
                add_user_to_table(user)
            })
        })
        .catch(function (error) {
            console.log(error);
        })

    $('#EditUser').on('show.bs.modal', function (event) {
        var clickedButton = $(event.relatedTarget)
        var id = clickedButton.attr('data-user-id')
        axios.get(`/api/users/${id}`)
            .then(res => {
                var user = res.data
                $('#EditUser #EditUserLabel').html(`Update ${user.name} details`)
                $('#EditUser #user-id').val(user.id)
                $('#EditUser #name').val(user.name)
                $('#EditUser #email').val(user.email)
            })
            .catch(err => {
                console.log('err', err)
            })
    })

    $('#update-user').on('click', function(event) {
        event.preventDefault();
        var id = $('#EditUser #user-id').val()
        var data = {
            name: $('#EditUser #name').val(),
            email: $('#EditUser #email').val(),
        }

        axios.post(`/api/users/${id}/update`, data)
            .then(res => {
                var user = res.data

                var actions = `
                    <button class="btn btn-info" data-toggle="modal" data-target="#EditUser" data-user-id="${user.id}">Edit</button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#DeleteUser" data-user-id="${user.id}">Delete</button>
                `
                $(`#users tbody tr[data-user-id="${user.id}"]`).html(`
                    <td>${user.id}</td>
                    <td>${user.name}</td>
                    <td>${user.email}</td>
                    <td>${user.role}</td>
                    <td>${actions}</td>
                `)

                $('#EditUser').modal('hide')
            })
            .catch(err => {
                var errors = err.response.data.errors

                $('#user-errors').html('')
                // Object.values(errors).forEach(function(fieldName) {
                //     $('#user-errors').append('<p>' + fieldName.join('. ') + '</p>')
                // })

                Object.keys(errors).forEach(function(fieldName) {
                    $('#' + fieldName).closest('.form-group').find('.errors').html('')
                    $('#' + fieldName).closest('.form-group').find('.errors').html( errors[fieldName].join('. ') )
                })
            })
    })


    $('#DeleteUser').on('show.bs.modal', function (event) {
        var clickedButton = $(event.relatedTarget)
        var id = clickedButton.attr('data-user-id')

        $('#delete-user-id').val(id)
    })

    $('#delete-user-button').on('click', function(event) {
        event.preventDefault();
        var id = $('#delete-user-id').val()

        axios.post(`/api/users/${id}/delete`)
            .then(res => {
                $('#DeleteUser').modal('hide')
                $(`#users tbody tr[data-user-id="${id}"]`).remove()
            })
            .catch(err => {
                console.log('err', err)
            })
    })

    $('#q').on('keyup', function(event) {
        var q = $('#q').val()

        if ( q && q.length > 0 ) {
            axios.get('/api/users/search/' + q)
                .then(response => {
                    var users = response.data

                    $('#users tbody').html('');

                    if( users.length > 0 ) {
                        $(users).each(function(i, user) {
                            add_user_to_table(user)
                        })
                    } else {
                        $('#users tbody').html(`
                            <tr colspan="5">
                                <td>No results found for <strong>${q}</strong></td>
                            </tr>
                        `)
                    }
                })
                .catch(err => {
                    console.log('err', err)
                })
        }
    })
}

