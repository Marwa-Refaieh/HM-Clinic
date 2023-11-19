@extends('dashboard.dashboard-layouts.master')
@section('title')
    HM-Clinic
@stop
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-lg-end justify-content-sm-center pr-4 mb-3">
                <button class="btn color-text col-2" data-toggle="modal" data-target="#exampleModal-addDevice">Add</button>
            </div>
            <div class="row justify-content-center">

                @foreach ($devices as $device)
                    <div class="col-xl-4 col-lg-6 col-sm-5">
                        <div class="card card-chart">
                            <div class="card-header card-header-image">
                                <img src="{{ $device->image }}" alt="" width="100%">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{ $device->name }}</h4>
                                <p class="card-category">{{ $device->description }}</p>
                            </div>
                            <div class="card-footer justify-content-between">
                                <div class="stats"><i class="material-icons fa fa-usd"></i>{{ $device->price }}</div>
                                <div class="stats">
                                    <i class="material-symbols-outlined text-warning update-device" data-toggle="modal"
                                        data-target="#exampleModal-updateDevice" aria-hidden="true"
                                        data-id="{{ $device->id }}">edit_square
                                    </i>
                                    <i class="material-symbols-outlined text-danger ml-2 delete-device" data-toggle="modal"
                                        data-target="#exampleModal-deleteDevice" aria-hidden="true"
                                        data-id="{{ $device->id }}">delete
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

            <!-- Start Modal Add -->
            <div class="modal fade" id="exampleModal-addDevice" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content dark-edition">
                        <div class="modal-header modal-border-bottom">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Add Device</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="addForm" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Price:</label>
                                            <input type="tel" class="form-control" id="price" name="price">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Picture:</label>
                                            <input type="file" class="form-control-file" id="image" name="image">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">About:</label>
                                            <input type="text" class="form-control" id="description" name="description">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                onclick="cancel()">Close</button>
                            <button type="button" class="btn btn-primary" id="addDevice" data-dismiss="modal">Add</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Add -->

            <!-- Start Modal Update -->
            <div class="modal fade" id="exampleModal-updateDevice" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content dark-edition">
                        <div class="modal-header modal-border-bottom">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Update Device</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" id="updateForm">
                                @csrf
                                <div class="row">
                                    <input type="hidden" class="form-control" id="up-id" name="id">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Name:</label>
                                            <input type="text" class="form-control" id="up-name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Price:</label>
                                            <input type="tel" class="form-control" id="up-price" name="price">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Picture:</label>
                                            <input type="file" class="form-control-file" id="up-image"
                                                name="image">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">About:</label>
                                            <input type="text" class="form-control" id="up-description"
                                                name="description">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                onclick="cancel()">Close</button>
                            <button type="button" class="btn btn-primary" id="updateDevice"
                                data-dismiss="modal">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Update -->

            <!-- Start Modal Delete -->
            <div class="modal fade" id="exampleModal-deleteDevice" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog small-size" role="document">
                    <div class="modal-content dark-edition">
                        <div class="modal-header modal-border-bottom">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Delete Device</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <div class="modal-body ">
                                <p class="text-white">Are You Sure To Delete?</p>
                                {{-- <input type="number" name="" id="del-id"> --}}
                            </div>
                        </div>
                        <div class="modal-footer modal-border-top">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                onclick="cancel()">Close</button>
                            <button type="button" class="btn btn-primary" id="deleteDevice"
                                data-dismiss="modal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Delete -->
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

            //Add Device
            $(document).on('click', '#addDevice', function(e) {
                e.preventDefault();
                let formData = new FormData($('#addForm')[0]);

                $.ajax({
                    type: "POST",
                    enctype: "multipart/form-data",
                    url: "{{ route('devices.store') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(response) {
                            location.reload();
                            toastr.success('The device has been added successfully.');
                        
                    },
                    error: function(response) {
                        toastr.error('Please verify that the information entered is correct.');
                    }
                });
            });

            // Show Device
            $(document).on('click', '.update-device', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: '/admin/device/show/' + id,
                    dataType: 'json',

                    success: function(response) {
                        $('#updateForm #up-id').val(response.id);
                        $('#updateForm #up-name').val(response.name);
                        $('#updateForm #up-price').val(response.price);
                        $('#updateForm #up-description').val(response.description);
                    },
                    error: function(response) {

                    }
                });
            });

            // Update Device
            $(document).on('click', '#updateDevice', function(e) {
                e.preventDefault();

                let id = $('#up-id').val();
                let updateFormData = new FormData($('#updateForm')[0]);

                $.ajax({
                    type: "POST",
                    url: '/admin/device/update/' + id,
                    data: updateFormData,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        location.reload();
                        toastr.success('The device has been updated successfully');
                    },
                    error: function(error) {
                        console.log(error);
                        location.reload();
                        toastr.error('Please verify that the information entered is correct.');
                    }
                });
            });

            // Delete Device
            $(document).on('click', '.delete-device', function() {
                let id = $(this).data('id');
                // Delete Device
                $(document).on('click', '#deleteDevice', function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: "delete",
                        url: '/admin/device/destroy/' + id,
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
                                toastr.success('The device has been deleted successfully');
                                location.reload();
                            }
                        },
                        error: function(error) {
                            location.reload();
                            console.log(error);
                            toastr.error(
                                'Sorry, the deletion process did not take place.');
                        }
                    });
                });

            });

        })


        function cancel() {
            toastr.warning('The data has not been sent.')
        }
    </script>
@endsection
