@extends('dashboard.dashboard-layouts.master')

@section('title')
    HM-Clinic
@stop

@section('content')
    <div class="content pb-0">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-primary-emp">
                            <h4 class="card-title ">The Doctors:</h4>
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
                                <table class="table table1" id="table" data-toggle="table" data-search="true"
                                    data-pagination="true" data-toolbar="#toolbar">
                                    <thead class=" text-primary">
                                        <th data-sortable="true">ID</th>
                                        <th>Photo</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>Specialize</th>
                                        <th>Phone</th>
                                        <th>Price</th>
                                        <th>Days</th>
                                        <th>Email</th>
                                        <th>Control</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody class="tbody" id="doctor-table-body">
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($doctors as $doctor)
                                            <tr class="tr">
                                                <td>{{ $i++ }}</td>
                                                <td><img src="{{ $doctor->photo }}" class="rounded-circle"
                                                        alt="Cinque Terre" width="50"  height="50"> </td>
                                                <td>{{ $doctor->fname }}</td>
                                                <td>{{ $doctor->lname }}</td>
                                                <td>{{ $doctor->gender }}</td>
                                                <td>{{ $doctor->birth }}</td>
                                                <td>{{ $doctor->specialization->name }}</td>
                                                <td>{{ $doctor->phone_number }}</td>
                                                <td>{{ $doctor->avarage_price }}</td>
                                                <td>
                                                    @foreach ($doctor->days as $day)
                                                        {{ $day->sub_name }}
                                                    @endforeach
                                                </td>
                                                <td>{{ $doctor->email }}</td>
                                                <td class="icon">
                                                    <a class="material-symbols-outlined text-warning update-doctor"
                                                        data-toggle="modal" data-target="#update-modal" aria-hidden="true"
                                                        data-id="{{ $doctor->id }}">
                                                        edit_square
                                                    </a>
                                                </td>
                                                <td class="icon"><a
                                                        class=" material-symbols-outlined text-danger delete-doctor"
                                                        data-toggle="modal" data-target="#delete-modal" aria-hidden="true"
                                                        data-id="{{ $doctor->id }}">delete</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                                <!-- Start Modal Add -->
                                <div class="modal fade " id="exampleModal-add" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content dark-edition">
                                            <div class="modal-header  modal-border-bottom">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Doctor</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="addFrom" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row justify-content-center">
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
                                                                <label>Gender:</label>
                                                                <select id="gender" name="gender" class="form-control ">
                                                                    <option hidden></option>
                                                                    <option value="female">Female</option>
                                                                    <option value="male">Male</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating ">Phone:</label>
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
                                                                <label class="bmd-label-floating">Price:</label>
                                                                <input type="tel" class="form-control"
                                                                    id="avarage_price" name="avarage_price">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 ">
                                                            <div class="form-group mt-1">
                                                                <label>Specialize:</label>
                                                                <select id="specialization_id" name="specialization_id"
                                                                    class="form-control ">
                                                                    <option hidden></option>
                                                                    <option value="1">cardiology</option>
                                                                    <option value="4">endocinology</option>
                                                                    <option value="2">neurology</option>
                                                                    <option value="3">psychology</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Average preview:</label>
                                                                <input type="tel" class="form-control"
                                                                    id="avarage_treatment" name="avarage_treatment">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Email:</label>
                                                                <input type="email" class="form-control"
                                                                    placeholder="name@example.com" id="email"
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
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Bio:</label>
                                                                <textarea class="form-control" id="bio" name="bio" rows="1"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                {{-- <label class="bmd-label-floating">Start Time:</label> --}}
                                                                <input type="hidden" class="form-control"
                                                                    id="start_time" name="start_time" value="10:00">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                {{-- <label class="bmd-label-floating">End Time:</label> --}}
                                                                <input type="hidden" class="form-control" id="end_time"
                                                                    name="end_time" value="14:00">
                                                            </div>
                                                        </div>

                                                        <div class="my-3 row w-100 justify-content-center">

                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input myCheckbox"
                                                                        type="checkbox" id="day-1" value="1"
                                                                        name="" data-index="1">Sun
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input myCheckbox"
                                                                        type="checkbox" id="day-2" value="2"
                                                                        name="" data-index="2">Mon
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input myCheckbox"
                                                                        type="checkbox" id="day-3" value="3"
                                                                        name="" data-index="3">Tue
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input myCheckbox"
                                                                        type="checkbox" id="day-4" value="4"
                                                                        name="" data-index="4">Wed
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input myCheckbox"
                                                                        type="checkbox" id="day-5" value="5"
                                                                        name="" data-index="5">Thu
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input myCheckbox"
                                                                        type="checkbox" id="day-6" value="6"
                                                                        name="" data-index="0">Fri
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input myCheckbox"
                                                                        type="checkbox" id="day-7" value="7"
                                                                        name="" data-index="0">Sat
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row w-100 justify-content-center">
                                                            <div class="form-check form-check-radio form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input remotely"
                                                                        type="radio"id="remotely" name="remotely"
                                                                        value="1"> Online
                                                                    <span class="circle">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-radio form-check-inline">
                                                                <label class="form-check-label clinic">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="clinic" name="remotely" value="0">
                                                                    Clinic
                                                                    <span class="circle">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer modal-border-top">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal" onclick="cancel()">Close</button>
                                                <button type="button" id="addDoctor" class="btn btn-primary"
                                                    data-dismiss="modal">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Add -->

                                <!-- Start Modal Update -->
                                <div class="modal fade " id="update-modal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content dark-edition">
                                            <div class="modal-header  modal-border-bottom">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Doctor</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="updateForm" method="POST" enctype="multipart/form-data">
                                                    <div class="row justify-content-center">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control" id="up-id"
                                                                    name="id">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">First Name:</label>
                                                                <input type="text" class="form-control" id="up-fname"
                                                                    name="fname">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Last Name:</label>
                                                                <input type="text" class="form-control" id="up-lname"
                                                                    name="lname">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Gender:</label>
                                                                <select id="up-gender" name="gender"
                                                                    class="form-control ">
                                                                    <option hidden></option>
                                                                    <option value="female">Female</option>
                                                                    <option value="male">Male</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating ">Phone:</label>
                                                                <input type="tel" class="form-control"
                                                                    id="up_phone_number" name="phone_number">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Birth:</label>
                                                                <input type="date" class="form-control" id="up-birth"
                                                                    name="birth">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Picture:</label>
                                                                <input type="file" class="form-control-file"
                                                                    id="up-photo" name="photo">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 ">
                                                            <div class="form-group mt-1">
                                                                <label>Specialize:</label>
                                                                <select id="upspecialization_id" name="specialization_id"
                                                                    class="form-control ">
                                                                    <option hidden></option>
                                                                    <option value="1">cardiology</option>
                                                                    <option value="4">endocinology</option>
                                                                    <option value="2">neurology</option>
                                                                    <option value="3">psychology</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Price:</label>
                                                                <input type="tel" class="form-control"
                                                                    id="up_avarage_price" name="avarage_price">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Average preview:</label>
                                                                <input type="number" class="form-control"
                                                                    id="up_avarage_treatment" name="avarage_treatment">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Email:</label>
                                                                <input type="email" class="form-control"
                                                                    placeholder="name@example.com" id="up-email"
                                                                    name="email">

                                                                <input type="hidden" class="form-control old-email"
                                                                    id="up-email" name="email">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Password:</label>
                                                                <input type="password" class="form-control"
                                                                    id="up-password" name="password">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Bio:</label>
                                                                <textarea class="form-control" id="up_bio" name="bio" rows="1"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                {{-- <label class="bmd-label-floating">Start Time:</label> --}}
                                                                <input type="hidden" class="form-control"
                                                                    id="up_start_time" name="start_time" value="10:00">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                {{-- <label class="bmd-label-floating">End Time:</label> --}}
                                                                <input type="hidden" class="form-control"
                                                                    id="up_end_time" name="end_time" value="14:00">

                                                            </div>
                                                        </div>


                                                        <div class="my-3 row w-100 justify-content-center">

                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input myCheckbox"
                                                                        type="checkbox" id="day-1" value="1"
                                                                        name="" data-index="1">Sun
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input myCheckbox"
                                                                        type="checkbox" id="day-2" value="2"
                                                                        name="" data-index="2">Mon
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input myCheckbox"
                                                                        type="checkbox" id="day-3" value="3"
                                                                        name="" data-index="3">Tue
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input myCheckbox"
                                                                        type="checkbox" id="day-4" value="4"
                                                                        name="" data-index="4">Wed
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input myCheckbox"
                                                                        type="checkbox" id="day-5" value="5"
                                                                        name="" data-index="5">Thu
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input myCheckbox"
                                                                        type="checkbox" id="day-6" value="6"
                                                                        name="" data-index="0">Fri
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input myCheckbox"
                                                                        type="checkbox" id="day-7" value="7"
                                                                        name="" data-index="0">Sat
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>


                                                        <div class="row w-100 justify-content-center">
                                                            <div class="form-check form-check-radio form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input"
                                                                        type="radio"id="up-remotely" name="remotely"
                                                                        value="1"> Online
                                                                    <span class="circle">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-radio form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="up-clinic" name="remotely" value="0">
                                                                    Clinic
                                                                    <span class="circle">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer modal-border-top">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal" onclick="cancel()">Close</button>
                                                <button type="button" id="updateDoctor" class="btn btn-primary"
                                                    data-dismiss="modal">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Update -->

                                <!-- Start Modal Delete -->
                                <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog"
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
                                                <input type="hidden" name="" id="del-id">
                                            </div>
                                            <div class="modal-footer modal-border-top">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal" onclick="cancel()">No</button>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal"
                                                    id="deleteDoctor">Yes</button>
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
    @endsection



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
                    url: '{{ route('doctors.ajax_index') }}',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        var tableBody = $('#doctor-table-body');
                        tableBody.empty(); // Clear existing rows
                        console.log(response);
                        $.each(response, function(index, doctor) {
                            var row = $('<tr>');
                            row.append($('<td>').text(index + 1));
                            row.append($('<td>').html('<img src="' + doctor.photo +
                                '" class="rounded-circle" alt="Cinque Terre" width="50" height="50">'
                            ));
                            row.append($('<td>').text(doctor.fname));
                            row.append($('<td>').text(doctor.lname));
                            row.append($('<td>').text(doctor.gender));
                            row.append($('<td>').text(doctor.birth));
                            row.append($('<td>').text(doctor.specialization.name));
                            row.append($('<td>').text(doctor.phone_number));
                            row.append($('<td>').text(doctor.avarage_price));

                            var daysColumn = $('<td>');
                            $.each(doctor.days, function(index, day) {
                                daysColumn.append(day.sub_name + ' ');
                            });
                            row.append(daysColumn);

                            row.append($('<td>').text(doctor.email));
                            row.append($('<td>').addClass('icon').html(
                                '<a class="material-symbols-outlined text-warning update-doctor"' +
                                ' data-toggle="modal" data-target="#update-modal" aria-hidden="true" data-id="' +
                                doctor.id + '">edit_square</a>'));

                            row.append($('<td>').addClass('icon').html(
                                '<a class="material-symbols-outlined text-danger delete-doctor" data-toggle="modal" data-target="#delete-modal" aria-hidden="true" data-id="' +
                                doctor.id + '">delete</a>'));

                            tableBody.append(row);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', error);
                    }
                });
            }




            $(document).ready(function() {
                console.log( $(" #up-password"))
                let days = ['days[0]', 'days[1]', 'days[2]', 'days[3]', 'days[4]', 'days[5]', 'days[6]'];
                $('.myCheckbox').on('change', function() {
                    let n = 0;
                    $('.myCheckbox:checked').each(function(index) {
                        $(this).attr('name', days[n]);
                        n++;
                    });
                });

                //Add doctor
                $(document).on('click', '#addDoctor', function(e) {
                    e.preventDefault();

                    let formData = new FormData($('#addFrom')[0]);
                    let birthVal = $("#birth").val();
                    let birth = moment(birthVal).format("MM/DD/YYYY");
                    formData.append("birth", birth);

                    $.ajax({
                        type: "POST",
                        enctype: "multipart/form-data",
                        url: "{{ route('doctors.store') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        cache: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        success: function(response) {
                            // location.reload();

                            if (response.status == true) {
                                toastr.success('The doctor has been added successfully.')
                                // Add new row in the table
                                console.log(response);
                                loadDoctors();
                                let newRow = `<tr>
                            <td>${response.data.doctor.id}</td>
                            <td><img src="${ response.data.doctor.photo }" class="rounded-circle"
                            alt="Cinque Terre" width="50"> </td>
                            <td>${response.data.doctor.fname}</td>
                            <td>${response.data.doctor.lname}</td>
                            <td>${response.data.doctor.gender}</td>
                            <td>${response.data.doctor.birth}</td>
                            <td>${response.data.doctor.specialization.name}</td>
                            <td>${response.data.doctor.phone_number}</td>
                            <td>${response.data.doctor.avarage_price}</td>

                            <td>${response.data.doctor.email}</td>


                            <td class="icon">
                              <a class="material-symbols-outlined text-warning update-doctor"
                                 data-toggle="modal" data-target="#update-modal" aria-hidden="true"
                                 data-id="${ response.data.doctor.id }">
                                 edit_square
                              </a>
                            </td>
                            <td class="icon"><a
                                  class=" material-symbols-outlined text-danger delete-doctor"
                                  data-toggle="modal" data-target="#delete-modal" aria-hidden="true"
                                  data-id="${ response.data.doctor.id }">delete</a></td>
                           </tr>`;
                                $(".no-records-found").remove();
                                $(".table1 tbody").append(newRow);
                                $("#addFrom input[type='text']").val('');
                                $("#addFrom input[type='tel']").val('');
                                $("#addFrom input[type='date']").val('');
                                $("#addFrom input[type='file']").val('');
                                $("#addFrom input[type='email']").val('');
                                $("#addFrom input[type='password']").val('');
                                $("#addFrom select").val('');
                                $("#addFrom textarea").val('');
                                $('.myCheckbox').prop('checked', false);
                                $('#clinic').prop('checked', false);
                                $('#remotely').prop('checked', false);
                            }
                        },
                        error: function(response) {
                            toastr.error('Please verify that the information entered is correct.');
                        }
                    });
                });

                // Show doctor
                $(document).ready(function() {
                    $(document).on('click', '.update-doctor', function() {
                        let id = $(this).data('id');

                        $.ajax({
                            type: "GET",
                            url: '/admin/doctor/show/doctor/' + id,
                            dataType: 'json',

                            success: function(response) {
                                console.log(response);
                                $('#updateForm #up-id').val(response[0].id);
                                $('#updateForm #up-fname').val(response[0].fname);
                                $('#updateForm #up-lname').val(response[0].lname);
                                $('#updateForm #up-gender').val(response[0].gender);
                                $('#updateForm #up_phone_number').val(response[0]
                                    .phone_number);
                                $('#updateForm #up-birth').val(response[0].birth);
                                $('#updateForm #up-email').val(response[0].email);
                                $('#updateForm #up_avarage_price').val(response[0]
                                    .avarage_price);
                                $('#updateForm #upspecialization_id').val(response[0]
                                    .specialization
                                    .id);
                                $('#updateForm #up_bio').val(response[0].bio);
                                $('#updateForm #up_avarage_treatment').val(response[0]
                                    .avarage_treatment);

                                $('.myCheckbox').prop('checked', false);
                                for (let i = 0; i < response[0].days.length; i++) {
                                    let dayId = response[0].days[i].id;
                                    console.log(dayId);
                                    $('#updateForm #day-' + dayId).prop('checked', true);

                                }

                                if (response[0].remotely == 0) {
                                    $('#up-clinic').prop('checked', true);
                                } else {
                                    $('#up-remotely').prop('checked', true);
                                }

                            },
                            error: function(response) {

                            }
                        });
                    });
                });

                // Update doctor
                $(document).on('click', '#updateDoctor', function(e) {
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

                    if (password == '') {
                        updateFormData.delete('password');
                    }
                    $.ajax({
                        type: "POST",
                        url: '/admin/doctor/update/' + id,
                        data: updateFormData,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            toastr.success('The doctor has been updated successfully.');
                            loadDoctors();
                            $("#up-password").val('');
                        },
                        error: function(error) {
                            console.log(error);
                            toastr.error('Please verify that the information entered is correct.');
                        }
                    });
                });

                // Delete doctor
                let id = '';
                $(document).on('click', '.delete-doctor', function() {
                    id = $(this).data('id');
                    $('#del-id').val(id);


                });
                // Delete doctor
                $(document).on('click', '#deleteDoctor', function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: "delete",
                        url: '/admin/doctor/destroy/' + id,
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
                                toastr.success('The doctor has been deleted successfully.');
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
