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
                                                <i class="material-icons"></i> Today's Appointments
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#messages" data-toggle="tab">
                                                <i class="material-icons"></i> All Appointments
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#emptyAppointments" data-toggle="tab">
                                                <i class="material-icons"></i> Call For Appointments
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link btn mr-2" href="#messages" data-toggle="modal"
                                                data-target="#patient-add">
                                                <i class="material-icons material-symbols-outlined ">add</i> Add
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn" href="#messages" data-toggle="modal"
                                                data-target="#patient-deleteAll">
                                                <i
                                                    class="material-icons material-symbols-outlined deleteAll-appointmentt">delete</i>Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile">
                                    <div class="table-responsive">
                                        <table class="table " id="table" data-toggle="table" data-search="true"
                                            data-pagination="true" data-toolbar="#toolbar">
                                            <thead class=" text-primary">
                                                <th data-sortable="true">ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Gender</th>
                                                <th>Birth</th>
                                                <th>Marital Status</th>
                                                <th>Address</th>
                                                <th>Phone Number</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Pricing</th>
                                                <th>Email</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </thead>
                                            <tbody class="tbody" id="appointments-table-body-today">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($patients as $patient)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $patient->fname }}</td>
                                                        <td>{{ $patient->lname }}</td>
                                                        <td>{{ $patient->gender }}</td>
                                                        <td>{{ $patient->birth }}</td>
                                                        <td>{{ $patient->marital_status }}</td>
                                                        <td>{{ $patient->address }}</td>
                                                        <td>{{ $patient->phone_number }}</td>
                                                        <td>{{ $patient->date }}</td>
                                                        <td>{{ $patient->time }}</td>
                                                        <td>{{ $patient->pricing }}</td>
                                                        <td>{{ $patient->email ? $patient->email : '-' }}</td>
                                                        <td class="icon"><a
                                                                class="material-symbols-outlined text-warning "
                                                                data-toggle="modal" data-target="#update-modal"
                                                                aria-hidden="true" data-appointment="{{ $patient->id }}"
                                                                id="update-appointment">edit_square</a>
                                                        </td>
                                                        <td class="icon"><a href="https://www.youtube.com/"
                                                                class="material-symbols-outlined text-danger delete-appointment"
                                                                data-toggle="modal" data-target="#delete-modal"
                                                                data-appointment="{{ $patient->id }}"
                                                                aria-hidden="true">delete</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

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
                                                        <form id="updateForm">
                                                            <div class="row">
                                                                <input type="hidden" class="form-control"id="up-id"
                                                                    name="doctor_id">

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating"> First
                                                                            Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            id="up-fname" name="fname">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Last
                                                                            Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            id="up-lname" name="lname">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Birth:</label>
                                                                        <input type="date" class="form-control"
                                                                            id="up-birth" name="birth">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
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

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Martial Statues:</label>
                                                                        <select id="up_marital_status"
                                                                            name="marital_status" class="form-control">
                                                                            <option hidden></option>
                                                                            <option value="single">Single</option>
                                                                            <option value="married">Married</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label> Address:</label>
                                                                        <select id="up-address" name="address"
                                                                            class="form-control">
                                                                            <option hidden></option>
                                                                            <option value="zahira">Zahira</option>
                                                                            <option value="bolivia">Bolivia</option>
                                                                            <option value="brazil">Brazil</option>
                                                                            <option value="chile">Chile</option>
                                                                            <option value="colombia">Colombia</option>
                                                                            <option value="ecuador">Ecuador</option>
                                                                            <option value="guyana">Guyana</option>
                                                                            <option value="paraguay">Paraguay</option>
                                                                            <option value="peru">Peru</option>
                                                                            <option value="suriname">Suriname</option>
                                                                            <option value="uruguay">Uruguay</option>
                                                                            <option value="venezuela">Venezuela</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">Phone Number:</label>
                                                                        <input type="tel" class="form-control"
                                                                            id="up_phone_number" name="phone_number">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Date:</label>
                                                                        <input type="date" class="form-control"
                                                                            id="up-date"name="date">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Time:</label>
                                                                        <select id="up-time" name="time"
                                                                            class="form-control">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" class="form-control"id="up-pricing"
                                                                    name="pricing">

                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer modal-border-top">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal" onclick="cancel()">Close</button>
                                                        <button type="button" id="updateAppointment"
                                                            class="btn btn-primary" data-dismiss="modal">Update</button>
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
                                                        <button type="button" class="btn btn-primary"
                                                            data-dismiss="modal" id="deleteAppointment">Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Delete -->
                                    </div>
                                </div>

                                <div class="tab-pane" id="messages">
                                    <div class="table-responsive">
                                        <table class="table " id="table" data-toggle="table" data-search="true"
                                            data-pagination="true" data-toolbar="#toolbar">
                                            <thead class=" text-primary">
                                                <th data-sortable="true">ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Gender</th>
                                                <th>Birth</th>
                                                <th>Marital Status</th>
                                                <th>Address</th>
                                                <th>Phone Number</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Pricing</th>
                                                <th>Email</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </thead>
                                            <tbody class="tbody" id="appointments-table-all">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($allPatients as $allPatient)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $allPatient->fname }}</td>
                                                        <td>{{ $allPatient->lname }}</td>
                                                        <td>{{ $allPatient->gender }}</td>
                                                        <td>{{ $allPatient->birth }}</td>
                                                        <td>{{ $allPatient->marital_status }}</td>
                                                        <td>{{ $allPatient->address }}</td>
                                                        <td>{{ $allPatient->phone_number }}</td>
                                                        <td>{{ $allPatient->date }}</td>
                                                        <td>{{ $allPatient->time }}</td>
                                                        <td>{{ $allPatient->pricing }}</td>
                                                        <td>{{ $allPatient->email ? $allPatient->email : '-' }}</td>
                                                        <td class="icon"><a
                                                                class="material-symbols-outlined text-warning "
                                                                data-toggle="modal" data-target="#update-modal-all"
                                                                aria-hidden="true"
                                                                data-appointmentall="{{ $allPatient->id }}"
                                                                id="update-appointment-all">edit_square</a>
                                                        </td>
                                                        <td class="icon"><a href=""
                                                                class="material-symbols-outlined text-danger delete-appointment-all"
                                                                data-toggle="modal" data-target="#delete-modal-all"
                                                                data-appointmentall="{{ $allPatient->id }}"
                                                                aria-hidden="true">delete</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <!-- Start Modal Update -->
                                        <div class="modal fade " id="update-modal-all" tabindex="-1" role="dialog"
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
                                                        <form id="updateFormAll">
                                                            <div class="row">
                                                                <input type="hidden" class="form-control"id="up-id"
                                                                    name="doctor_id">

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating"> First
                                                                            Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            id="up-fname" name="fname">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Last
                                                                            Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            id="up-lname" name="lname">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Birth:</label>
                                                                        <input type="date" class="form-control"
                                                                            id="up-birth" name="birth">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
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

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Martial Statues:</label>
                                                                        <select id="up_marital_status"
                                                                            name="marital_status" class="form-control">
                                                                            <option hidden></option>
                                                                            <option value="single">Single</option>
                                                                            <option value="married">Married</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label> Address:</label>
                                                                        <select id="up-address" name="address"
                                                                            class="form-control">
                                                                            <option hidden></option>
                                                                            <option value="zahira">Zahira</option>
                                                                            <option value="bolivia">Bolivia</option>
                                                                            <option value="brazil">Brazil</option>
                                                                            <option value="chile">Chile</option>
                                                                            <option value="colombia">Colombia</option>
                                                                            <option value="ecuador">Ecuador</option>
                                                                            <option value="guyana">Guyana</option>
                                                                            <option value="paraguay">Paraguay</option>
                                                                            <option value="peru">Peru</option>
                                                                            <option value="suriname">Suriname</option>
                                                                            <option value="uruguay">Uruguay</option>
                                                                            <option value="venezuela">Venezuela</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">Phone Number:</label>
                                                                        <input type="tel" class="form-control"
                                                                            id="up_phone_number" name="phone_number">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Date:</label>
                                                                        <input type="date" class="form-control"
                                                                            id="up-date"name="date">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Time:</label>
                                                                        <select id="up-time" name="time"
                                                                            class="form-control">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" class="form-control"id="up-pricing"
                                                                    name="pricing">

                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer modal-border-top">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal" onclick="cancel()">Close</button>
                                                        <button type="button" id="updateAppointmentAll"
                                                            class="btn btn-primary" data-dismiss="modal">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Update -->

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" id="delete-modal-all" tabindex="-1" role="dialog"
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
                                                        <input type="hidden" name="" id="del-id-all-all">
                                                    </div>
                                                    <div class="modal-footer modal-border-top">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal" onclick="cancel()">No</button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-dismiss="modal" id="deleteAppointmentAll">Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Delete -->



                                    </div>
                                </div>

                                <div class="tab-pane" id="emptyAppointments">
                                    <div class="table-responsive">

                                        <table class="table " id="table" data-toggle="table" data-search="true"
                                            data-pagination="true" data-toolbar="#toolbar">
                                            <thead class=" text-primary">
                                                <th data-sortable="true">ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Gender</th>
                                                <th>Birth</th>
                                                <th>Marital Status</th>
                                                <th>Address</th>
                                                <th>Phone Number</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Pricing</th>
                                                <th>Delete</th>
                                            </thead>
                                            <tbody class="tbody" id="appointments-table-delete">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($destroyPatients as $destroyPatient)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $destroyPatient->fname }}</td>
                                                        <td>{{ $destroyPatient->lname }}</td>
                                                        <td>{{ $destroyPatient->gender }}</td>
                                                        <td>{{ $destroyPatient->birth }}</td>
                                                        <td>{{ $destroyPatient->marital_status }}</td>
                                                        <td>{{ $destroyPatient->address }}</td>
                                                        <td>{{ $destroyPatient->phone_number }}</td>
                                                        <td>{{ $destroyPatient->date }}</td>
                                                        <td>{{ $destroyPatient->time }}</td>
                                                        <td>{{ $destroyPatient->pricing }}</td>

                                                        <td class="icon"><a href=""
                                                                class="material-symbols-outlined text-danger "
                                                                id="destroy" data-toggle="modal"
                                                                data-target="#delete-modal-all-clinic"
                                                                data-destroy="{{ $destroyPatient->id }}"
                                                                aria-hidden="true">delete</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" id="delete-modal-all-clinic" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <input type="hidden" name="" id="del-id-clinic">
                                                    </div>
                                                    <div class="modal-footer modal-border-top">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal" onclick="cancel()">No</button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-dismiss="modal"
                                                            id="deleteAppointmentDestroy">Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Delete -->
                                    </div>
                                </div>
                            </div>

                            <!-- Start Modal Add -->
                            <div class="modal fade" id="patient-add" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content dark-edition">
                                        <div class="modal-header  modal-border-bottom">
                                            <h5 class="modal-title" id="exampleModalLabel">Add New Appointment</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="addFrom">
                                                <div class="row">
                                                    <input type="hidden" class="form-control"
                                                        id="id"name="doctor_id">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating"> First Name:</label>
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
                                                            <label class="bmd-label-floating">Birth:</label>
                                                            <input type="date" class="form-control" id="birth"
                                                                name="birth">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Gender:</label>
                                                            <select id="gender" name="gender" class="form-control">
                                                                <option hidden></option>
                                                                <option value="female">Female</option>
                                                                <option value="male">Male</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Martial Statues:</label>
                                                            <select id="marital_status" name="marital_status"
                                                                class="form-control">
                                                                <option hidden></option>
                                                                <option value="single">Single</option>
                                                                <option value="married">Married</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> Address:</label>
                                                            <select id="address" name="address" class="form-control">
                                                                <option hidden></option>
                                                                <option value="zahira">Zahira</option>
                                                                <option value="bolivia">Bolivia</option>
                                                                <option value="brazil">Brazil</option>
                                                                <option value="chile">Chile</option>
                                                                <option value="colombia">Colombia</option>
                                                                <option value="ecuador">Ecuador</option>
                                                                <option value="guyana">Guyana</option>
                                                                <option value="paraguay">Paraguay</option>
                                                                <option value="peru">Peru</option>
                                                                <option value="suriname">Suriname</option>
                                                                <option value="uruguay">Uruguay</option>
                                                                <option value="venezuela">Venezuela</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">Phone Number:</label>
                                                            <input type="tel" class="form-control" id="phone_number"
                                                                name="phone_number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Date:</label>
                                                            <input type="date" class="form-control"
                                                                id="date"name="date">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Time:</label>
                                                            <select id="time" name="time" class="form-control">
                                                                <option value="" disabled selected hidden>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="form-control"
                                                        id="pricing"name="pricing">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                onclick="cancel()">Close</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal"
                                                id="addAppointment">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal Add -->

                            <!-- Start Modal Delete all -->
                            <div class="modal fade" id="patient-deleteAll" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog small-size" role="document">
                                    <div class="modal-content dark-edition">
                                        <div class="modal-header  modal-border-bottom">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete All </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row justify-content-center">
                                                <div class="col-10">
                                                    <p>Choose the day whose appointments you want to delete:</p>
                                                </div>
                                                <div class="col-8">
                                                    <form id="deleteAllForm">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Date:</label>
                                                            <input type="date" class="form-control" id="del-date"
                                                                name="date">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer modal-border-top">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                onclick="cancel()">Cancel</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal"
                                                id="deleteAllAppointment">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal Delete all -->

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
        function loadAppointmentsAll() {
            let url = window.location.href;
            let doctorId = url.substring(url.lastIndexOf('/') + 1);
            console.log(doctorId);
            $.ajax({
                url: '/secretary/appointment/index/clinic/all/' + doctorId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    let tableBody = $('#appointments-table-all');
                    tableBody.empty(); // Clear existing rows
                    console.log(response);

                    $.each(response.appointments, function(index, appointment) {
                        let row = $('<tr>');
                        row.append($('<td>').text(index + 1));
                        row.append($('<td>').text(appointment.fname));
                        row.append($('<td>').text(appointment.lname));
                        row.append($('<td>').text(appointment.gender));
                        row.append($('<td>').text(appointment.birth));
                        row.append($('<td>').text(appointment.marital_status));
                        row.append($('<td>').text(appointment.address));
                        row.append($('<td>').text(appointment.phone_number));
                        row.append($('<td>').text(appointment.date));
                        row.append($('<td>').text(appointment.time));
                        row.append($('<td>').text(appointment.pricing));
                        row.append($('<td>').text(appointment.email ? appointment.email : '-'));
                        row.append($('<td>').addClass('icon').html(
                            '<a class="material-symbols-outlined text-warning "' +
                            ' data-toggle="modal"  id="update-appointment-all" data-target="#update-modal-all" aria-hidden="true" data-appointmentall="' +
                            appointment.id + '">edit_square</a>'));

                        row.append($('<td>').addClass('icon').html(
                            '<a class="material-symbols-outlined text-danger delete-appointment-all" data-toggle="modal" data-target="#delete-modal-all" aria-hidden="true" data-appointmentall="' +
                            appointment.id + '">delete</a>'));

                        tableBody.append(row);
                    });
                },
                error: function(xhr, status, error) {
                    console.log('Error:', status);
                }
            });
        }

        function loadAppointmentsToday() {
            let url = window.location.href;
            let doctorId = url.substring(url.lastIndexOf('/') + 1);
            console.log(doctorId);
            $.ajax({
                url: '/secretary/appointment/index/clinic/' + doctorId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    let tableBody = $('#appointments-table-body-today');
                    tableBody.empty(); // Clear existing rows
                    console.log(response);

                    $.each(response.appointments, function(index, appointment) {
                        let row = $('<tr>');
                        row.append($('<td>').text(index + 1));
                        row.append($('<td>').text(appointment.fname));
                        row.append($('<td>').text(appointment.lname));
                        row.append($('<td>').text(appointment.gender));
                        row.append($('<td>').text(appointment.birth));
                        row.append($('<td>').text(appointment.marital_status));
                        row.append($('<td>').text(appointment.address));
                        row.append($('<td>').text(appointment.phone_number));
                        row.append($('<td>').text(appointment.date));
                        row.append($('<td>').text(appointment.time));
                        row.append($('<td>').text(appointment.pricing));
                        row.append($('<td>').text(appointment.email ? appointment.email : '-'));

                        row.append($('<td>').addClass('icon').html(
                            '<a class="material-symbols-outlined text-warning "' +
                            ' data-toggle="modal"  id="update-appointment" data-target="#update-modal" aria-hidden="true" data-appointment="' +
                            appointment.id + '">edit_square</a>'));

                        row.append($('<td>').addClass('icon').html(
                            '<a class="material-symbols-outlined text-danger delete-appointment" data-toggle="modal" data-target="#delete-modal" aria-hidden="true" data-appointment="' +
                            appointment.id + '">delete</a>'));

                        tableBody.append(row);
                    });
                },
                error: function(xhr, status, error) {
                    console.log('Error:', status);
                }
            });
        }

        function loadAppointmentsDelete() {
            let url = window.location.href;
            let doctorId = url.substring(url.lastIndexOf('/') + 1);
            console.log(doctorId);
            $.ajax({
                url: '/secretary/appointment/destroy_list/show/' + doctorId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    let tableBody = $('#appointments-table-delete');
                    tableBody.empty(); // Clear existing rows
                    console.log(response);

                    $.each(response.destroyPatients, function(index, appointment) {
                        let row = $('<tr>');
                        row.append($('<td>').text(index + 1));
                        row.append($('<td>').text(appointment.fname));
                        row.append($('<td>').text(appointment.lname));
                        row.append($('<td>').text(appointment.gender));
                        row.append($('<td>').text(appointment.birth));
                        row.append($('<td>').text(appointment.marital_status));
                        row.append($('<td>').text(appointment.address));
                        row.append($('<td>').text(appointment.phone_number));
                        row.append($('<td>').text(appointment.date));
                        row.append($('<td>').text(appointment.time));
                        row.append($('<td>').text(appointment.pricing))
                        row.append($('<td>').addClass('icon').html(
                            '<a class="material-symbols-outlined text-danger" id="destroy" data-toggle="modal" data-target="#delete-modal-all-clinic" aria-hidden="true" data-destroy="' +
                            appointment.id + '">delete</a>'));

                        tableBody.append(row);
                    });
                },
                error: function(xhr, status, error) {
                    console.log('Error:', status);
                }
            });
        }

        $(document).ready(function() {
            // loadAppointmentsAll();
            // loadAppointmentsToday();
            let url = window.location.href;
            let doctorId = url.substring(url.lastIndexOf('/') + 1);
            console.log(doctorId);
            $(' #id').val(doctorId);

            // request date / reponse time
            $('#date').on('input', function() {
                let selectedDate = $('#date').val();
                console.log(selectedDate);
                let timesSelect = $('#time');
                // console.log(timesSelect);
                timesSelect.empty();

                $.ajax({
                    url: '/time/' + doctorId,
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        date: selectedDate
                    },
                    success: function(response) {
                        response.forEach(times => {
                            const option = $('<option></option>').attr('value', times)
                                .text(times);
                            timesSelect.append(option);

                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to fetch available times:', error);
                    }
                });

            });

            // request date / reponse time / Update
            $('#up-date').on('input', function() {
                let selectedDate = $('#up-date').val();
                console.log(selectedDate);
                let timesSelect = $('#up-time');
                // console.log(timesSelect);
                timesSelect.empty();

                $.ajax({
                    url: '/time/' + doctorId,
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        date: selectedDate
                    },
                    success: function(response) {
                        response.forEach(times => {
                            const option = $('<option></option>').attr('value', times)
                                .text(times);
                            timesSelect.append(option);

                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to fetch available times:', error);
                    }
                });

            });

            // request date / reponse time / Update aLL
            $('#updateFormAll #up-date').on('input', function() {
                let selectedDate = $('#updateFormAll #up-date').val();
                console.log(selectedDate);
                let timesSelect = $('#updateFormAll #up-time');
                // console.log(timesSelect);
                timesSelect.empty();

                $.ajax({
                    url: '/time/' + doctorId,
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        date: selectedDate
                    },
                    success: function(response) {
                        response.forEach(times => {
                            const option = $('<option></option>').attr('value', times)
                                .text(times);
                            timesSelect.append(option);

                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to fetch available times:', error);
                    }
                });

            });

            // Pricing Appointment
            $.ajax({
                type: "GET",
                url: '/doctor/dashboard/price/' + doctorId,
                dataType: 'json',

                success: function(response) {
                    $('#pricing').val(response);
                    $('#up-pricing').val(response);
                    $('#updateFormAll #up-pricing').val(response);
                    console.log(response);

                },
                error: function(response) {

                }
            });

            //Add Appointment
            $(document).on('click', '#addAppointment', function(e) {
                e.preventDefault();

                let formData = new FormData($('#addFrom')[0]);

                let birthVal = $("#birth").val();
                let birth = moment(birthVal).format("MM/DD/YYYY");

                let dateVal = $("#date").val();
                let date = moment(dateVal).format("MM/DD/YYYY");

                formData.append("birth", birth);
                formData.append("date", date);

                $.ajax({
                    type: "POST",
                    enctype: "multipart/form-data",
                    url: "{{ route('appointment.store') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(response) {
                        if (response.status == true) {
                            toastr.success('The appointment has been added successfully.');
                            loadAppointmentsAll();
                            loadAppointmentsToday();
                            $("#addFrom #fname").val('');
                            $("#addFrom #lname").val('');
                            $("#addFrom #birth").val('');
                            $("#addFrom #phone_number").val('');
                            $("#addFrom #date").val('');
                            $("#addFrom #email").val('');
                            $("#addFrom select").val('');
                        }
                    },
                    error: function(response) {
                        @if (Auth::guard('secretary')->check())
                            toastr.error(
                                'Please verify that the information entered is correct.');
                        @else
                            toastr.error('You do not have permission to add an appointment.');
                        @endif
                    }

                });
            });

            // Show Appointment
            $(document).on('click', '#update-appointment', function() {
                let appointmentId = $(this).data('appointment');
                $('#up-id').val(appointmentId);

                $.ajax({
                    type: "GET",
                    url: '/secretary/appointment/show/dashboard/' + appointmentId,
                    dataType: 'json',

                    success: function(response) {
                        $('#updateForm #up-fname').val(response[0].fname);
                        $('#updateForm #up-lname').val(response[0].lname);
                        $('#updateForm #up-gender').val(response[0].gender);
                        $('#updateForm #up_phone_number').val(response[0].phone_number);
                        $('#updateForm #up-birth').val(response[0].birth);
                        $('#updateForm #up-date').val(response[0].date);
                        $('#updateForm #up-address').val(response[0].address);
                        $('#updateForm #up_marital_status').val(response[0].marital_status);
                        $('#updateForm #up-email').val(response[0].email);
                        $('#updateForm #up-time option').val(response[0].time);
                        let options = '';
                        for (let i = 0; i < response.length; i++) {
                            let time = moment(response[i].time, 'HH:mm:ss').format('hh:mm A');
                            options += '<option selected value="' + time + '">' + time +
                                '</option>';
                        }
                        $('#up-time').html(options);

                    },
                    error: function(response) {
                        @if (Auth::guard('secretary')->check())
                            toastr.error(
                                'There was a problem displaying the data, please try again.'
                                );
                        @else
                            toastr.error('You do not have permission.');
                        @endif
                    }
                });
            });

            // Show Appointment All
            $(document).on('click', '#update-appointment-all', function() {
                let appointmentId = $(this).data('appointmentall');
                $('#updateFormAll #up-id').val(appointmentId);

                $.ajax({
                    type: "GET",
                    url: '/secretary/appointment/show/dashboard/' + appointmentId,
                    dataType: 'json',

                    success: function(response) {
                        $('#updateFormAll #up-fname').val(response[0].fname);
                        $('#updateFormAll #up-lname').val(response[0].lname);
                        $('#updateFormAll #up-gender').val(response[0].gender);
                        $('#updateFormAll #up_phone_number').val(response[0].phone_number);
                        $('#updateFormAll #up-birth').val(response[0].birth);
                        $('#updateFormAll #up-date').val(response[0].date);
                        $('#updateFormAll #up-address').val(response[0].address);
                        $('#updateFormAll #up_marital_status').val(response[0].marital_status);
                        $('#updateFormAll #up-email').val(response[0].email);
                        $('#updateFormAll #up-time option').val(response[0].time);
                        let options = '';
                        for (let i = 0; i < response.length; i++) {
                            let time = moment(response[i].time, 'HH:mm:ss').format('hh:mm A');
                            options += '<option selected value="' + time + '">' + time +
                                '</option>';
                        }
                        $('#updateFormAll #up-time').html(options);
                    },
                    error: function(response) {
                        @if (Auth::guard('secretary')->check())
                            toastr.error(
                                'There was a problem displaying the data, please try again.'
                                );
                        @else
                            toastr.error('You do not have permission.');
                        @endif
                    }
                });
            });

            // Update Appointment
            $(document).on('click', '#updateAppointment', function(e) {
                e.preventDefault();

                let appointmentId = $('#up-id').val();

                let updateFormData = new FormData($('#updateForm')[0]);

                let birthVal = $("#up-birth").val();
                let birth = moment(birthVal).format("MM/DD/YYYY");
                updateFormData.append("birth", birth);


                let dateVal = $("#up-date").val();
                let date = moment(dateVal).format("MM/DD/YYYY");
                updateFormData.append("date", date);

                let timeVal = $("#up-time").val();
                var formattedTime = moment(timeVal, 'hh:mm A');

                if (formattedTime.isValid()) {
                    var formatted24hTime = formattedTime.format('HH:mm');
                    updateFormData.append("time", formatted24hTime);
                } else {
                    console.log('Invalid time format');
                }

                $.ajax({
                    type: "POST",
                    url: '/secretary/appointment/update/' + appointmentId,
                    data: updateFormData,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        toastr.success('The appointment has been updated successfully.');
                        loadAppointmentsAll();
                        loadAppointmentsToday();
                    },
                    error: function(error) {
                        console.log(error);
                        @if (Auth::guard('secretary')->check())
                            toastr.error(
                                'There was a problem displaying the data, please try again.'
                                );
                        @else
                            toastr.error('You do not have permission.');
                        @endif
                    }
                });
            });

            // Update Appointment All
            $(document).on('click', '#updateAppointmentAll', function(e) {
                e.preventDefault();

                let appointmentId = $('#updateFormAll #up-id').val();
                console.log(appointmentId);

                let updateFormDataAll = new FormData($('#updateFormAll')[0]);

                let birthVal = $("#updateFormAll #up-birth").val();
                let birth = moment(birthVal).format("MM/DD/YYYY");
                updateFormDataAll.append("birth", birth);


                let dateVal = $("#updateFormAll #up-date").val();
                let date = moment(dateVal).format("MM/DD/YYYY");
                updateFormDataAll.append("date", date);

                let timeVal = $("#updateFormAll #up-time").val();
                var formattedTime = moment(timeVal, 'hh:mm A');

                if (formattedTime.isValid()) {
                    var formatted24hTime = formattedTime.format('HH:mm');
                    updateFormDataAll.append("time", formatted24hTime);

                } else {
                    console.log('Invalid time format');
                }

                $.ajax({
                    type: "POST",
                    url: '/secretary/appointment/update/' + appointmentId,
                    data: updateFormDataAll,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        toastr.success('The appointment has been updated successfully.');
                        loadAppointmentsAll();
                        loadAppointmentsToday();
                    },
                    error: function(error) {
                        console.log(error);
                        @if (Auth::guard('secretary')->check())
                            toastr.error(
                                'There was a problem displaying the data, please try again.'
                                );
                        @else
                            toastr.error('You do not have permission.');
                        @endif
                    }
                });
            });

            // Delete Appointment
            let appointmentId = '';
            $(document).on('click', '.delete-appointment', function() {
                appointmentId = $(this).data('appointment');
                $('#del-id').val(appointmentId);
            });
            // Delete Appointment
            $(document).on('click', '#deleteAppointment', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "delete",
                    url: '/secretary/appointment/destroy/' + appointmentId,
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

                        toastr.success('The appointment has been Deleted successfully.');
                        loadAppointmentsAll();
                        loadAppointmentsToday();
                    },
                    error: function(error) {

                        console.log(error);
                        @if (Auth::guard('secretary')->check())
                            toastr.error('Sorry, the deletion process did not take place.');
                        @else
                            toastr.error('You do not have permission.');
                        @endif
                    }
                });
            });

            // Delete All ALL Appointment
            let appointmentIdAllall = '';
            $(document).on('click', '.delete-appointment-all', function() {
                appointmentIdAllall = $(this).data('appointmentall');
                $('#del-id-all-all').val(appointmentIdAllall);
                console.log(appointmentIdAllall);
            });
            // Delete All ALL Appointment
            $(document).on('click', '#deleteAppointmentAll', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "delete",
                    url: '/secretary/appointment/destroy/' + appointmentIdAllall,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {

                        toastr.success('The appointment has been Deleted successfully');
                        loadAppointmentsAll();
                        loadAppointmentsToday();
                    },
                    error: function(error) {
                        console.log(error);
                        @if (Auth::guard('secretary')->check())
                            toastr.error('Sorry, the deletion process did not take place.');
                        @else
                            toastr.error('You do not have permission.');
                        @endif
                    }
                });
            });


            // Delete All Appointment
            $(document).on('click', '#deleteAllAppointment', function(e) {
                e.preventDefault();

                let deleteFormData = new FormData($('#deleteAllForm')[0]);
                console.log(doctorId);

                $.ajax({
                    type: "POST",
                    enctype: "multipart/form-data",
                    url: '/secretary/appointment/destroy_list/' + doctorId,
                    data: deleteFormData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(response) {
                        console.log(response);
                        toastr.success('The appointment has been Deleted successfully');
                        // location.reload();
                        loadAppointmentsDelete();
                        loadAppointmentsAll();
                        loadAppointmentsToday();

                    },
                    error: function(xhr, status, error) {
                        @if (Auth::guard('secretary')->check())
                            toastr.error('Sorry, the deletion process did not take place.');
                        @else
                            toastr.error('You do not have permission.');
                        @endif
                    }
                });
            });

            // Delete Appointment phone
            let destroy = '';
            $(document).on('click', '#destroy', function() {
                destroy = $(this).data('destroy');
                console.log(destroy);
                $('#del-id-clinic').val(destroy);
            });
            // Delete Appointment phone
            $(document).on('click', '#deleteAppointmentDestroy', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "delete",
                    url: '/secretary/appointment/destroy/' + destroy,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {

                        toastr.success('The appointment has been Deleted successfully');
                        loadAppointmentsAll();
                        loadAppointmentsToday();
                        loadAppointmentsDelete();
                    },
                    error: function(error) {
                        console.log(error);
                        @if (Auth::guard('secretary')->check())
                            toastr.error('Sorry, the deletion process did not take place.');
                        @else
                            toastr.error('You do not have permission.');
                        @endif
                    }
                });
            });
        })



        function cancel() {
            toastr.warning('The data has not been sent.');
        }
    </script>
@endsection
