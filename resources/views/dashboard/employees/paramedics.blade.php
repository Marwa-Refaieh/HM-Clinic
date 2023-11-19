@extends('dashboard.dashboard-layouts.master')

@section('title')
    HM-Clinic
@stop

@section('content')
    <div class="content pb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div class="card-header card-header-primary-emp">
                            <h4 class="card-title ">The Paramedics</h4>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link btn mr-2" href="#" data-toggle="modal"
                                        data-target="#exampleModal-add">
                                        <i class="material-icons material-symbols-outlined ">add</i> Add
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table " id="table" data-toggle="table" data-search="true"
                                    data-pagination="true" data-toolbar="#toolbar">
                                    <thead class=" text-primary">
                                        <th data-sortable="true">ID</th>
                                        <th>Photo</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th>Birth</th>
                                        <th>Email</th>
                                        <th>Control</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody class="tbody" id="paramedic-table-body">
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($paramedics as $paramedic)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td><img src="{{ $paramedic->photo }}" class="rounded-circle"
                                                        alt="Cinque Terre" width="50"> </td>
                                                <td>{{ $paramedic->fname }}</td>
                                                <td>{{ $paramedic->lname }}</td>
                                                <td>{{ $paramedic->gender }}</td>
                                                <td>{{ $paramedic->phone_number }}</td>
                                                <td>{{ $paramedic->birth }}</td>
                                                <td>{{ $paramedic->email }}</td>
                                                <td class="icon"><a
                                                        class="material-symbols-outlined text-warning update-paramedic"
                                                        data-toggle="modal" data-target="#exampleModal-update"
                                                        aria-hidden="true" data-id="{{ $paramedic->id }}">edit_square</a>
                                                </td>
                                                <td class="icon"><a href="https://www.youtube.com/"
                                                        class="material-symbols-outlined text-danger delete-paramedic"
                                                        data-toggle="modal" data-target="#exampleModal-delete"
                                                        aria-hidden="true" data-id="{{ $paramedic->id }}">delete</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Start Modal Add -->
                                <div class="modal fade" id="exampleModal-add" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content dark-edition">
                                            <div class="modal-header modal-border-bottom">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Paramedic</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="addForm2" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">First Name:</label>
                                                                <input type="text" class="form-control" id="fname"
                                                                    name="fname">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Last Name:</label>
                                                                <input type="text" class="form-control" id="lname"
                                                                    name="lname">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Gender:</label>
                                                                <select id="gender" name="gender" class="form-control gender">
                                                                    <option hidden></option>
                                                                    <option value="female">Female</option>
                                                                    <option value="male">Male</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Phone:</label>
                                                                <input type="tel" class="form-control" id="phone_number"
                                                                    name="phone_number">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Birth:</label>
                                                                <input type="date" class="form-control" id="birth"
                                                                    name="birth">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Picture:</label>
                                                                <input type="file" class="form-control-file"
                                                                    id="photo" name="photo">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Car:</label>
                                                                <input type="tel" class="form-control"
                                                                    id="car_number" name="car_number">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Email:</label>
                                                                <input type="email" class="form-control" id="email"
                                                                    name="email">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Password:</label>
                                                                <input type="password" class="form-control"
                                                                    id="password" name="password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal" onclick="cancel()">Close</button>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal"
                                                    id="addParamedic">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Add -->

                                <!-- Start Modal Update -->
                                <div class="modal fade" id="exampleModal-update" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content dark-edition">
                                            <div class="modal-header modal-border-bottom">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="updateForm" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control" id="up-id"
                                                                    name="id">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">First Name:</label>
                                                                <input type="text" class="form-control" id="up-fname"
                                                                    name="fname">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Last Name:</label>
                                                                <input type="text" class="form-control" id="up-lname"
                                                                    name="lname">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Gender:</label>
                                                                <select id="up-gender" name="gender"
                                                                    class="form-control">
                                                                    <option hidden></option>
                                                                    <option value="female">Female</option>
                                                                    <option value="male">Male</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Phone:</label>
                                                                <input type="tel" class="form-control"
                                                                    id="up-phone_number" name="phone_number">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Birth:</label>
                                                                <input type="date" class="form-control" id="up-birth"
                                                                    name="birth">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Picture:</label>
                                                                <input type="file" class="form-control-file"
                                                                    id="up-photo" name="photo" value=" ">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Email:</label>
                                                                <input type="email" class="form-control" id="up-email"
                                                                    name="email">
                                                                <input type="hidden" class="form-control old-email"
                                                                    id="up-email" name="email">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Password:</label>
                                                                <input type="password" class="form-control"
                                                                    id="up-password" name="password">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal" onclick="cancel()">Close</button>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal"
                                                    id="updateParamedic">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Update -->

                                <!-- Start Modal Delete -->
                                <div class="modal fade" id="exampleModal-delete" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog delete small-size" role="document">
                                        <div class="modal-content dark-edition">
                                            <div class="modal-header modal-border-bottom">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are You Sure To Delete?</p>
                                                <input type="hidden" name="" id="del-id">

                                            </div>
                                            <div class="modal-footer modal-border-top">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal" onclick="cancel()">No</button>
                                                <button type="button" class="btn btn-primary " id="deleteParamedic"
                                                    data-dismiss="modal">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Delete -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        function loadDoctors() {
            $.ajax({
                url: "{{ route('paramedic.index_ajax') }}",
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var tableBody = $('#paramedic-table-body');
                    tableBody.empty();
                    console.log(response);
                    $.each(response, function(index, paramedic) {
                        var row = $('<tr>');
                        row.append($('<td>').text(index + 1));
                        row.append($('<td>').html('<img src="' + paramedic.photo +
                            '" class="rounded-circle" alt="Cinque Terre" width="50" height="50">'
                            ));
                        row.append($('<td>').text(paramedic.fname));
                        row.append($('<td>').text(paramedic.lname));
                        row.append($('<td>').text(paramedic.gender));
                        row.append($('<td>').text(paramedic.phone_number));
                        row.append($('<td>').text(paramedic.birth));
                        row.append($('<td>').text(paramedic.email));
                        row.append($('<td>').addClass('icon').html(
                            '<a class="material-symbols-outlined text-warning update-paramedic"' +
                            ' data-toggle="modal" data-target="#exampleModal-update" aria-hidden="true" data-id="' +
                            paramedic.id + '">edit_square</a>'));

                        row.append($('<td>').addClass('icon').html(
                            '<a class="material-symbols-outlined text-danger delete-paramedic" data-toggle="modal" data-target="#exampleModal-delete" aria-hidden="true" data-id="' +
                            paramedic.id + '">delete</a>'));

                        tableBody.append(row);
                    });
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        }

        $(document).ready(function() {
            // loadDoctors();

            //Add Paramedic
            $(document).on('click', '#addParamedic', function(e) {
                e.preventDefault();
                let formData = new FormData($('#addForm2')[0]);

                let birthVal = $("#birth").val();
                let birth = moment(birthVal).format("MM/DD/YYYY");
                formData.append("birth", birth);

                $.ajax({
                    type: "POST",
                    enctype: "multipart/form-data",
                    url: "{{ route('paramedic.store') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(response) {

                        if (response.status == true) {
                            toastr.success('The paramedic has been added successfully.')
                            console.log(response);
                            loadDoctors();
                            let newRow = `<tr>
                            <td>${response.data.id}</td>
                            <td><img src="${ response.data.photo }" class="rounded-circle"
                            alt="Cinque Terre" width="50"> </td>
                            <td>${response.data.fname}</td>
                            <td>${response.data.lname}</td>
                            <td>${response.data.gender}</td>
                            <td>${response.data.birth}</td>
                            <td>${response.data.phone_number}</td>
                            <td>${response.data.email}</td>

                            <td class="icon">
                              <a class="material-symbols-outlined text-warning update-paramedic"
                                 data-toggle="modal" data-target="#exampleModal-update" aria-hidden="true"
                                 data-id="${ response.data.id }">
                                 edit_square
                              </a>
                            </td>
                            <td class="icon"><a
                                  class=" material-symbols-outlined text-danger delete-paramedic"
                                  data-toggle="modal" data-target="#exampleModal-delete" aria-hidden="true"
                                  data-id="${ response.data.id }">delete</a></td>
                           </tr>`;
                            $(".no-records-found").remove();
                            $(".table1 tbody").append(newRow);
                            $("#addForm2 input").val('');
                            $("select.gender").val('');
                        }

                    },
                    error: function(response) {
                        toastr.error('Please verify that the information entered is correct.');
                    }
                });
            });

            // Show Paramedic
            $(document).on('click', '.update-paramedic', function() {
                let id = $(this).data('id');
                console.log(id);
                $.ajax({
                    type: "GET",
                    url: '/admin/paramedic/show/' + id,
                    dataType: 'json',

                    success: function(response) {
                        console.log(response)
                        $('#updateForm #up-id').val(response.paramedic.id);
                        $('#updateForm #up-fname').val(response.paramedic.fname);
                        $('#updateForm #up-lname').val(response.paramedic.lname);
                        $('#updateForm #up-gender').val(response.paramedic.gender);
                        $('#updateForm #up-phone_number').val(response.paramedic.phone_number);
                        $('#updateForm #up-birth').val(response.paramedic.birth);
                        $('#updateForm #up-email').val(response.paramedic.email);
                        // $('#updateForm #up-password').val(response.paramedic.password);
                    },
                    error: function(response) {

                    }
                });
            });

            // Update Paramedic
            $(document).on('click', '#updateParamedic', function(e) {
                e.preventDefault();

                let id = $('#up-id').val();
                var email = $('#up-email').val();
                var oldEmail = $('.old-email').val();
                var password = $('#up-password').val();

                if (email === oldEmail) {
                    $('#up-email').prop('disabled', true);
                    $('.old-email').prop('disabled', true);
                } else {
                    $('.old-email').prop('disabled', true);
                }
                let updateFormData = new FormData($('#updateForm')[0]);
                let birthVal = $("#up-birth").val();
                let birth = moment(birthVal).format("MM/DD/YYYY");
                updateFormData.append("birth", birth);
                $('#up-email').prop('disabled', false);
                // $('#updateForm #up-password').val('');
                if (password == '') {
                    updateFormData.delete('password');
                }


                $.ajax({
                    type: "POST",
                    url: '/admin/paramedic/update/' + id,
                    data: updateFormData,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        toastr.success('The paramedic has been updated successfully.');
                        loadDoctors();
                        $("#up-password").val('');
                    },
                    error: function(error) {
                        console.log(error);
                        toastr.error('Please verify that the information entered is correct.');
                    }
                });
            });

            // Delete Paramedic
            let id = '';
            $(document).on('click', '.delete-paramedic', function() {
                id = $(this).data('id');
                $('#del-id').val(id);
                console.log(id);
            });
            $(document).on('click', '#deleteParamedic', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "delete",
                    url: '/admin/paramedic/destroy/' + id,
                    data: {
                        id: id
                    },
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {

                        if (response.status == 'success') {
                            toastr.success('The paramedic has been deleted successfully.');
                            loadDoctors();
                        }
                    },
                    error: function(error) {
                        console.log(error);
                        toastr.error(
                            'Sorry, the deletion process did not take place.');
                    }
                });
            });
        })

        function cancel() {
            toastr.warning('The data has not been sent.')
        }
    </script>
@endsection
