require('./bootstrap');

var headers = {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
    // 'Authorization': 'Bearer ' + $('meta[name="api-token"]').attr('content')
}

function refreshVehicleTable() {
    // refresh dashboard data
    fetch('/api/vehicles', {
        method: 'GET',
        headers: headers,
    })
        .then(response => response.json())
        .then(data => {
            $('#vehicle-table tbody').html('');
            let index = 1;
            $.each(data.vehicles, function (key, vehicle) {
                let actions = `
                            <!-- Button trigger modal for edit -->
                            <button type="button" class="btn btn-secondary mb-3 update-vehicle" data-toggle="modal" data-target="#vehicleModal" data-action="/api/vehicles/${vehicle.id}" data-method="PATCH">
                                Edit
                            </button>
                            <!-- Button trigger modal for delete -->
                            <button type="button" class="btn btn-danger mb-3 delete-vehicle" data-toggle="modal" data-target="#vehicleModal" data-action="/api/vehicles/${vehicle.id}" data-method="DELETE">
                                Delete
                            </button>
                            `

                $('#vehicle-table tbody').append(`
                                <tr>
                                    <td>${index}</td>
                                    <td>${vehicle.brand}</td>
                                    <td>${vehicle.model}</td>
                                    <td>${vehicle.plate_number}</td>
                                    <td>${vehicle.insurance_date}</td>
                                    <td>${actions}</td>
                                </tr>
                            `);
                index++;
            });
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}

function modalSettings(options, vehicle = null) {
    // modal titile
    $('#vehicleModalLabel').text(options.modal_label);
    // modal button
    $('#submit_btn').text(options.submit_btn_label);
    // body of modal
    if (options.method != 'DELETE') {
        // modal body - essentially a form body
        $('#modal-body').html(`
         <div class="from-group mb-3">
             <label for="brand">Vehicle brand</label>
             <input type="text" id="brand" name="brand" class="form-control" placeholder="Enter brand please." value="${vehicle ? vehicle.brand : ''}">
             <div class="valid-feedback">
                 Looks good!
             </div>
             <div id="brand-invalid-message" class="invalid-feedback">
                 Error!
             </div>
         </div>
         <div class="from-group mb-3">
             <label for="model">Vehicle model</label>
             <input type="text" id="model" name="model" class="form-control"  placeholder="Enter model please." value="${vehicle ? vehicle.model : ''}">
             <div class="valid-feedback">
                 Looks good!
             </div>
             <div id="model-invalid-message" class="invalid-feedback">
                 Error!
             </div>
         </div>
         <div class="from-group mb-3">
             <label for="plate_number">Vehicle plate number</label>
             <input type="text" id="plate_number" name="plate_number" class="form-control"  placeholder="Enter plate number ex. KU-1234-AB" value="${vehicle ? vehicle.plate_number : ''}">
             <div class="valid-feedback">
                 Looks good!
             </div>
             <div id="plate_number-invalid-message" class="invalid-feedback">
                 Error!
             </div>
         </div>
         <div class="from-group mb-3">
             <label for="insurance_date">Vehicle insurance date</label>
             <input type="date" id="insurance_date" name="insurance_date" class="form-control"  placeholder="Enter insurance date please."  value="${vehicle ? vehicle.insurance_date : ''}">
             <div class="valid-feedback">
                 Looks good!
             </div>
             <div id="insurance_date-invalid-message" class="invalid-feedback">
                 Error!
             </div>
         </div>
     `);
    } else {
        $('#modal-body').html(`
                        <p>Are you shoure you want to delete this vehicle?</p>
                    `);
    }
    // form attributs
    $('#modal-form').attr('action', options.action);
    $('#modal-form').attr('method', options.method);

}

$(document).ready(function () {
    if ($('#dashboard')) {
        // list vehicles on dashboard
        refreshVehicleTable();
        // create new vehicle
        $('#add-vehicle').on('click', function (e) {
            e.preventDefault();
            let options = {
                modal_label: 'Add new vehicle',
                submit_btn_label: 'Add vehicle',
                action: $(e.target).attr('data-action'),
                method: $(e.target).attr('data-method'),
            }
            modalSettings(options)
            $('#vehicleModal').modal('show');
        });

        $('#modal-form').on('submit', function (e) {
            e.preventDefault();
            let url = $(e.target).attr('action');
            let method = $(e.target).attr('method');
            fetch(url, {
                method: method,
                headers: headers,
                body: JSON.stringify({
                    brand: $('#brand').val(),
                    model: $('#model').val(),
                    plate_number: $('#plate_number').val(),
                    insurance_date: $('#insurance_date').val(),
                })
            })
                .then(response => response.json())
                .then(data => {
                    let inputs = $('#modal-body input');
                    $.each(inputs, function (key, input) {
                        input.classList.remove('is-invalid');
                        input.classList.add('is-valid');
                    })
                    if (data.errors) {
                        $.each(data.errors, function (key, errors) {
                            console.log(key, errors)
                            $('#' + key).removeClass('is-valid');
                            $('#' + key).addClass('is-invalid');
                            let error_message_element = $('#' + key + '-invalid-message')
                            error_message = '';
                            errors.forEach(error => {
                                error_message += error + ' ';
                            });
                            error_message_element.text(error_message);
                        })
                    } else {
                        // close modal
                        $('#vehicleModal').modal('hide');
                        // refresh vehicles on dashboard
                        refreshVehicleTable();
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        });

        $(document).on('click', '.update-vehicle', function (e) {
            fetch($(e.target).attr('data-action'), {
                method: 'GET',
                headers: headers,
            })
                .then(response => response.json())
                .then(data => {
                    e.preventDefault();
                    let options = {
                        modal_label: 'Update existing vehicle',
                        submit_btn_label: 'Update vehicle',
                        action: $(e.target).attr('data-action'),
                        method: $(e.target).attr('data-method'),
                    }
                    modalSettings(options, data.vehicle)
                    $('#vehicleModal').modal('show');
                })
                .catch((error) => {
                    console.error('Error:', error);
                });


        })

        $(document).on('click', '.delete-vehicle', function (e) {
            e.preventDefault();
            let options = {
                modal_label: 'Delete existing vehicle?',
                submit_btn_label: 'Delete vehicle',
                action: $(e.target).attr('data-action'),
                method: $(e.target).attr('data-method'),
            }
            modalSettings(options)
            $('#vehicleModal').modal('show');
        });
    }
});