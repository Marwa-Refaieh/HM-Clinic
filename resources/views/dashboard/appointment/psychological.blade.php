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
                                                <i class="material-icons"></i> Remotly
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#messages" data-toggle="tab">
                                                <i class="material-icons"></i> In Clinic
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#allRemotly" data-toggle="tab">
                                                <i class="material-icons"></i> All Remotly
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#allClinic" data-toggle="tab">
                                                <i class="material-icons"></i> All Clinic
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
                                                data-target="#exampleModal-DeleteAll">
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
                                    <div class="table-responsive ">
                                        <table class="table " id="table" data-toggle="table" data-search="true"
                                            data-pagination="true" data-toolbar="#toolbar">
                                            <thead class=" text-primary">
                                                <th data-sortable="true">ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Gender</th>
                                                <th>Age</th>
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
                                            <tbody id="appointments-table-body-today-remotly">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($patients_remotly as $patient_remotly)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $patient_remotly->fname }}</td>
                                                        <td>{{ $patient_remotly->lname }}</td>
                                                        <td>{{ $patient_remotly->gender }}</td>
                                                        <td>{{ $patient_remotly->birth }}</td>
                                                        <td>{{ $patient_remotly->marital_status }}</td>
                                                        <td>{{ $patient_remotly->address }}</td>
                                                        <td>{{ $patient_remotly->phone_number }}</td>
                                                        <td>{{ $patient_remotly->date }}</td>
                                                        <td>{{ $patient_remotly->time }}</td>
                                                        <td>{{ $patient_remotly->pricing }}</td>
                                                        <td>{{ $patient_remotly->email }}</td>
                                                        <td class="icon"><a
                                                                class="material-symbols-outlined text-warning "
                                                                data-toggle="modal"
                                                                data-target="#exampleModal-update-online" aria-hidden="true"
                                                                id="update-appointment-remotly"
                                                                data-appointmentremotly="{{ $patient_remotly->id }}">edit_square</a>
                                                        </td>
                                                        <td class="icon"><a href=""
                                                                class="material-symbols-outlined text-danger delete-appointment-remotly"
                                                                data-toggle="modal"
                                                                data-target="#exampleModal-delete-online" aria-hidden="true"
                                                                data-appointmentremotly="{{ $patient_remotly->id }}">delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- Start Modal Update -->
                                        <div class="modal fade" id="exampleModal-update-online" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content dark-edition">
                                                    <div class="modal-header  modal-border-bottom">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add New
                                                            Appointment</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="updateFormRemotly">
                                                            <div class="row">
                                                                <input type="hidden"
                                                                    class="form-control"id="up_id_remotly"
                                                                    name="doctor_id">

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating"> First
                                                                            Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            id="up_fname_psycholo_remotly" name="fname">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Last
                                                                            Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            id="up_lname_psycholo_remotly" name="lname">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Birth:</label>
                                                                        <input type="date" class="form-control"
                                                                            id="up_birth_psycholo_remotly" name="birth">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Gender:</label>
                                                                        <select id="up_gender_psycholor_remotly"
                                                                            name="gender" class="form-control ">
                                                                            <option hidden></option>
                                                                            <option value="female">Female</option>
                                                                            <option value="male">Male</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Martial Statues:</label>
                                                                        <select id="up_status_psycholo_remotly"
                                                                            name="marital_status" class="form-control">
                                                                            <option hidden></option>
                                                                            <option value="single">Single</option>
                                                                            <option value="married">Married</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label> Address:</label>
                                                                        <select id="up_address_psycholo_remotly"
                                                                            name="address" class="form-control">
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
                                                                            id="up_phone_psycholo_remotly"
                                                                            name="phone_number">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Email:</label>
                                                                        <input type="email" class="form-control "
                                                                            id="upemail" name="email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Date:</label>
                                                                        <input type="date" class="form-control"
                                                                            id="up_date_psycholo_remotly"name="date">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Time:</label>
                                                                        <select id="up_time_psycholo_remotly"
                                                                            name="time" class="form-control">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden"
                                                                    class="form-control"id="up_pricing_remotly"
                                                                    name="pricing">


                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal" onclick="cancel()">Close</button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-dismiss="modal"
                                                            id="updateAppointmentRemotly">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Update -->

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" id="exampleModal-delete-online" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog small-size" role="document">
                                                <div class="modal-content dark-edition">
                                                    <div class="modal-header  modal-border-bottom">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are You Sure To Delete?</p>
                                                        <input type="hidden" id="del-id-remotly" class="form-control">

                                                    </div>
                                                    <div class="modal-footer modal-border-top">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal" onclick="cancel()">No</button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-dismiss="modal"
                                                            id="deleteAppointmentRemotly">Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Delete -->
                                    </div>
                                </div>

                                <div class="tab-pane" id="messages">
                                    <div class="table-responsive ">
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
                                            <tbody id="appointments-table-body-today">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($patients_clinic as $patient_clinic)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $patient_clinic->fname }}</td>
                                                        <td>{{ $patient_clinic->lname }}</td>
                                                        <td>{{ $patient_clinic->gender }}</td>
                                                        <td>{{ $patient_clinic->birth }}</td>
                                                        <td>{{ $patient_clinic->marital_status }}</td>
                                                        <td>{{ $patient_clinic->address }}</td>
                                                        <td>{{ $patient_clinic->phone_number }}</td>
                                                        <td>{{ $patient_clinic->date }}</td>
                                                        <td>{{ $patient_clinic->time }}</td>
                                                        <td>{{ $patient_clinic->pricing }}</td>
                                                        <td>{{ isset($patient_clinic->email) ? $patient_clinic->email : '-' }}
                                                        <td class="icon"><a
                                                                class="material-symbols-outlined text-warning "
                                                                data-toggle="modal" data-target="#exampleModal-update"
                                                                aria-hidden="true"
                                                                data-appointment="{{ $patient_clinic->id }}"
                                                                id="update-appointment">edit_square</a></td>
                                                        <td class="icon"><a href=""
                                                                class="material-symbols-outlined text-danger delete-appointment"
                                                                data-toggle="modal" data-target="#exampleModal-delete"
                                                                aria-hidden="true"
                                                                data-appointment="{{ $patient_clinic->id }}">delete</a>
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
                                                        <h5 class="modal-title" id="exampleModalLabel">Add New
                                                            Appointment</h5>
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
                                                                            id="up_fname_psycholo" name="fname">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Last
                                                                            Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            id="up_lname_psycholo" name="lname">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Birth:</label>
                                                                        <input type="date" class="form-control"
                                                                            id="up_birth_psycholo" name="birth">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Gender:</label>
                                                                        <select id="up_gender_psycholor" name="gender"
                                                                            class="form-control ">
                                                                            <option hidden></option>
                                                                            <option value="female">Female</option>
                                                                            <option value="male">Male</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Martial Statues:</label>
                                                                        <select id="up_status_psycholo"
                                                                            name="marital_status" class="form-control">
                                                                            <option hidden></option>
                                                                            <option value="single">Single</option>
                                                                            <option value="married">Married</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label> Address:</label>
                                                                        <select id="up_address_psycholo" name="address"
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
                                                                            id="up_phone_psycholo" name="phone_number">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Email:</label>
                                                                        <input type="email" class="form-control "
                                                                            id="up_email_psycholo" name="email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Date:</label>
                                                                        <input type="date" class="form-control"
                                                                            id="up_date_psycholo"name="date">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Time:</label>
                                                                        <select id="up_time_psycholo" name="time"
                                                                            class="form-control">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" class="form-control"id="up-pricing"
                                                                    name="pricing">

                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal" onclick="cancel()">Close</button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-dismiss="modal" id="updateAppointment">Update</button>
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
                                                        <input type="hidden" id="del-id" class="form-control">
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

                                <div class="tab-pane" id="allRemotly">
                                    <div class="table-responsive ">
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
                                            <tbody id="appointments-table-all-remotly">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($patients_remotly_all as $patient_remotly_all)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $patient_remotly_all->fname }}</td>
                                                        <td>{{ $patient_remotly_all->lname }}</td>
                                                        <td>{{ $patient_remotly_all->gender }}</td>
                                                        <td>{{ $patient_remotly_all->birth }}</td>
                                                        <td>{{ $patient_remotly_all->marital_status }}</td>
                                                        <td>{{ $patient_remotly_all->address }}</td>
                                                        <td>{{ $patient_remotly_all->phone_number }}</td>
                                                        <td>{{ $patient_remotly_all->date }}</td>
                                                        <td>{{ $patient_remotly_all->time }}</td>
                                                        <td>{{ $patient_remotly_all->pricing }}</td>
                                                        <td>{{ isset($patient_remotly_all->email) ? $patient_remotly_all->email : '-' }}
                                                        </td>
                                                        <td class="icon"><a
                                                                class="material-symbols-outlined text-warning "
                                                                data-toggle="modal" data-target="#exampleModal-update-all"
                                                                aria-hidden="true"
                                                                data-appointmentall="{{ $patient_remotly_all->id }}"
                                                                id="update-appointment-all">edit_square</a></td>
                                                        <td class="icon"><a href=""
                                                                class="material-symbols-outlined text-danger delete-appointment-all"
                                                                data-toggle="modal" data-target="#exampleModal-delete-all"
                                                                aria-hidden="true"
                                                                data-appointmentall="{{ $patient_remotly_all->id }}">delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        <!-- Start Modal Update -->
                                        <div class="modal fade" id="exampleModal-update-all" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content dark-edition">
                                                    <div class="modal-header  modal-border-bottom">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add New
                                                            Appointment</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="updateFormAll">
                                                            <div class="row">
                                                                <input type="hidden" class="form-control"id="up_id_all"
                                                                    name="doctor_id">

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating"> First
                                                                            Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            id="up_fname_psycholo_all" name="fname">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Last
                                                                            Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            id="up_lname_psycholo_all" name="lname">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Birth:</label>
                                                                        <input type="date" class="form-control"
                                                                            id="up_birth_psycholo_all" name="birth">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Gender:</label>
                                                                        <select id="up_gender_psycholor_all"
                                                                            name="gender" class="form-control ">
                                                                            <option hidden></option>
                                                                            <option value="female">Female</option>
                                                                            <option value="male">Male</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Martial Statues:</label>
                                                                        <select id="up_status_psycholo_all"
                                                                            name="marital_status" class="form-control">
                                                                            <option hidden></option>
                                                                            <option value="single">Single</option>
                                                                            <option value="married">Married</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label> Address:</label>
                                                                        <select id="up_address_psycholo_all"
                                                                            name="address" class="form-control">
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
                                                                            id="up_phone_psycholo_all"
                                                                            name="phone_number">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Email:</label>
                                                                        <input type="email" class="form-control "
                                                                            id="up_email_all" name="email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Date:</label>
                                                                        <input type="date" class="form-control"
                                                                            id="up_date_psycholo_all"name="date">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Time:</label>
                                                                        <select id="up_time_psycholo_all" name="time"
                                                                            class="form-control">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden"
                                                                    class="form-control"id="up_pricing_all"
                                                                    name="pricing">


                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal" onclick="cancel()">Close</button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-dismiss="modal" id="updateAppointmentAll">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Update -->

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" id="exampleModal-delete-all" tabindex="-1"
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
                                                        <input type="hidden" name="" id="del-id-all"
                                                            class="form-control">
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

                                <div class="tab-pane" id="allClinic">
                                    <div class="table-responsive ">
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
                                            <tbody id="appointments-table-all">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($patients_clinic_all as $patient_clinic_all)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $patient_clinic_all->fname }}</td>
                                                        <td>{{ $patient_clinic_all->lname }}</td>
                                                        <td>{{ $patient_clinic_all->gender }}</td>
                                                        <td>{{ $patient_clinic_all->birth }}</td>
                                                        <td>{{ $patient_clinic_all->marital_status }}</td>
                                                        <td>{{ $patient_clinic_all->address }}</td>
                                                        <td>{{ $patient_clinic_all->phone_number }}</td>
                                                        <td>{{ $patient_clinic_all->date }}</td>
                                                        <td>{{ $patient_clinic_all->time }}</td>
                                                        <td>{{ $patient_clinic_all->pricing }}</td>
                                                        <td>{{ isset($patient_clinic_all->email) ? $patient_clinic_all->email : '-' }}
                                                        </td>
                                                        <td class="icon"><a
                                                                class="material-symbols-outlined text-warning "
                                                                data-toggle="modal"
                                                                data-target="#exampleModal-update-all-clinic"
                                                                aria-hidden="true"
                                                                data-appointmentallclinic="{{ $patient_clinic_all->id }}"
                                                                id="update-appointment-all-clinic">edit_square</a></td>
                                                        <td class="icon"><a href=""
                                                                class="material-symbols-outlined text-danger delete-appointment-all-clinic"
                                                                data-toggle="modal"
                                                                data-target="#exampleModal-delete-all-clinic"
                                                                aria-hidden="true"
                                                                data-appointmentallclinic="{{ $patient_clinic_all->id }}">delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        <!-- Start Modal Update -->
                                        <div class="modal fade" id="exampleModal-update-all-clinic" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content dark-edition">
                                                    <div class="modal-header  modal-border-bottom">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add New
                                                            Appointment</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="updateFormAllClinic">
                                                            <div class="row">
                                                                <input type="hidden"
                                                                    class="form-control"id="up_id_all_clinic"
                                                                    name="doctor_id">

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating"> First
                                                                            Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            id="up_fname_psycholo_all_clinic"
                                                                            name="fname">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Last
                                                                            Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            id="up_lname_psycholo_all_clinic"
                                                                            name="lname">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Birth:</label>
                                                                        <input type="date" class="form-control"
                                                                            id="up_birth_psycholo_all_clinic"
                                                                            name="birth">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Gender:</label>
                                                                        <select id="up_gender_psycholor_all_clinic"
                                                                            name="gender" class="form-control ">
                                                                            <option hidden></option>
                                                                            <option value="female">Female</option>
                                                                            <option value="male">Male</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Martial Statues:</label>
                                                                        <select id="up_status_psycholo_all_clinic"
                                                                            name="marital_status" class="form-control">
                                                                            <option hidden></option>
                                                                            <option value="single">Single</option>
                                                                            <option value="married">Married</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label> Address:</label>
                                                                        <select id="up_address_psycholo_all_clinic"
                                                                            name="address" class="form-control">
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
                                                                            id="up_phone_psycholo_all_clinic"
                                                                            name="phone_number">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Email:</label>
                                                                        <input type="email" class="form-control "
                                                                            id="up_email_all_clinic" name="email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Date:</label>
                                                                        <input type="date" class="form-control"
                                                                            id="up_date_psycholo_all_clinic"name="date">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Time:</label>
                                                                        <select id="up_time_psycholo_all_clinic"
                                                                            name="time" class="form-control">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden"
                                                                    class="form-control"id="up_pricing_all_clinic"
                                                                    name="pricing">


                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal" onclick="cancel()">Close</button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-dismiss="modal"
                                                            id="updateAppointmentAllClinic">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Update -->

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" id="exampleModal-delete-all-clinic" tabindex="-1"
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
                                                        <input type="hidden" id="del-id-all-clinic"
                                                            class="form-control">
                                                    </div>
                                                    <div class="modal-footer modal-border-top">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal" onclick="cancel()">No</button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-dismiss="modal"
                                                            id="deleteAppointmentAllClinic">Yes</button>
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
                                                        <input type="hidden" id="del-id-clinic">
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
                                                        id="doctorid"name="doctor_id">

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
                                                            <input type="date" class="form-control"
                                                                id="birth_psycholo" name="birth">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Gender:</label>
                                                            <select id="gender" name="gender" class="form-control ">
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
                                                                id="date_psycholo"name="date">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Time:</label>
                                                            <select id="time_psycholo" name="time"
                                                                class="form-control">
                                                                <option value="" disabled selected hidden>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="form-control"
                                                        id="pricing"name="pricing">


                                                    <div class="col-md-12 emaildiv">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating "
                                                                id="lab-email">Email:</label>
                                                            <input type="email" class="form-control "
                                                                id="email" name="email">
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
                            <div class="modal fade" id="exampleModal-DeleteAll" tabindex="-1" role="dialog"
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
                                                            <input type="date" class="form-control"
                                                                id="del-date-all-app" name="date">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer modal-border-top">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                onclick="cancel()">No</button>
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
                    tableBody.empty();
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
                            ' data-toggle="modal"  id="update-appointment-all-clinic" data-target="#exampleModal-update-all-clinic" aria-hidden="true" data-appointmentallclinic="' +
                            appointment.id + '">edit_square</a>'));

                        row.append($('<td>').addClass('icon').html(
                            '<a class="material-symbols-outlined text-danger delete-appointment-all-clinic" data-toggle="modal" data-target="#exampleModal-delete-all-clinic" aria-hidden="true" data-appointmentallclinic="' +
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
                    tableBody.empty();
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
                            ' data-toggle="modal"  id="update-appointment" data-target="#exampleModal-update" aria-hidden="true" data-appointment="' +
                            appointment.id + '">edit_square</a>'));

                        row.append($('<td>').addClass('icon').html(
                            '<a class="material-symbols-outlined text-danger delete-appointment" data-toggle="modal" data-target="#exampleModal-delete" aria-hidden="true" data-appointment="' +
                            appointment.id + '">delete</a>'));

                        tableBody.append(row);
                    });
                },
                error: function(xhr, status, error) {
                    console.log('Error:', status);
                }
            });
        }

        function loadAppointmentsAllRemotly() {
            let url = window.location.href;
            let doctorId = url.substring(url.lastIndexOf('/') + 1);
            console.log(doctorId);
            $.ajax({
                url: '/secretary/appointment/index/remotly/all/' + doctorId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    let tableBody = $('#appointments-table-all-remotly');
                    tableBody.empty();
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
                            ' data-toggle="modal"  id="update-appointment-all" data-target="#exampleModal-update-all" aria-hidden="true" data-appointmentall="' +
                            appointment.id + '">edit_square</a>'));

                        row.append($('<td>').addClass('icon').html(
                            '<a class="material-symbols-outlined text-danger delete-appointment-all" data-toggle="modal" data-target="#exampleModal-delete-all" aria-hidden="true" data-appointmentall="' +
                            appointment.id + '">delete</a>'));

                        tableBody.append(row);
                    });
                },
                error: function(xhr, status, error) {
                    console.log('Error:', status);
                }
            });
        }

        function loadAppointmentsTodayRemotly() {
            let url = window.location.href;
            let doctorId = url.substring(url.lastIndexOf('/') + 1);
            console.log(doctorId);
            $.ajax({
                url: '/secretary/appointment/index/remotly/' + doctorId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    let tableBody = $('#appointments-table-body-today-remotly');
                    tableBody.empty();
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
                            ' data-toggle="modal"  id="update-appointment-remotly" data-target="#exampleModal-update-online" aria-hidden="true" data-appointmentremotly="' +
                            appointment.id + '">edit_square</a>'));

                        row.append($('<td>').addClass('icon').html(
                            '<a class="material-symbols-outlined text-danger delete-appointment-remotly" data-toggle="modal" data-target="#exampleModal-delete-online" aria-hidden="true" data-appointmentremotly="' +
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
                    tableBody.empty();
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
            let url = window.location.href;
            let doctorId = url.substring(url.lastIndexOf('/') + 1);
            console.log(doctorId);
            $('#doctorid').val(doctorId);

            // request date / reponse time / Add
            $('#date_psycholo').on('input', function() {
                let selectedDate = $('#date_psycholo').val();
                console.log(selectedDate);
                let timesSelect = $('#time_psycholo');
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

            // request date / reponse time / Update / Clinic
            $('#up_date_psycholo').on('input', function() {
                let selectedDate = $('#up_date_psycholo').val();
                console.log(selectedDate);
                let timesSelect = $('#up_time_psycholo');
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

            // request date / reponse time / Update / Remotly
            $('#up_date_psycholo_remotly').on('input', function() {
                let selectedDate = $('#up_date_psycholo_remotly').val();
                console.log(selectedDate);
                let timesSelect = $('#up_time_psycholo_remotly');
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

            // request date / reponse time / Update / All Remotly
            $('#up_date_psycholo_all').on('input', function() {
                let selectedDate = $('#up_date_psycholo_all').val();
                console.log(selectedDate);
                let timesSelect = $('#up_time_psycholo_all');
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

            // request date / reponse time / Update / All Clinic
            $('#up_date_psycholo_all_clinic').on('input', function() {
                let selectedDate = $('#up_date_psycholo_all_clinic').val();
                console.log(selectedDate);
                let timesSelect = $('#up_time_psycholo_all_clinic');
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
                    $('#up_pricing_remotly').val(response);
                    $('#up_pricing_all').val(response);
                    $('#up_pricing_all_clinic').val(response);
                    console.log(response);

                },
                error: function(response) {

                }
            });
              // استهداف عنصر الاختيار النمطي عند النقر عليه
    $('#up-remotely').click(function() {
        // التحقق مما إذا كان العنصر محددًا
        if ($(this).is(':checked')) {
            // إظهار عنصر input البريد الإلكتروني
            // $('#email').show();
            console.log($('#email'));
            $('.emaildiv').show();
            // $('#email').prop('type', email);
            $('#email').prop('disabled', false);
            $('#lab-email').show();
        } else {
            // إخفاء عنصر input البريد الإلكتروني
            $('#email').hide();
            $('#lab-email').hide();
        }
    });
    $('.emaildiv').hide();
            //Add Appointment
            $(document).on('click', '#addAppointment', function(e) {
                e.preventDefault();

                let formData = new FormData($('#addFrom')[0]);

                let birthVal = $("#birth_psycholo").val();
                let birth = moment(birthVal).format("MM/DD/YYYY");

                let dateVal = $("#date_psycholo").val();
                let date = moment(dateVal).format("MM/DD/YYYY");
                console.log(date);

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
                            toastr.success('The appointment has been added successfully.')
                            loadAppointmentsAll();
                            loadAppointmentsToday();
                            loadAppointmentsTodayRemotly();
                            loadAppointmentsAllRemotly();
                            $("#addFrom #fname").val('');
                            $("#addFrom #lname").val('');
                            $("#addFrom #birth_psycholo").val('');
                            $("#addFrom #phone_number").val('');
                            $("#addFrom #date_psycholo").val('');
                            $("#addFrom #email").val('');
                            $("#addFrom select").val('');
                            $('#addFrom #up-remotely').prop('checked', false);
                            $('#addFrom #up-clinic').prop('checked', false);
                            // $('#email').prop('type', hidden);
                            $('.emaildiv').hide();
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

            // Show Appointment Clinic
            $(document).on('click', '#update-appointment', function() {
                let appointmentId = $(this).data('appointment');
                $('#up-id').val(appointmentId);
                console.log(appointmentId);

                $.ajax({
                    type: "GET",
                    url: '/secretary/appointment/show/dashboard/' + appointmentId,
                    dataType: 'json',

                    success: function(response) {
                        $('#updateForm #up_fname_psycholo').val(response[0].fname);
                        $('#updateForm #up_lname_psycholo').val(response[0].lname);
                        $('#updateForm #up_gender_psycholor').val(response[0].gender);
                        $('#updateForm #up_phone_psycholo').val(response[0].phone_number);
                        $('#updateForm #up_birth_psycholo').val(response[0].birth);
                        $('#updateForm #up_date_psycholo').val(response[0].date);
                        $('#updateForm #up_address_psycholo').val(response[0].address);
                        $('#updateForm #up_status_psycholo').val(response[0].marital_status);
                        $('#updateForm #up_email_psycholo').val(response[0].email);
                        $('#updateForm #up_time_psycholo').val(response[0].time);
                        let options = '';
                        for (let i = 0; i < response.length; i++) {
                            let time = moment(response[i].time, 'HH:mm:ss').format('hh:mm A');
                            options += '<option selected value="' + time + '">' + time +
                                '</option>';
                        }
                        $('#up_time_psycholo').html(options);
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

            // Show Appointment Remotly
            $(document).on('click', '#update-appointment-remotly', function() {
                let appointmentId = $(this).data('appointmentremotly');
                $('#up_id_remotly').val(appointmentId);
                console.log(appointmentId);

                $.ajax({
                    type: "GET",
                    url: '/secretary/appointment/show/dashboard/' + appointmentId,
                    dataType: 'json',

                    success: function(response) {
                        $('#updateFormRemotly #upemail').val(response[0]
                            .email);
                        $('#updateFormRemotly #up_fname_psycholo_remotly').val(response[0]
                            .fname);
                        $('#updateFormRemotly #up_lname_psycholo_remotly').val(response[0]
                            .lname);
                        $('#updateFormRemotly #up_gender_psycholor_remotly').val(response[0]
                            .gender);
                        $('#updateFormRemotly #up_phone_psycholo_remotly').val(response[0]
                            .phone_number);
                        $('#updateFormRemotly #up_birth_psycholo_remotly').val(response[0]
                            .birth);
                        $('#updateFormRemotly #up_date_psycholo_remotly').val(response[0].date);
                        $('#updateFormRemotly #up_address_psycholo_remotly').val(response[0]
                            .address);
                        $('#updateFormRemotly #up_status_psycholo_remotly').val(response[0]
                            .marital_status);

                        $('#updateFormRemotly #up_time_psycholo_remotly').val(response[0].time);
                        let options = '';
                        for (let i = 0; i < response.length; i++) {
                            let time = moment(response[i].time, 'HH:mm:ss').format('hh:mm A');
                            options += '<option selected value="' + time + '">' + time +
                                '</option>';
                        }
                        $('#up_time_psycholo_remotly').html(options);

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

            // Show Appointment All Remotly
            $(document).on('click', '#update-appointment-all', function() {
                let appointmentId = $(this).data('appointmentall');
                $('#up_id_all').val(appointmentId);
                console.log(appointmentId);

                $.ajax({
                    type: "GET",
                    url: '/secretary/appointment/show/dashboard/' + appointmentId,
                    dataType: 'json',

                    success: function(response) {
                        $('#updateFormAll #up_email_all').val(response[0]
                            .email);
                        $('#updateFormAll #up_fname_psycholo_all').val(response[0]
                            .fname);
                        $('#updateFormAll #up_lname_psycholo_all').val(response[0]
                            .lname);
                        $('#updateFormAll #up_gender_psycholor_all').val(response[0]
                            .gender);
                        $('#updateFormAll #up_phone_psycholo_all').val(response[0]
                            .phone_number);
                        $('#updateFormAll #up_birth_psycholo_all').val(response[0]
                            .birth);
                        $('#updateFormAll #up_date_psycholo_all').val(response[0].date);
                        $('#updateFormAll #up_address_psycholo_all').val(response[0]
                            .address);
                        $('#updateFormAll #up_status_psycholo_all').val(response[0]
                            .marital_status);

                        $('#updateFormAll #up_time_psycholo_all').val(response[0].time);
                        let options = '';
                        for (let i = 0; i < response.length; i++) {
                            let time = moment(response[i].time, 'HH:mm:ss').format('hh:mm A');
                            options += '<option selected value="' + time + '">' + time +
                                '</option>';
                        }
                        $('#up_time_psycholo_all').html(options);

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

            // Show Appointment All Clinic
            $(document).on('click', '#update-appointment-all-clinic', function() {
                let appointmentallclinic = $(this).data('appointmentallclinic');
                $('#up_id_all_clinic').val(appointmentallclinic);
                console.log(appointmentallclinic);

                $.ajax({
                    type: "GET",
                    url: '/secretary/appointment/show/dashboard/' + appointmentallclinic,
                    dataType: 'json',

                    success: function(response) {
                        $('#updateFormAllClinic #up_email_all_clinic').val(response[0]
                            .email);
                        $('#updateFormAllClinic #up_fname_psycholo_all_clinic').val(response[0]
                            .fname);
                        $('#updateFormAllClinic #up_lname_psycholo_all_clinic').val(response[0]
                            .lname);
                        $('#updateFormAllClinic #up_gender_psycholor_all_clinic').val(response[
                                0]
                            .gender);
                        $('#updateFormAllClinic #up_phone_psycholo_all_clinic').val(response[0]
                            .phone_number);
                        $('#updateFormAllClinic #up_birth_psycholo_all_clinic').val(response[0]
                            .birth);
                        $('#updateFormAllClinic #up_date_psycholo_all_clinic').val(response[0]
                            .date);
                        $('#updateFormAllClinic #up_address_psycholo_all_clinic').val(response[
                                0]
                            .address);
                        $('#updateFormAllClinic #up_status_psycholo_all_clinic').val(response[0]
                            .marital_status);

                        $('#updateFormAllClinic #up_time_psycholo_all_clinic').val(response[0]
                            .time);
                        let options = '';
                        for (let i = 0; i < response.length; i++) {
                            let time = moment(response[i].time, 'HH:mm:ss').format('hh:mm A');
                            options += '<option selected value="' + time + '">' + time +
                                '</option>';
                        }
                        $('#up_time_psycholo_all_clinic').html(options);

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

            // Update Appointment Clinic
            $(document).on('click', '#updateAppointment', function(e) {
                e.preventDefault();

                let appointmentId = $('#up-id').val();

                let updateFormData = new FormData($('#updateForm')[0]);

                let birthVal = $("#up_birth_psycholo").val();
                let birth = moment(birthVal).format("MM/DD/YYYY");
                updateFormData.append("birth", birth);

                let dateVal = $("#up_date_psycholo").val();
                let date = moment(dateVal).format("MM/DD/YYYY");
                updateFormData.append("date", date);

                let timeVal = $("#up_time_psycholo").val();
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

            // Update Appointment Remotly
            $(document).on('click', '#updateAppointmentRemotly', function(e) {
                e.preventDefault();

                let appointmentId = $('#up_id_remotly').val();

                let updateFormData = new FormData($('#updateFormRemotly')[0]);

                let birthVal = $("#up_birth_psycholo_remotly").val();
                let birth = moment(birthVal).format("MM/DD/YYYY");
                updateFormData.append("birth", birth);


                let dateVal = $("#up_date_psycholo_remotly").val();
                let date = moment(dateVal).format("MM/DD/YYYY");
                updateFormData.append("date", date);

                let timeVal = $("#up_time_psycholo_remotly").val();
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
                        loadAppointmentsTodayRemotly();
                        loadAppointmentsAllRemotly();
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

            // Update Appointment All Remotly
            $(document).on('click', '#updateAppointmentAll', function(e) {
                e.preventDefault();

                let appointmentId = $('#up_id_all').val();

                let updateFormData = new FormData($('#updateFormAll')[0]);

                let birthVal = $("#up_birth_psycholo_all").val();
                let birth = moment(birthVal).format("MM/DD/YYYY");
                updateFormData.append("birth", birth);


                let dateVal = $("#up_date_psycholo_all").val();
                let date = moment(dateVal).format("MM/DD/YYYY");
                updateFormData.append("date", date);

                let timeVal = $("#up_time_psycholo_all").val();
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
                        loadAppointmentsTodayRemotly();
                        loadAppointmentsAllRemotly();
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

            // Update Appointment All Clinic
            $(document).on('click', '#updateAppointmentAllClinic', function(e) {
                e.preventDefault();

                let appointmentId = $('#up_id_all_clinic').val();

                let updateFormData = new FormData($('#updateFormAllClinic')[0]);

                let birthVal = $("#up_birth_psycholo_all_clinic").val();
                let birth = moment(birthVal).format("MM/DD/YYYY");
                updateFormData.append("birth", birth);


                let dateVal = $("#up_date_psycholo_all_clinic").val();
                let date = moment(dateVal).format("MM/DD/YYYY");
                updateFormData.append("date", date);

                let timeVal = $("#up_time_psycholo_all_clinic").val();
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

            // Delete Appointment Clinic
            let appointmentId = '';
            $(document).on('click', '.delete-appointment', function() {
                appointmentId = $(this).data('appointment');
                $('#del-id').val(appointmentId);
            });
            // Delete Appointment Clinic
            $(document).on('click', '#deleteAppointment', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "delete",
                    url: '/secretary/appointment/destroy/' + appointmentId,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {

                        toastr.success('The appointment has been Deleted successfully.');
                        loadAppointmentsDelete();
                        loadAppointmentsAll();
                        loadAppointmentsToday();
                        loadAppointmentsTodayRemotly();
                        loadAppointmentsAllRemotly();
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

            // Delete Appointment Remotly
            let appointmentIdRemotly = '';
            $(document).on('click', '.delete-appointment-remotly', function() {
                appointmentIdRemotly = $(this).data('appointmentremotly');
                $('#del-id-remotly').val(appointmentIdRemotly);
            });
            // Delete Appointment Remotly
            $(document).on('click', '#deleteAppointmentRemotly', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "delete",
                    url: '/secretary/appointment/destroy/' + appointmentIdRemotly,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {

                        toastr.success('The appointment has been Deleted successfully.');
                        loadAppointmentsDelete();
                        loadAppointmentsAll();
                        loadAppointmentsToday();
                        loadAppointmentsTodayRemotly();
                        loadAppointmentsAllRemotly();;
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

            // Delete Appointment All Remotly
            let appointmentIdAll = '';
            $(document).on('click', '.delete-appointment-all', function() {
                appointmentIdAll = $(this).data('appointmentall');
                $('#del-id-all').val(appointmentIdAll);
            });
            // Delete Appointment All Remotly
            $(document).on('click', '#deleteAppointmentAll', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "delete",
                    url: '/secretary/appointment/destroy/' + appointmentIdAll,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {

                        toastr.success('The appointment has been Deleted successfully.');
                        loadAppointmentsDelete();
                        loadAppointmentsAll();
                        loadAppointmentsToday();
                        loadAppointmentsTodayRemotly();
                        loadAppointmentsAllRemotly();
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

            // Delete Appointment All Clinic
            let appointmentIdAllClinic = '';
            $(document).on('click', '.delete-appointment-all-clinic', function() {
                appointmentIdAllClinic = $(this).data('appointmentallclinic');
                $('#del-id-all-clinic').val(appointmentIdAllClinic);
            });
            // Delete Appointment All Clinic
            $(document).on('click', '#deleteAppointmentAllClinic', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "delete",
                    url: '/secretary/appointment/destroy/' + appointmentIdAllClinic,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {

                        toastr.success('The appointment has been Deleted successfully.');
                        loadAppointmentsDelete();
                        loadAppointmentsAll();
                        loadAppointmentsToday();
                        loadAppointmentsTodayRemotly();
                        loadAppointmentsAllRemotly();
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


            // Delete All Appointment / Clinic / Remotly / All
            $(document).on('click', '#deleteAllAppointment', function(e) {
                e.preventDefault();
                let deleteFormData = new FormData($('#deleteAllForm')[0]);

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
                        toastr.success('The appointment has been Deleted successfully.');
                        loadAppointmentsDelete();
                        loadAppointmentsAll();
                        loadAppointmentsToday();
                        loadAppointmentsTodayRemotly();
                        loadAppointmentsAllRemotly();
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

                        toastr.success('The appointment has been Deleted successfully.');
                        loadAppointmentsDelete();
                        loadAppointmentsAll();
                        loadAppointmentsToday();
                        loadAppointmentsTodayRemotly();
                        loadAppointmentsAllRemotly();
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
