@extends('dashboard.dashboard-layouts.master')

@section('title')
    HM-Clinic
@stop
@section('content')
    <div class="content pb-0">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#profile" data-toggle="tab">
                                                <i class="material-icons"></i> Device Request
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#messages" data-toggle="tab">
                                                <i class="material-icons"></i> Device Request Done
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link btn" href="#messages" data-toggle="modal"
                                                data-target="#exampleModal-add">
                                                <i class="material-icons fa  fa-plus ">add</i> Add
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile">
                                    <div class="table-responsive ">
                                        <table class="table table1" id="table" data-toggle="table" data-search="true"
                                            data-pagination="true" data-toolbar="#toolbar">
                                            <thead class=" text-primary">
                                                <th data-sortable="true">First Name</th>
                                                <th>Last Name</th>
                                                <th>Phone</th>
                                                <th>Device Name</th>
                                                <th>Price</th>
                                                <th>Date & Time</th>
                                                <th>Move Request</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($datasToday as $dataToday)
                                                    <tr data-order="{{ $dataToday['patient']['id'] }}">
                                                        <td>{{ $dataToday['patient']['fname'] }}</td>
                                                        <td>{{ $dataToday['patient']['lname'] }}</td>
                                                        <td>{{ $dataToday['patient']['phone_number'] }}</td>
                                                        <td>{{ $dataToday['device']['name'] }}</td>
                                                        <td>{{ $dataToday['device']['price'] }}</td>
                                                        <td>{{ $dataToday['created_at'] }}</td>
                                                        <td class="icon">
                                                            <a class="material-symbols-outlined text-success accepted-order"
                                                                data-toggle="modal" data-target="#exampleModal-accepted"
                                                                aria-hidden="true"
                                                                data-order="{{ $dataToday['patient']['id'] }}">exit_to_app</a>
                                                        </td>
                                                        <td class="icon"><a
                                                                class="material-symbols-outlined text-warning "
                                                                data-toggle="modal" data-target="#exampleModal-update"
                                                                aria-hidden="true"
                                                                data-order="{{ $dataToday['patient']['id'] }}"
                                                                id="update-order">edit_square</a></td>
                                                        <td class="icon"><a href=""
                                                                class="material-symbols-outlined text-danger delete-order"
                                                                data-toggle="modal" data-target="#exampleModal-delete"
                                                                aria-hidden="true"
                                                                data-order="{{ $dataToday['patient']['id'] }}">delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>


                                        <!-- Start Modal Update -->
                                        <div class="modal fade" id="exampleModal-update" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content dark-edition">
                                                    <div class="modal-header  modal-border-bottom">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="updateForm">
                                                            <div class="row justify-content-center">
                                                                <input type="hidden"
                                                                    class="form-control"id="up_secretary_id">
                                                                <input type="hidden" id="up-order-id"name="id"
                                                                    class="form-control">

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">First
                                                                            Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            id="up-fname" name="fname" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Last
                                                                            Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            id="up-lname" name="lname" required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Phone:</label>
                                                                        <input type="tel" class="form-control"
                                                                            id="up_phone_number" name="phone_number"
                                                                            required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 form-group">
                                                                    <label>device:</label>
                                                                    <select id="up-device" class="form-control" required>

                                                                    </select>
                                                                </div>
                                                                <input type="hidden" class="form-control"
                                                                    name="device_id" id="up_device_id" required>

                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer modal-border-top">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal" onclick="cancel()">Close</button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-dismiss="modal" id="updateOrder">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Update -->

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" id="exampleModal-delete" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog small-size" role="document">
                                                <div class="modal-content dark-edition">
                                                    <div class="modal-header  modal-border-bottom">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are You Sure You Want To Delete?</p>
                                                        <form id="deleteForm">
                                                            <input type="hidden" id="del-order-id">
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer modal-border-top">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal" onclick="cancel()">No</button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-dismiss="modal" id="deleteOrder"
                                                            data-dismiss="modal">Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Delete -->

                                        <!-- Start Modal move request -->
                                        <div class="modal fade" id="exampleModal-accepted" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog small-size" role="document">
                                                <div class="modal-content dark-edition">
                                                    <div class="modal-header  modal-border-bottom">
                                                        <h5 class="modal-title" id="exampleModalLabel">move request</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are You Sure You Want To move request?</p>
                                                        <form id="acceptFrom">
                                                            <input type="hidden" value="1" id="status"
                                                                name="status">
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer modal-border-top">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal" onclick="cancel()">No</button>
                                                        <button type="button" class="btn btn-primary" id="accepted"
                                                            data-dismiss="modal">Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal move request -->
                                    </div>
                                </div>

                                <div class="tab-pane" id="messages">
                                    <div class="table-responsive ">
                                        <table class="table table2" id="table" data-toggle="table"
                                            data-search="true" data-pagination="true" data-toolbar="#toolbar">
                                            <thead class=" text-primary">
                                                <th data-sortable="true">Patient Name</th>
                                                <th>Device Name</th>
                                                <th>Device Price</th>
                                                <th>Doctor Name</th>
                                                <th>Secretary Name</th>
                                                <th>Date & Time</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($acceptances as $acceptance)
                                                    <tr>
                                                        {{-- <td>{{ $acceptance['patient']['id'] }}</td> --}}
                                                        <td>{{ $acceptance['patient']['fname'] }}
                                                            {{ $acceptance['patient']['lname'] }}</td>
                                                        <td>{{ $acceptance['device']['name'] }}</td>
                                                        <td>{{ $acceptance['device']['price'] }}</td>
                                                        </td>
                                                        <td>{{ $acceptance['doctor'] ? $acceptance['doctor']['fname'] : '_' }}
                                                            {{ $acceptance['doctor'] ? $acceptance['doctor']['lname'] : '' }}
                                                        </td>
                                                        <td>{{ $acceptance['secertary']['fname'] }}
                                                            {{ $acceptance['secertary']['lname'] }}</td>
                                                        <td>{{ $acceptance['created_at'] }}</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
  <!-- Start Modal Add -->
  <div class="modal fade" id="exampleModal-add" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content dark-edition">
          <div class="modal-header  modal-border-bottom">
              <h5 class="modal-title" id="exampleModalLabel">Add Request</h5>
              <button type="button" class="close" data-dismiss="modal"
                  aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form id="addFrom">
                  <div class="row justify-content-center">
                      <input type="hidden" class="form-control"id="secretary_id"
                          name="secretary_id">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="bmd-label-floating">First
                                  Name:</label>
                              <input type="text" class="form-control"
                                  id="fname" name="fname" required>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="bmd-label-floating">Last
                                  Name:</label>
                              <input type="text" class="form-control"
                                  id="lname" name="lname" required>
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="bmd-label-floating">Phone:</label>
                              <input type="tel" class="form-control"
                                  id="phone_number" name="phone_number"
                                  required>
                          </div>
                      </div>

                      <div class="col-md-6 form-group">
                          <label>device:</label>
                          <select id="device" name="device"
                              class="form-control" required>

                          </select>
                      </div>
                      <input type="hidden" class="form-control"
                          name="device_id" id="iddevice" required>

                      <input type="hidden" class="form-control"id="price"
                          name="price" required>

                  </div>
              </form>
          </div>
          <div class="modal-footer modal-border-top">
              <button type="button" class="btn btn-secondary"
                  data-dismiss="modal" onclick="cancel()">Close</button>
              <button type="button" class="btn btn-primary" id="addOrder"
                  data-dismiss="modal">Add</button>

          </div>
      </div>
  </div>
</div>
<!-- End Modal Add -->
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
        $(document).ready(function() {

            let secretary_id = '';

            let device = $('#device');
            let updevice = $('#updevice');
            console.log(device);

            $('select').mousemove(function() {
                $(this).find('.optionhidden').hide();
            });

            $.ajax({
                url: "{{ route('device_secretary.record') }}",
                type: 'GET',

                success: function(response) {
                    let options = '';
                    options += '<option class="optionhidden"></option>';
                    response.forEach(function(device) {
                        options += '<option class="lolo"  value="' + device.id +
                            '"  data-price="' + device.price + '">' +
                            device.name + '</option>';
                    });
                    $('#device').empty().append(options);
                    $('#up-device').empty().append(options);

                },
                error: function(xhr, status, error) {
                    console.error('Failed to fetch available times:', error);
                }
            });

            $('#device').on('change', function() {
                device = $(this).val();
                $('#iddevice').val(device);
                let selected_option = $(this).find('option:selected');
                let device_price = selected_option.data('price');
                $('#price').val(device_price);
            });

            $('#up-device').on('change', function() {
                device = $(this).val();
                $('#up_device_id').val(device);

                let selected_option = $(this).find('option:selected');
                let device_price = selected_option.data('price');
                $('#up-price').val(device_price);
            });

            $.ajax({
                url: "{{ route('secretary_id') }}",
                type: 'GET',

                success: function(response) {
                    secretary_id = response;
                    $('#secretary_id').val(response.secretary_id);
                    $('#up_secretary_id').val(response.secretary_id);
                },
                error: function(xhr, status, error) {
                    console.error('Failed to fetch available times:', error);
                }
            });


            //Add Appointment
            $(document).on('click', '#addOrder', function(e) {
                e.preventDefault();
                let form = $('#addFrom');

                let formData = new FormData($('#addFrom')[0]);
                console.log(formData);

                $.ajax({
                    type: "POST",
                    enctype: "multipart/form-data",
                    url: "{{ route('device_order.store') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success('The device has been added successfully.');
                            // Add new row in the table
                            console.log(response);

                            let newRow = `<tr data-order="${response.data.device_order.id}">

                            <td>${response.data.device_order.fname}</td>
                            <td>${response.data.device_order.lname}</td>
                            <td>${response.data.device_order.phone_number}</td>
                            <td>${response.data.device_name}</td>
                            <td>${response.data.device_price}</td>
                            <td>${response.data.created_at}</td>

                            <td class="icon">
                             <a class="material-symbols-outlined text-success accepted-order"
                               data-toggle="modal" data-target="#exampleModal-accepted"
                               aria-hidden="true"
                               data-order="${response.data.device_order.id}">exit_to_app</a>
                            </td>
                            <td class="icon"><a
                             class="material-symbols-outlined text-warning "
                             data-toggle="modal" data-target="#exampleModal-update"
                             aria-hidden="true" data-order="${response.data.device_order.id}"
                             id="update-order">edit_square</a></td>
                           <td class="icon"><a href=""
                             class="material-symbols-outlined text-danger delete-order"
                             data-toggle="modal" data-target="#exampleModal-delete"
                             aria-hidden="true"
                             data-order="${response.data.device_order.id}">delete</a>
                           </td>
                           </tr>`;
                            $(".no-records-found").remove();
                            $(".table1 tbody").append(newRow);
                            $("#device").val("");
                            form.find('input').not('#secretary_id').val('');
                        }

                    },

                    error: function(response) {
                        toastr.error('Please verify that the information entered is correct.');

                    }
                });
            });

            // accepted Appointment
            let orderId = '';
            $(document).on('click', '.accepted-order', function() {
                 orderId = $(this).data('order');
                $('#order-id').val(orderId);
                console.log(orderId);
            });
            $(document).on('click', '#accepted', function(e) {
                    e.preventDefault();
                    let acceptFormData = new FormData($('#acceptFrom')[0]);
                    $.ajax({
                        type: "post",
                        url: '/secretary/device_order/update/' + orderId,
                        data: acceptFormData,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log(response);
                            toastr.success('The operation was completed successfully.');
                            let newRow = '<tr>' +
                                '<td>' + response.data.device_order.fname + '</td>' +
                                '<td>' + response.data.device_order.lname + '</td>' +
                                '<td>' + response.data.device_order.phone_number +
                                '</td>' +
                                '<td>' + response.data.device_name + '</td>' +
                                '<td>' + response.data.device_price + '</td>' +
                                '<td>' + response.data.created_at + '</td>' +
                                '</tr>';
                                $(".no-records-found").remove();
                            $(".table2 tbody").append(newRow);

                            let rowToDelete = $(".table1 tbody tr[data-order='" +
                                response.data.device_order.id + "']");
                            rowToDelete.remove();
                        },
                        error: function(error) {
                            console.log(error);
                            toastr.error(
                                'There was an error executing the operation.');
                        }
                    });
                });

            // Show Appointment
            $(document).on('click', '#update-order', function() {
                let orderId = $(this).data('order');
                $('#up-order-id').val(orderId);
                console.log(orderId);

                $.ajax({
                    type: "GET",
                    url: '/secretary/device_order/show/' + orderId,
                    dataType: 'json',

                    success: function(response) {
                        $('#updateForm #up-fname').val(response.data.fname);
                        $('#updateForm #up-lname').val(response.data.lname);
                        $('#updateForm #up_phone_number').val(response.data.phone_number);
                        $('#updateForm #up_device_id').val(response.data.device_id);
                        $('#updateForm #up-price').val(response.data.device_price);
                        let updevice = $('#up_device_id').val();
                        $('#up-device option[value="' + updevice + '"]').prop('selected', true);

                    },
                    error: function(response) {

                    }
                });
            });

            // Update Appointment
            $(document).on('click', '#updateOrder', function(e) {
                e.preventDefault();
                // let orderId = $(this).data('order');
                let orderId = $('#up-order-id').val();
                console.log(orderId);

                let updateFormData = new FormData($('#updateForm')[0]);
                // console.log(updateFormData);

                $.ajax({
                    type: "POST",
                    enctype: "multipart/form-data",
                    url: '/secretary/device_order/edit/' + orderId,
                    data: updateFormData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(response) {
                        if (response.status == true) {
                            toastr.success('The device has been updated successfully.')

                            console.log(response);
                            let row = $(".table1 tbody tr[data-order='" + response.data
                                .device_order.id + "']");
                            row.find('td:eq(0)').text(response.data.device_order.fname);
                            row.find('td:eq(1)').text(response.data.device_order.lname);
                            row.find('td:eq(2)').text(response.data.device_order.phone_number);
                            row.find('td:eq(3)').text(response.data.device_name);
                            row.find('td:eq(4)').text(response.data.device_price);
                            row.find('td:eq(5)').text(response.data.created_at);
                        }
                    },
                    error: function(response) {
                        toastr.error('There was a problem displaying the data, please try again.');
                    }
                });
            });

            // Delete Appointment
            let deleteId = '';
            $(document).on('click', '.delete-order', function() {
                deleteId = $(this).data('order');
                $('#del-order-id').val(deleteId);
                console.log(deleteId);
            });
            $(document).on('click', '#deleteOrder', function() {

                let deleteFormData = new FormData($('#deleteForm')[0]);

                $.ajax({
                    type: "delete",
                    url: '/secretary/device_order/destroy/' + deleteId,
                    data: deleteFormData,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        toastr.success('The device has been Deleted successfully.');
                        $('tr[data-order="' + deleteId + '"]').remove();
                        deleteFormData = null;
                        deleteId = null;
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
            toastr.warning('The data has not been sent.');
            let form = $('#addFrom');
            $("#device").val("");
            form.find('input').not('#secretary_id').val('');
        }
    </script>
@endsection
