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
                                            <a class="nav-link active" href="#clinic" data-toggle="tab">
                                                <i class="material-icons"></i> In Clinic Appointments
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#online" data-toggle="tab">

                                                <i class="material-icons"></i> Online Appointments
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#all" data-toggle="tab">
                                                <i class="material-icons"></i> All Appointments
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a href="https://us05web.zoom.us/meeting/schedule" target="_blank"
                                                class="nav-link btn mr-2"><i
                                                    class="material-icons material-symbols-outlined ">video_call</i>Call</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">

                                <div class="tab-pane active" id="clinic">
                                    <div class="table-responsive">
                                        <table class="table " id="table" data-toggle="table" data-search="true"
                                            data-pagination="true" data-toolbar="#toolbar">
                                            <thead class=" text-primary">
                                                <th data-sortable="true">ID</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Status</th>
                                                <th>Address</th>
                                                <th>Birth</th>
                                                <th>Phone</th>
                                                <th>Add</th>
                                                <th>Show</th>
                                                <th>Update</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($patients_clinic as $patient_clinic)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $patient_clinic->fname }} {{ $patient_clinic->lname }}</td>
                                                        <td>{{ $patient_clinic->gender }}</td>
                                                        <td>{{ $patient_clinic->marital_status }}</td>
                                                        <td>{{ $patient_clinic->address }}</td>
                                                        <td>{{ $patient_clinic->birth }}</td>
                                                        <td>{{ $patient_clinic->phone_number }}</td>
                                                        <td class="icon"><a
                                                                class="material-symbols-outlined text-success add-record"
                                                                data-toggle="modal" data-target="#exampleModal-create"
                                                                aria-hidden="true"
                                                                data-record="{{ $patient_clinic->id }}">add</a></td>

                                                        <td class="icon"><a
                                                                class="material-symbols-outlined text-info show-record"
                                                                data-toggle="modal" data-target="#exampleModal-show"
                                                                aria-hidden="true"
                                                                data-record="{{ $patient_clinic->id }}">visibility</a>
                                                        </td>

                                                        <td class="icon"><a
                                                                class="material-symbols-outlined text-warning update-record"
                                                                data-toggle="modal" data-target="#exampleModal-update"
                                                                aria-hidden="true"
                                                                data-lolo="{{ $patient_clinic->id }}">edit_square</a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

                                        <!-- Start Modal Add -->
                                        <div class="modal fade " id="exampleModal-create" tabindex="-1"
                                            role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-record" role="document">
                                                <div class="modal-content dark-edition">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-white" id="exampleModalLabel">Patient
                                                            Record
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="addFrom">
                                                            <input type="hidden" name="doctor_id" id="doctor_id">
                                                            <input type="hidden" name="appointment_id" id="id">
                                                            <h5 class="modal-title" id="exampleModalLabel">Medical
                                                                History:</h5>

                                                            <div class="my-3 d-flex flex-wrap justify-content-between">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="blood_pressure"
                                                                            value="1" name="blood_pressure">Blood
                                                                        Pressure
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="asthma" value="1"
                                                                            name="asthma">Asthma
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="diabetes" value="1"
                                                                            name="diabetes">Diabetes
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="renal_disease"
                                                                            value="1" name="renal_disease">Renal
                                                                        Disease
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="tumors" value="1"
                                                                            name="tumors">Tumors
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                            </div>

                                                            <h5 class="modal-title" id="exampleModalLabel">Common
                                                                Symptoms:</h5>
                                                            <div class="my-3 d-flex flex-wrap justify-content-between">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="headache" value="1"
                                                                            name="headache">Headiche
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="dizziness" value="1"
                                                                            name="dizziness">Dizziness
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="chest_pain"
                                                                            value="1" name="chest_pain">Chest Pain
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="inlineCheckbox1"
                                                                            value="1" name="">Heart Disease
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="dyspnea" value="1"
                                                                            name="dyspnea">Dyspnea
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="cough" value="1"
                                                                            name="cough">Congh
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="abdominal_pain"
                                                                            value="1" name="abdominal_pain">Abdominal
                                                                        Pain
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="diarhea" value="1"
                                                                            name="diarhea">Diarheaa
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="constipation"
                                                                            value="1"
                                                                            name="constipation">Constipation
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="vomiting" value="1"
                                                                            name="vomiting">Vomiting
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="arthralgia"
                                                                            value="1" name="arthralgia">Arthralgia
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Blood
                                                                            Pressure:</label>
                                                                        <input type="tel" class="form-control"
                                                                            name="blood_pressure_rate"
                                                                            id="blood_pressure_rate">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Respiratary
                                                                            Rate:</label>
                                                                        <input type="tel" class="form-control"
                                                                            name="respiratory_rate" id="respiratory_rate">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Heart
                                                                            Rate:</label>
                                                                        <input type="tel" class="form-control"
                                                                            name="heart_rate" id="heart_rate">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="bmd-label-floating">Saturation:</label>
                                                                        <input type="tel" class="form-control"
                                                                            name="saturation_rate" id="saturation_rate">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 form-group">
                                                                    <label class="bmd-label-floating">Medical
                                                                        History:</label>
                                                                    <textarea class="form-control" rows="3" id="medical-history" name="medicinal_history"></textarea>
                                                                </div>

                                                                <div class="col-md-4 form-group">
                                                                    <label class="bmd-label-floating">Surgical
                                                                        History:</label>
                                                                    <textarea class="form-control" rows="3" id="surgical-history" name="surgical_history"></textarea>
                                                                </div>

                                                                <div class="col-md-4 form-group">
                                                                    <label class="bmd-label-floating">Patient
                                                                        Story:</label>
                                                                    <textarea class="form-control" rows="3" id="story" name="story"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col form-group">
                                                                    <label class="bmd-label-floating">Diagnosis:</label>
                                                                    <textarea class="form-control" rows="4" id="diagnosis" name="diagnosis"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 mt-3 form-group">
                                                                    <label class="bmd-label-floating">Medical
                                                                        Analaysis:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="medicinal_analysis" id="medicinal_analysis">
                                                                </div>

                                                                <div class="col-md-4 form-group">
                                                                    <label>device:</label>
                                                                    <select id="device" name="device"
                                                                        class="form-control">


                                                                    </select>
                                                                </div>
                                                                <input type="hidden"
                                                                    class="form-control"name="device_id" id="iddevice">

                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary"
                                                            id="addrecord">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Add -->

                                        <!-- Start Modal Show -->
                                        <div class="modal fade" id="exampleModal-show" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-record" role="document">
                                                <div class="modal-content dark-edition">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="carouselExampleIndicators" class="carousel slide"
                                                            data-ride="carousel">
                                                            <ol class="carousel-indicators">
                                                                <li data-target="#carouselExampleIndicators"
                                                                    data-slide-to="0" class="active"></li>
                                                                <li data-target="#carouselExampleIndicators"
                                                                    data-slide-to="1">
                                                                </li>
                                                                <li data-target="#carouselExampleIndicators"
                                                                    data-slide-to="2">
                                                                </li>
                                                            </ol>
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <form id="showForm1">
                                                                        <input type="hidden" name="id"
                                                                            id="recordId">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Medical
                                                                            History:</h5>

                                                                        <div
                                                                            class="my-3 d-flex flex-wrap justify-content-between">
                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_blood_pressure"
                                                                                        value="1"
                                                                                        name="blood_pressure">Blood
                                                                                    Pressure
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-asthma"
                                                                                        value="1"
                                                                                        name="asthma">Asthma
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-diabetes"
                                                                                        value="1"
                                                                                        name="diabetes">Diabetes
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_renal_disease"
                                                                                        value="1"
                                                                                        name="renal_disease">Renal
                                                                                    Disease
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-tumors"
                                                                                        value="1"
                                                                                        name="tumors">Tumors
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                        </div>

                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Common
                                                                            Symptoms:</h5>
                                                                        <div
                                                                            class="my-3 d-flex flex-wrap justify-content-between">
                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-headache"
                                                                                        value="1"
                                                                                        name="headache">Headiche
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-dizziness"
                                                                                        value="1"
                                                                                        name="dizziness">Dizziness
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up_chest_pain"
                                                                                        value="1"
                                                                                        name="chest_pain">Chest
                                                                                    Pain
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_heart_disease"
                                                                                        value="1"
                                                                                        name="heart_disease">Heart
                                                                                    Disease
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-dyspnea"
                                                                                        value="1"
                                                                                        name="dyspnea">Dyspnea
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-cough"
                                                                                        value="1"
                                                                                        name="cough">Congh
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_abdominal_pain"
                                                                                        value="1"
                                                                                        name="abdominal_pain">Abdominal
                                                                                    Pain
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-diarhea"
                                                                                        value="1"
                                                                                        name="diarhea">Diarheaa
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-constipation"
                                                                                        value="1"
                                                                                        name="constipation">Constipation
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-vomiting"
                                                                                        value="1"
                                                                                        name="vomiting">Vomiting
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-arthralgia"
                                                                                        value="1"
                                                                                        name="arthralgia">Arthralgia
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Blood
                                                                                        Pressure:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="blood_pressure_rate"
                                                                                        id="up_blood_pressure_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Respiratary
                                                                                        Rate:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="respiratory_rate"
                                                                                        id="up_respiratory_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Heart
                                                                                        Rate:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="heart_rate"
                                                                                        id="up_heart_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Saturation:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="saturation_rate"
                                                                                        id="up_saturation_rate">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Medical
                                                                                    History:</label>
                                                                                <textarea class="form-control" rows="3" id="up_medicinal_history" name="medicinal_history"></textarea>
                                                                            </div>

                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Surgical
                                                                                    History:</label>
                                                                                <textarea class="form-control" rows="3" id="up_surgical_history" name="surgical_history"></textarea>
                                                                            </div>

                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Patient
                                                                                    Story:</label>
                                                                                <textarea class="form-control" rows="3" id="up-story" name="story"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col form-group">
                                                                                <label
                                                                                    class="bmd-label-floating">Diagnosis:</label>
                                                                                <textarea class="form-control" rows="4" id="up-diagnosis" name="diagnosis"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 mt-3 form-group">
                                                                                <label class="bmd-label-floating">Medical
                                                                                    Analaysis:</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="medicinal_analysis"
                                                                                    id="up_medicinal_analysis">
                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <form id="showForm2">
                                                                        <input type="hidden" name="id"
                                                                            id="recordId">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Medical
                                                                            History:</h5>

                                                                        <div
                                                                            class="my-3 d-flex flex-wrap justify-content-between">
                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_blood_pressure"
                                                                                        value="1"
                                                                                        name="blood_pressure">Blood
                                                                                    Pressure
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-asthma"
                                                                                        value="1"
                                                                                        name="asthma">Asthma
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-diabetes"
                                                                                        value="1"
                                                                                        name="diabetes">Diabetes
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_renal_disease"
                                                                                        value="1"
                                                                                        name="renal_disease">Renal
                                                                                    Disease
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-tumors"
                                                                                        value="1"
                                                                                        name="tumors">Tumors
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                        </div>

                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Common
                                                                            Symptoms:</h5>
                                                                        <div
                                                                            class="my-3 d-flex flex-wrap justify-content-between">
                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-headache"
                                                                                        value="1"
                                                                                        name="headache">Headiche
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-dizziness"
                                                                                        value="1"
                                                                                        name="dizziness">Dizziness
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up_chest_pain"
                                                                                        value="1"
                                                                                        name="chest_pain">Chest
                                                                                    Pain
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_heart_disease"
                                                                                        value="1"
                                                                                        name="heart_disease">Heart
                                                                                    Disease
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-dyspnea"
                                                                                        value="1"
                                                                                        name="dyspnea">Dyspnea
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-cough"
                                                                                        value="1"
                                                                                        name="cough">Congh
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_abdominal_pain"
                                                                                        value="1"
                                                                                        name="abdominal_pain">Abdominal
                                                                                    Pain
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-diarhea"
                                                                                        value="1"
                                                                                        name="diarhea">Diarheaa
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-constipation"
                                                                                        value="1"
                                                                                        name="constipation">Constipation
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-vomiting"
                                                                                        value="1"
                                                                                        name="vomiting">Vomiting
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-arthralgia"
                                                                                        value="1"
                                                                                        name="arthralgia">Arthralgia
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Blood
                                                                                        Pressure:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="blood_pressure_rate"
                                                                                        id="up_blood_pressure_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Respiratary
                                                                                        Rate:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="respiratory_rate"
                                                                                        id="up_respiratory_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Heart
                                                                                        Rate:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="heart_rate"
                                                                                        id="up_heart_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Saturation:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="saturation_rate"
                                                                                        id="up_saturation_rate">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Medical
                                                                                    History:</label>
                                                                                <textarea class="form-control" rows="3" id="up_medicinal_history" name="medicinal_history"></textarea>
                                                                            </div>

                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Surgical
                                                                                    History:</label>
                                                                                <textarea class="form-control" rows="3" id="up_surgical_history" name="surgical_history"></textarea>
                                                                            </div>

                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Patient
                                                                                    Story:</label>
                                                                                <textarea class="form-control" rows="3" id="up-story" name="story"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col form-group">
                                                                                <label
                                                                                    class="bmd-label-floating">Diagnosis:</label>
                                                                                <textarea class="form-control" rows="4" id="up-diagnosis" name="diagnosis"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 mt-3 form-group">
                                                                                <label class="bmd-label-floating">Medical
                                                                                    Analaysis:</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="medicinal_analysis"
                                                                                    id="up_medicinal_analysis">
                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <form id="showForm33">
                                                                        <input type="hidden" name="id"
                                                                            id="recordId">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Medical
                                                                            History:</h5>

                                                                        <div
                                                                            class="my-3 d-flex flex-wrap justify-content-between">
                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_blood_pressure"
                                                                                        value="1"
                                                                                        name="blood_pressure">Blood
                                                                                    Pressure
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-asthma"
                                                                                        value="1"
                                                                                        name="asthma">Asthma
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-diabetes"
                                                                                        value="1"
                                                                                        name="diabetes">Diabetes
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_renal_disease"
                                                                                        value="1"
                                                                                        name="renal_disease">Renal
                                                                                    Disease
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-tumors"
                                                                                        value="1"
                                                                                        name="tumors">Tumors
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                        </div>

                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Common
                                                                            Symptoms:</h5>
                                                                        <div
                                                                            class="my-3 d-flex flex-wrap justify-content-between">
                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-headache"
                                                                                        value="1"
                                                                                        name="headache">Headiche
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-dizziness"
                                                                                        value="1"
                                                                                        name="dizziness">Dizziness
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up_chest_pain"
                                                                                        value="1"
                                                                                        name="chest_pain">Chest
                                                                                    Pain
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_heart_disease"
                                                                                        value="1"
                                                                                        name="heart_disease">Heart
                                                                                    Disease
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-dyspnea"
                                                                                        value="1"
                                                                                        name="dyspnea">Dyspnea
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-cough"
                                                                                        value="1"
                                                                                        name="cough">Congh
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_abdominal_pain"
                                                                                        value="1"
                                                                                        name="abdominal_pain">Abdominal
                                                                                    Pain
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-diarhea"
                                                                                        value="1"
                                                                                        name="diarhea">Diarheaa
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-constipation"
                                                                                        value="1"
                                                                                        name="constipation">Constipation
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-vomiting"
                                                                                        value="1"
                                                                                        name="vomiting">Vomiting
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-arthralgia"
                                                                                        value="1"
                                                                                        name="arthralgia">Arthralgia
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Blood
                                                                                        Pressure:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="blood_pressure_rate"
                                                                                        id="up_blood_pressure_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Respiratary
                                                                                        Rate:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="respiratory_rate"
                                                                                        id="up_respiratory_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Heart
                                                                                        Rate:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="heart_rate"
                                                                                        id="up_heart_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Saturation:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="saturation_rate"
                                                                                        id="up_saturation_rate">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Medical
                                                                                    History:</label>
                                                                                <textarea class="form-control" rows="3" id="up_medicinal_history" name="medicinal_history"></textarea>
                                                                            </div>

                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Surgical
                                                                                    History:</label>
                                                                                <textarea class="form-control" rows="3" id="up_surgical_history" name="surgical_history"></textarea>
                                                                            </div>

                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Patient
                                                                                    Story:</label>
                                                                                <textarea class="form-control" rows="3" id="up-story" name="story"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col form-group">
                                                                                <label
                                                                                    class="bmd-label-floating">Diagnosis:</label>
                                                                                <textarea class="form-control" rows="4" id="up-diagnosis" name="diagnosis"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 mt-3 form-group">
                                                                                <label class="bmd-label-floating">Medical
                                                                                    Analaysis:</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="medicinal_analysis"
                                                                                    id="up_medicinal_analysis">
                                                                            </div>
                                                                            {{--
                                                                            <div class="col-md-4 form-group">
                                                                                <label for="inputState">Devices:</label>
                                                                                <select id="up-device" name="device"
                                                                                    class="form-control">
                                                                                </select>
                                                                            </div> --}}

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary cancel"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Show -->

                                        <!-- Start Modal Update -->
                                        <div class="modal fade" id="exampleModal-update" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-record" role="document">
                                                <div class="modal-content dark-edition">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-white" id="exampleModalLabel">
                                                            Patient Record
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="updateForm">
                                                            <input type="hidden" name="id" id="upId">
                                                            <h5 class="modal-title" id="exampleModalLabel">Medical
                                                                History:</h5>

                                                            <div class="my-3 d-flex flex-wrap justify-content-between">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up_blood_pressure"
                                                                            value="1" name="blood_pressure">Blood
                                                                        Pressure
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-asthma"
                                                                            value="1" name="asthma">Asthma
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-diabetes"
                                                                            value="1" name="diabetes">Diabetes
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up_renal_disease"
                                                                            value="1" name="renal_disease">Renal
                                                                        Disease
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-tumors"
                                                                            value="1" name="tumors">Tumors
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                            </div>

                                                            <h5 class="modal-title" id="exampleModalLabel">Common
                                                                Symptoms:</h5>
                                                            <div class="my-3 d-flex flex-wrap justify-content-between">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-headache"
                                                                            value="1" name="headache">Headiche
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-dizziness"
                                                                            value="1" name="dizziness">Dizziness
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up_chest_pain"
                                                                            value="1" name="chest_pain">Chest Pain
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up_heart_disease"
                                                                            value="1" name="heart_disease">Heart
                                                                        Disease
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-dyspnea"
                                                                            value="1" name="dyspnea">Dyspnea
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-cough"
                                                                            value="1" name="cough">Congh
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up_abdominal_pain"
                                                                            value="1"
                                                                            name="abdominal_pain">Abdominal
                                                                        Pain
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-diarhea"
                                                                            value="1" name="diarhea">Diarheaa
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-constipation"
                                                                            value="1"
                                                                            name="constipation">Constipation
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-vomiting"
                                                                            value="1" name="vomiting">Vomiting
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-arthralgia"
                                                                            value="1" name="arthralgia">Arthralgia
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Blood
                                                                            Pressure:</label>
                                                                        <input type="tel" class="form-control"
                                                                            name="blood_pressure_rate"
                                                                            id="up_blood_pressure_rate">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Respiratary
                                                                            Rate:</label>
                                                                        <input type="tel" class="form-control"
                                                                            name="respiratory_rate"
                                                                            id="up_respiratory_rate">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Heart
                                                                            Rate:</label>
                                                                        <input type="tel" class="form-control"
                                                                            name="heart_rate" id="up_heart_rate">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="bmd-label-floating">Saturation:</label>
                                                                        <input type="tel" class="form-control"
                                                                            name="saturation_rate"
                                                                            id="up_saturation_rate">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 form-group">
                                                                    <label class="bmd-label-floating">Medical
                                                                        History:</label>
                                                                    <textarea class="form-control" rows="3" id="up_medicinal_history" name="medicinal_history"></textarea>
                                                                </div>

                                                                <div class="col-md-4 form-group">
                                                                    <label class="bmd-label-floating">Surgical
                                                                        History:</label>
                                                                    <textarea class="form-control" rows="3" id="up_surgical_history" name="surgical_history"></textarea>
                                                                </div>

                                                                <div class="col-md-4 form-group">
                                                                    <label class="bmd-label-floating">Patient
                                                                        Story:</label>
                                                                    <textarea class="form-control" rows="3" id="up-story" name="story"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col form-group">
                                                                    <label class="bmd-label-floating">Diagnosis:</label>
                                                                    <textarea class="form-control" rows="4" id="up-diagnosis" name="diagnosis"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 mt-3 form-group">
                                                                    <label class="bmd-label-floating">Medical
                                                                        Analaysis:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="medicinal_analysis"
                                                                        id="up_medicinal_analysis">
                                                                </div>

                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary "
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary"
                                                            id="updateRecord" data-dismiss="modal">
                                                            Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Update -->
                                    </div>
                                </div>

                                <div class="tab-pane" id="online">
                                    <div class="table-responsive">
                                        <table class="table " id="table" data-toggle="table" data-search="true"
                                            data-pagination="true" data-toolbar="#toolbar">
                                            <thead class=" text-primary">
                                                <th data-sortable="true">ID</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Status</th>
                                                <th>Address</th>
                                                <th>Birth</th>
                                                <th>Phone</th>
                                                <th>Email</th>

                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($patients_remotly as $patient_remotly)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $patient_remotly->fname }} {{ $patient_remotly->lname }}
                                                        </td>
                                                        <td>{{ $patient_remotly->gender }}</td>
                                                        <td>{{ $patient_remotly->marital_status }}</td>
                                                        <td>{{ $patient_remotly->address }}</td>
                                                        <td>{{ $patient_remotly->birth }}</td>
                                                        <td>{{ $patient_remotly->phone_number }}</td>
                                                        <td>{{ $patient_remotly->email }}</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

                                        <!-- Start Modal Add -->
                                        <div class="modal fade " id="exampleModal-create" tabindex="-1"
                                            role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-record" role="document">
                                                <div class="modal-content dark-edition">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-white" id="exampleModalLabel">
                                                            Patient
                                                            Record
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="addFrom">
                                                            <input type="text" name="doctor_id" id="doctor_id">
                                                            <input type="text" name="appointment_id"
                                                                id="id">
                                                            <h5 class="modal-title" id="exampleModalLabel">Medical
                                                                History:</h5>

                                                            <div class="my-3 d-flex flex-wrap justify-content-between">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="blood_pressure"
                                                                            value="1" name="blood_pressure">Blood
                                                                        Pressure
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="asthma"
                                                                            value="1" name="asthma">Asthma
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="diabetes"
                                                                            value="1" name="diabetes">Diabetes
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="renal_disease"
                                                                            value="1" name="renal_disease">Renal
                                                                        Disease
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="tumors"
                                                                            value="1" name="tumors">Tumors
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                            </div>

                                                            <h5 class="modal-title" id="exampleModalLabel">Common
                                                                Symptoms:</h5>
                                                            <div class="my-3 d-flex flex-wrap justify-content-between">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="headache"
                                                                            value="1" name="headache">Headiche
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="dizziness"
                                                                            value="1" name="dizziness">Dizziness
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="chest_pain"
                                                                            value="1" name="chest_pain">Chest Pain
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="inlineCheckbox1"
                                                                            value="1" name="">Heart Disease
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="dyspnea"
                                                                            value="1" name="dyspnea">Dyspnea
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="cough"
                                                                            value="1" name="cough">Congh
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="abdominal_pain"
                                                                            value="1"
                                                                            name="abdominal_pain">Abdominal
                                                                        Pain
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="diarhea"
                                                                            value="1" name="diarhea">Diarheaa
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="constipation"
                                                                            value="1"
                                                                            name="constipation">Constipation
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="vomiting"
                                                                            value="1" name="vomiting">Vomiting
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="arthralgia"
                                                                            value="1" name="arthralgia">Arthralgia
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Blood
                                                                            Pressure:</label>
                                                                        <input type="tel" class="form-control"
                                                                            name="blood_pressure_rate"
                                                                            id="blood_pressure_rate">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Respiratary
                                                                            Rate:</label>
                                                                        <input type="tel" class="form-control"
                                                                            name="respiratory_rate"
                                                                            id="respiratory_rate">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Heart
                                                                            Rate:</label>
                                                                        <input type="tel" class="form-control"
                                                                            name="heart_rate" id="heart_rate">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="bmd-label-floating">Saturation:</label>
                                                                        <input type="tel" class="form-control"
                                                                            name="saturation_rate" id="saturation_rate">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 form-group">
                                                                    <label class="bmd-label-floating">Medical
                                                                        History:</label>
                                                                    <textarea class="form-control" rows="3" id="medical-history" name="medicinal_history"></textarea>
                                                                </div>

                                                                <div class="col-md-4 form-group">
                                                                    <label class="bmd-label-floating">Surgical
                                                                        History:</label>
                                                                    <textarea class="form-control" rows="3" id="surgical-history" name="surgical_history"></textarea>
                                                                </div>

                                                                <div class="col-md-4 form-group">
                                                                    <label class="bmd-label-floating">Patient
                                                                        Story:</label>
                                                                    <textarea class="form-control" rows="3" id="story" name="story"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col form-group">
                                                                    <label class="bmd-label-floating">Diagnosis:</label>
                                                                    <textarea class="form-control" rows="4" id="diagnosis" name="diagnosis"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 mt-3 form-group">
                                                                    <label class="bmd-label-floating">Medical
                                                                        Analaysis:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="medicinal_analysis"
                                                                        id="medicinal_analysis">
                                                                </div>

                                                                <div class="col-md-4 form-group">
                                                                    <label>device:</label>
                                                                    <select id="device" name="device"
                                                                        class="form-control">


                                                                    </select>
                                                                </div>
                                                                <input type="hidden"
                                                                    class="form-control"name="device_id"
                                                                    id="iddevice">

                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary"
                                                            id="addrecord">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Add -->

                                        <!-- Start Modal Show -->
                                        <div class="modal fade" id="exampleModal-show" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-record" role="document">
                                                <div class="modal-content dark-edition">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="carouselExampleIndicators" class="carousel slide"
                                                            data-ride="carousel">
                                                            <ol class="carousel-indicators">
                                                                <li data-target="#carouselExampleIndicators"
                                                                    data-slide-to="0" class="active"></li>
                                                                <li data-target="#carouselExampleIndicators"
                                                                    data-slide-to="1">
                                                                </li>
                                                                <li data-target="#carouselExampleIndicators"
                                                                    data-slide-to="2">
                                                                </li>
                                                            </ol>
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <form id="showForm1">
                                                                        <input type="hidden" name="id"
                                                                            id="recordId">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Medical
                                                                            History:</h5>

                                                                        <div
                                                                            class="my-3 d-flex flex-wrap justify-content-between">
                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_blood_pressure"
                                                                                        value="1"
                                                                                        name="blood_pressure">Blood
                                                                                    Pressure
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-asthma"
                                                                                        value="1"
                                                                                        name="asthma">Asthma
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-diabetes"
                                                                                        value="1"
                                                                                        name="diabetes">Diabetes
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_renal_disease"
                                                                                        value="1"
                                                                                        name="renal_disease">Renal
                                                                                    Disease
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-tumors"
                                                                                        value="1"
                                                                                        name="tumors">Tumors
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                        </div>

                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Common
                                                                            Symptoms:</h5>
                                                                        <div
                                                                            class="my-3 d-flex flex-wrap justify-content-between">
                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-headache"
                                                                                        value="1"
                                                                                        name="headache">Headiche
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-dizziness" value="1"
                                                                                        name="dizziness">Dizziness
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_chest_pain"
                                                                                        value="1"
                                                                                        name="chest_pain">Chest
                                                                                    Pain
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_heart_disease"
                                                                                        value="1"
                                                                                        name="heart_disease">Heart
                                                                                    Disease
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-dyspnea"
                                                                                        value="1"
                                                                                        name="dyspnea">Dyspnea
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-cough"
                                                                                        value="1"
                                                                                        name="cough">Congh
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_abdominal_pain"
                                                                                        value="1"
                                                                                        name="abdominal_pain">Abdominal
                                                                                    Pain
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-diarhea"
                                                                                        value="1"
                                                                                        name="diarhea">Diarheaa
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-constipation"
                                                                                        value="1"
                                                                                        name="constipation">Constipation
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-vomiting"
                                                                                        value="1"
                                                                                        name="vomiting">Vomiting
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-arthralgia"
                                                                                        value="1"
                                                                                        name="arthralgia">Arthralgia
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Blood
                                                                                        Pressure:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="blood_pressure_rate"
                                                                                        id="up_blood_pressure_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Respiratary
                                                                                        Rate:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="respiratory_rate"
                                                                                        id="up_respiratory_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Heart
                                                                                        Rate:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="heart_rate"
                                                                                        id="up_heart_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Saturation:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="saturation_rate"
                                                                                        id="up_saturation_rate">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Medical
                                                                                    History:</label>
                                                                                <textarea class="form-control" rows="3" id="up_medicinal_history" name="medicinal_history"></textarea>
                                                                            </div>

                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Surgical
                                                                                    History:</label>
                                                                                <textarea class="form-control" rows="3" id="up_surgical_history" name="surgical_history"></textarea>
                                                                            </div>

                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Patient
                                                                                    Story:</label>
                                                                                <textarea class="form-control" rows="3" id="up-story" name="story"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col form-group">
                                                                                <label
                                                                                    class="bmd-label-floating">Diagnosis:</label>
                                                                                <textarea class="form-control" rows="4" id="up-diagnosis" name="diagnosis"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 mt-3 form-group">
                                                                                <label class="bmd-label-floating">Medical
                                                                                    Analaysis:</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    name="medicinal_analysis"
                                                                                    id="up_medicinal_analysis">
                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <form id="showForm2">
                                                                        <input type="hidden" name="id"
                                                                            id="recordId">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Medical
                                                                            History:</h5>

                                                                        <div
                                                                            class="my-3 d-flex flex-wrap justify-content-between">
                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_blood_pressure"
                                                                                        value="1"
                                                                                        name="blood_pressure">Blood
                                                                                    Pressure
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-asthma"
                                                                                        value="1"
                                                                                        name="asthma">Asthma
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-diabetes"
                                                                                        value="1"
                                                                                        name="diabetes">Diabetes
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_renal_disease"
                                                                                        value="1"
                                                                                        name="renal_disease">Renal
                                                                                    Disease
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-tumors"
                                                                                        value="1"
                                                                                        name="tumors">Tumors
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                        </div>

                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Common
                                                                            Symptoms:</h5>
                                                                        <div
                                                                            class="my-3 d-flex flex-wrap justify-content-between">
                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-headache"
                                                                                        value="1"
                                                                                        name="headache">Headiche
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-dizziness" value="1"
                                                                                        name="dizziness">Dizziness
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_chest_pain"
                                                                                        value="1"
                                                                                        name="chest_pain">Chest
                                                                                    Pain
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_heart_disease"
                                                                                        value="1"
                                                                                        name="heart_disease">Heart
                                                                                    Disease
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-dyspnea"
                                                                                        value="1"
                                                                                        name="dyspnea">Dyspnea
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-cough"
                                                                                        value="1"
                                                                                        name="cough">Congh
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_abdominal_pain"
                                                                                        value="1"
                                                                                        name="abdominal_pain">Abdominal
                                                                                    Pain
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-diarhea"
                                                                                        value="1"
                                                                                        name="diarhea">Diarheaa
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-constipation"
                                                                                        value="1"
                                                                                        name="constipation">Constipation
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-vomiting"
                                                                                        value="1"
                                                                                        name="vomiting">Vomiting
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-arthralgia"
                                                                                        value="1"
                                                                                        name="arthralgia">Arthralgia
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Blood
                                                                                        Pressure:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="blood_pressure_rate"
                                                                                        id="up_blood_pressure_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Respiratary
                                                                                        Rate:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="respiratory_rate"
                                                                                        id="up_respiratory_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Heart
                                                                                        Rate:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="heart_rate"
                                                                                        id="up_heart_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Saturation:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="saturation_rate"
                                                                                        id="up_saturation_rate">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Medical
                                                                                    History:</label>
                                                                                <textarea class="form-control" rows="3" id="up_medicinal_history" name="medicinal_history"></textarea>
                                                                            </div>

                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Surgical
                                                                                    History:</label>
                                                                                <textarea class="form-control" rows="3" id="up_surgical_history" name="surgical_history"></textarea>
                                                                            </div>

                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Patient
                                                                                    Story:</label>
                                                                                <textarea class="form-control" rows="3" id="up-story" name="story"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col form-group">
                                                                                <label
                                                                                    class="bmd-label-floating">Diagnosis:</label>
                                                                                <textarea class="form-control" rows="4" id="up-diagnosis" name="diagnosis"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 mt-3 form-group">
                                                                                <label class="bmd-label-floating">Medical
                                                                                    Analaysis:</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    name="medicinal_analysis"
                                                                                    id="up_medicinal_analysis">
                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <form id="showForm33">
                                                                        <input type="hidden" name="id"
                                                                            id="recordId">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Medical
                                                                            History:</h5>

                                                                        <div
                                                                            class="my-3 d-flex flex-wrap justify-content-between">
                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_blood_pressure"
                                                                                        value="1"
                                                                                        name="blood_pressure">Blood
                                                                                    Pressure
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-asthma"
                                                                                        value="1"
                                                                                        name="asthma">Asthma
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-diabetes"
                                                                                        value="1"
                                                                                        name="diabetes">Diabetes
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_renal_disease"
                                                                                        value="1"
                                                                                        name="renal_disease">Renal
                                                                                    Disease
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-tumors"
                                                                                        value="1"
                                                                                        name="tumors">Tumors
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                        </div>

                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Common
                                                                            Symptoms:</h5>
                                                                        <div
                                                                            class="my-3 d-flex flex-wrap justify-content-between">
                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-headache"
                                                                                        value="1"
                                                                                        name="headache">Headiche
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-dizziness" value="1"
                                                                                        name="dizziness">Dizziness
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_chest_pain"
                                                                                        value="1"
                                                                                        name="chest_pain">Chest
                                                                                    Pain
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_heart_disease"
                                                                                        value="1"
                                                                                        name="heart_disease">Heart
                                                                                    Disease
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-dyspnea"
                                                                                        value="1"
                                                                                        name="dyspnea">Dyspnea
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-cough"
                                                                                        value="1"
                                                                                        name="cough">Congh
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_abdominal_pain"
                                                                                        value="1"
                                                                                        name="abdominal_pain">Abdominal
                                                                                    Pain
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-diarhea"
                                                                                        value="1"
                                                                                        name="diarhea">Diarheaa
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-constipation"
                                                                                        value="1"
                                                                                        name="constipation">Constipation
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-vomiting"
                                                                                        value="1"
                                                                                        name="vomiting">Vomiting
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-arthralgia"
                                                                                        value="1"
                                                                                        name="arthralgia">Arthralgia
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Blood
                                                                                        Pressure:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="blood_pressure_rate"
                                                                                        id="up_blood_pressure_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Respiratary
                                                                                        Rate:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="respiratory_rate"
                                                                                        id="up_respiratory_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Heart
                                                                                        Rate:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="heart_rate"
                                                                                        id="up_heart_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Saturation:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="saturation_rate"
                                                                                        id="up_saturation_rate">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Medical
                                                                                    History:</label>
                                                                                <textarea class="form-control" rows="3" id="up_medicinal_history" name="medicinal_history"></textarea>
                                                                            </div>

                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Surgical
                                                                                    History:</label>
                                                                                <textarea class="form-control" rows="3" id="up_surgical_history" name="surgical_history"></textarea>
                                                                            </div>

                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Patient
                                                                                    Story:</label>
                                                                                <textarea class="form-control" rows="3" id="up-story" name="story"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col form-group">
                                                                                <label
                                                                                    class="bmd-label-floating">Diagnosis:</label>
                                                                                <textarea class="form-control" rows="4" id="up-diagnosis" name="diagnosis"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 mt-3 form-group">
                                                                                <label class="bmd-label-floating">Medical
                                                                                    Analaysis:</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    name="medicinal_analysis"
                                                                                    id="up_medicinal_analysis">
                                                                            </div>

                                                                            {{-- <div class="col-md-4 form-group">
                                                                                <label for="inputState">Devices:</label>
                                                                                <select id="up-device" name="device"
                                                                                    class="form-control">
                                                                                </select>
                                                                            </div> --}}

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary cancel"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Show -->

                                        <!-- Start Modal Update -->
                                        <div class="modal fade" id="exampleModal-update" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-record" role="document">
                                                <div class="modal-content dark-edition">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-white" id="exampleModalLabel">
                                                            Patient Record
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="updateFormcheck">
                                                            <input type="hidden" name="id" id="upId">
                                                            <h5 class="modal-title" id="exampleModalLabel">Medical
                                                                History:</h5>

                                                            <div class="my-3 d-flex flex-wrap justify-content-between">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up_blood_pressure"
                                                                            value="1" name="blood_pressure">Blood
                                                                        Pressure
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-asthma"
                                                                            value="1" name="asthma">Asthma
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-diabetes"
                                                                            value="1" name="diabetes">Diabetes
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up_renal_disease"
                                                                            value="1" name="renal_disease">Renal
                                                                        Disease
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-tumors"
                                                                            value="1" name="tumors">Tumors
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                            </div>

                                                            <h5 class="modal-title" id="exampleModalLabel">Common
                                                                Symptoms:</h5>
                                                            <div class="my-3 d-flex flex-wrap justify-content-between">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-headache"
                                                                            value="1" name="headache">Headiche
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-dizziness"
                                                                            value="1" name="dizziness">Dizziness
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up_chest_pain"
                                                                            value="1" name="chest_pain">Chest Pain
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up_heart_disease"
                                                                            value="1" name="heart_disease">Heart
                                                                        Disease
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-dyspnea"
                                                                            value="1" name="dyspnea">Dyspnea
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-cough"
                                                                            value="1" name="cough">Congh
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up_abdominal_pain"
                                                                            value="1"
                                                                            name="abdominal_pain">Abdominal
                                                                        Pain
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-diarhea"
                                                                            value="1" name="diarhea">Diarheaa
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-constipation"
                                                                            value="1"
                                                                            name="constipation">Constipation
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-vomiting"
                                                                            value="1" name="vomiting">Vomiting
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input myCheckbox"
                                                                            type="checkbox" id="up-arthralgia"
                                                                            value="1" name="arthralgia">Arthralgia
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Blood
                                                                            Pressure:</label>
                                                                        <input type="tel" class="form-control"
                                                                            name="blood_pressure_rate"
                                                                            id="up_blood_pressure_rate">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Respiratary
                                                                            Rate:</label>
                                                                        <input type="tel" class="form-control"
                                                                            name="respiratory_rate"
                                                                            id="up_respiratory_rate">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Heart
                                                                            Rate:</label>
                                                                        <input type="tel" class="form-control"
                                                                            name="heart_rate" id="up_heart_rate">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="bmd-label-floating">Saturation:</label>
                                                                        <input type="tel" class="form-control"
                                                                            name="saturation_rate"
                                                                            id="up_saturation_rate">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 form-group">
                                                                    <label class="bmd-label-floating">Medical
                                                                        History:</label>
                                                                    <textarea class="form-control" rows="3" id="up_medicinal_history" name="medicinal_history"></textarea>
                                                                </div>

                                                                <div class="col-md-4 form-group">
                                                                    <label class="bmd-label-floating">Surgical
                                                                        History:</label>
                                                                    <textarea class="form-control" rows="3" id="up_surgical_history" name="surgical_history"></textarea>
                                                                </div>

                                                                <div class="col-md-4 form-group">
                                                                    <label class="bmd-label-floating">Patient
                                                                        Story:</label>
                                                                    <textarea class="form-control" rows="3" id="up-story" name="story"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col form-group">
                                                                    <label class="bmd-label-floating">Diagnosis:</label>
                                                                    <textarea class="form-control" rows="4" id="up-diagnosis" name="diagnosis"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 mt-3 form-group">
                                                                    <label class="bmd-label-floating">Medical
                                                                        Analaysis:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="medicinal_analysis"
                                                                        id="up_medicinal_analysis">
                                                                </div>

                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary "
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary"
                                                            id="updateRecord">
                                                            Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Update -->
                                    </div>
                                </div>

                                <div class="tab-pane" id="all">
                                    <div class="table-responsive">
                                        <table class="table " id="table" data-toggle="table" data-search="true"
                                            data-pagination="true" data-toolbar="#toolbar">
                                            <thead class=" text-primary">
                                                <th data-sortable="true">ID</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Status</th>
                                                <th>Address</th>
                                                <th>Age</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Show</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($patients as $patient)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $patient->fname }} {{ $patient->lname }}</td>
                                                        <td>{{ $patient->gender }}</td>
                                                        <td>{{ $patient->marital_status }}</td>
                                                        <td>{{ $patient->address }}</td>
                                                        <td>{{ $patient->birth }}</td>
                                                        <td>{{ $patient->phone_number }}</td>
                                                        @if ($patient->email && filter_var($patient->email, FILTER_VALIDATE_EMAIL))
                                                            <td>{{ $patient->email }}</td>
                                                            <td class="icon"><a
                                                                    class="material-symbols-outlined text-danger">report_off</a>
                                                            </td>
                                                        @else
                                                            <td>-</td>

                                                            <td class="icon"><a
                                                                    class="material-symbols-outlined text-info show-record-all"
                                                                    data-toggle="modal"
                                                                    data-target="#exampleModal-show-all"
                                                                    aria-hidden="true"
                                                                    data-recordall="{{ $patient->id }}">visibility</a>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

                                        <!-- Start Modal Show -->
                                        <div class="modal fade" id="exampleModal-show-all" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-record" role="document">
                                                <div class="modal-content dark-edition">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="carouselExampleIndicatorsall" class="carousel slide"
                                                            data-ride="carousel">
                                                            <ol class="carousel-indicators">
                                                                <li data-target="#carouselExampleIndicatorsall"
                                                                    data-slide-to="0" class="active"></li>
                                                                <li data-target="#carouselExampleIndicatorsall"
                                                                    data-slide-to="1">
                                                                </li>
                                                                <li data-target="#carouselExampleIndicatorsall"
                                                                    data-slide-to="2">
                                                                </li>
                                                            </ol>
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <form id="showForm11">
                                                                        <input type="hidden" name="id"
                                                                            id="recordId">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Medical
                                                                            History:</h5>

                                                                        <div
                                                                            class="my-3 d-flex flex-wrap justify-content-between">
                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_blood_pressure"
                                                                                        value="1"
                                                                                        name="blood_pressure">Blood
                                                                                    Pressure
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-asthma"
                                                                                        value="1"
                                                                                        name="asthma">Asthma
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-diabetes"
                                                                                        value="1"
                                                                                        name="diabetes">Diabetes
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_renal_disease"
                                                                                        value="1"
                                                                                        name="renal_disease">Renal
                                                                                    Disease
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-tumors"
                                                                                        value="1"
                                                                                        name="tumors">Tumors
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                        </div>

                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Common
                                                                            Symptoms:</h5>
                                                                        <div
                                                                            class="my-3 d-flex flex-wrap justify-content-between">
                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-headache"
                                                                                        value="1"
                                                                                        name="headache">Headiche
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-dizziness" value="1"
                                                                                        name="dizziness">Dizziness
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_chest_pain"
                                                                                        value="1"
                                                                                        name="chest_pain">Chest
                                                                                    Pain
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_heart_disease"
                                                                                        value="1"
                                                                                        name="heart_disease">Heart
                                                                                    Disease
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-dyspnea"
                                                                                        value="1"
                                                                                        name="dyspnea">Dyspnea
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-cough"
                                                                                        value="1"
                                                                                        name="cough">Congh
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_abdominal_pain"
                                                                                        value="1"
                                                                                        name="abdominal_pain">Abdominal
                                                                                    Pain
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-diarhea"
                                                                                        value="1"
                                                                                        name="diarhea">Diarheaa
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-constipation"
                                                                                        value="1"
                                                                                        name="constipation">Constipation
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-vomiting"
                                                                                        value="1"
                                                                                        name="vomiting">Vomiting
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-arthralgia"
                                                                                        value="1"
                                                                                        name="arthralgia">Arthralgia
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Blood
                                                                                        Pressure:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="blood_pressure_rate"
                                                                                        id="up_blood_pressure_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Respiratary
                                                                                        Rate:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="respiratory_rate"
                                                                                        id="up_respiratory_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Heart
                                                                                        Rate:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="heart_rate"
                                                                                        id="up_heart_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Saturation:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="saturation_rate"
                                                                                        id="up_saturation_rate">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Medical
                                                                                    History:</label>
                                                                                <textarea class="form-control" rows="3" id="up_medicinal_history" name="medicinal_history"></textarea>
                                                                            </div>

                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Surgical
                                                                                    History:</label>
                                                                                <textarea class="form-control" rows="3" id="up_surgical_history" name="surgical_history"></textarea>
                                                                            </div>

                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Patient
                                                                                    Story:</label>
                                                                                <textarea class="form-control" rows="3" id="up-story" name="story"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col form-group">
                                                                                <label
                                                                                    class="bmd-label-floating">Diagnosis:</label>
                                                                                <textarea class="form-control" rows="4" id="up-diagnosis" name="diagnosis"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 mt-3 form-group">
                                                                                <label class="bmd-label-floating">Medical
                                                                                    Analaysis:</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    name="medicinal_analysis"
                                                                                    id="up_medicinal_analysis">
                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <form id="showForm22">
                                                                        <input type="hidden" name="id"
                                                                            id="recordId">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Medical
                                                                            History:</h5>

                                                                        <div
                                                                            class="my-3 d-flex flex-wrap justify-content-between">
                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_blood_pressure"
                                                                                        value="1"
                                                                                        name="blood_pressure">Blood
                                                                                    Pressure
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-asthma"
                                                                                        value="1"
                                                                                        name="asthma">Asthma
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-diabetes"
                                                                                        value="1"
                                                                                        name="diabetes">Diabetes
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_renal_disease"
                                                                                        value="1"
                                                                                        name="renal_disease">Renal
                                                                                    Disease
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-tumors"
                                                                                        value="1"
                                                                                        name="tumors">Tumors
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                        </div>

                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Common
                                                                            Symptoms:</h5>
                                                                        <div
                                                                            class="my-3 d-flex flex-wrap justify-content-between">
                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-headache"
                                                                                        value="1"
                                                                                        name="headache">Headiche
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-dizziness" value="1"
                                                                                        name="dizziness">Dizziness
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_chest_pain"
                                                                                        value="1"
                                                                                        name="chest_pain">Chest
                                                                                    Pain
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_heart_disease"
                                                                                        value="1"
                                                                                        name="heart_disease">Heart
                                                                                    Disease
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-dyspnea"
                                                                                        value="1"
                                                                                        name="dyspnea">Dyspnea
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-cough"
                                                                                        value="1"
                                                                                        name="cough">Congh
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_abdominal_pain"
                                                                                        value="1"
                                                                                        name="abdominal_pain">Abdominal
                                                                                    Pain
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-diarhea"
                                                                                        value="1"
                                                                                        name="diarhea">Diarheaa
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-constipation"
                                                                                        value="1"
                                                                                        name="constipation">Constipation
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-vomiting"
                                                                                        value="1"
                                                                                        name="vomiting">Vomiting
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-arthralgia"
                                                                                        value="1"
                                                                                        name="arthralgia">Arthralgia
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Blood
                                                                                        Pressure:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="blood_pressure_rate"
                                                                                        id="up_blood_pressure_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Respiratary
                                                                                        Rate:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="respiratory_rate"
                                                                                        id="up_respiratory_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Heart
                                                                                        Rate:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="heart_rate"
                                                                                        id="up_heart_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Saturation:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="saturation_rate"
                                                                                        id="up_saturation_rate">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Medical
                                                                                    History:</label>
                                                                                <textarea class="form-control" rows="3" id="up_medicinal_history" name="medicinal_history"></textarea>
                                                                            </div>

                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Surgical
                                                                                    History:</label>
                                                                                <textarea class="form-control" rows="3" id="up_surgical_history" name="surgical_history"></textarea>
                                                                            </div>

                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Patient
                                                                                    Story:</label>
                                                                                <textarea class="form-control" rows="3" id="up-story" name="story"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col form-group">
                                                                                <label
                                                                                    class="bmd-label-floating">Diagnosis:</label>
                                                                                <textarea class="form-control" rows="4" id="up-diagnosis" name="diagnosis"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 mt-3 form-group">
                                                                                <label class="bmd-label-floating">Medical
                                                                                    Analaysis:</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    name="medicinal_analysis"
                                                                                    id="up_medicinal_analysis">
                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <form id="showForm33">
                                                                        <input type="hidden" name="id"
                                                                            id="recordId">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Medical
                                                                            History:</h5>

                                                                        <div
                                                                            class="my-3 d-flex flex-wrap justify-content-between">
                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_blood_pressure"
                                                                                        value="1"
                                                                                        name="blood_pressure">Blood
                                                                                    Pressure
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-asthma"
                                                                                        value="1"
                                                                                        name="asthma">Asthma
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-diabetes"
                                                                                        value="1"
                                                                                        name="diabetes">Diabetes
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_renal_disease"
                                                                                        value="1"
                                                                                        name="renal_disease">Renal
                                                                                    Disease
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-tumors"
                                                                                        value="1"
                                                                                        name="tumors">Tumors
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                        </div>

                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Common
                                                                            Symptoms:</h5>
                                                                        <div
                                                                            class="my-3 d-flex flex-wrap justify-content-between">
                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-headache"
                                                                                        value="1"
                                                                                        name="headache">Headiche
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-dizziness" value="1"
                                                                                        name="dizziness">Dizziness
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_chest_pain"
                                                                                        value="1"
                                                                                        name="chest_pain">Chest
                                                                                    Pain
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_heart_disease"
                                                                                        value="1"
                                                                                        name="heart_disease">Heart
                                                                                    Disease
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-dyspnea"
                                                                                        value="1"
                                                                                        name="dyspnea">Dyspnea
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-cough"
                                                                                        value="1"
                                                                                        name="cough">Congh
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up_abdominal_pain"
                                                                                        value="1"
                                                                                        name="abdominal_pain">Abdominal
                                                                                    Pain
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-diarhea"
                                                                                        value="1"
                                                                                        name="diarhea">Diarheaa
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-constipation"
                                                                                        value="1"
                                                                                        name="constipation">Constipation
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox" id="up-vomiting"
                                                                                        value="1"
                                                                                        name="vomiting">Vomiting
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check form-check-inline">
                                                                                <label class="form-check-label">
                                                                                    <input
                                                                                        class="form-check-input myCheckbox"
                                                                                        type="checkbox"
                                                                                        id="up-arthralgia"
                                                                                        value="1"
                                                                                        name="arthralgia">Arthralgia
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Blood
                                                                                        Pressure:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="blood_pressure_rate"
                                                                                        id="up_blood_pressure_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Respiratary
                                                                                        Rate:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="respiratory_rate"
                                                                                        id="up_respiratory_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Heart
                                                                                        Rate:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="heart_rate"
                                                                                        id="up_heart_rate">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="bmd-label-floating">Saturation:</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        name="saturation_rate"
                                                                                        id="up_saturation_rate">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Medical
                                                                                    History:</label>
                                                                                <textarea class="form-control" rows="3" id="up_medicinal_history" name="medicinal_history"></textarea>
                                                                            </div>

                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Surgical
                                                                                    History:</label>
                                                                                <textarea class="form-control" rows="3" id="up_surgical_history" name="surgical_history"></textarea>
                                                                            </div>

                                                                            <div class="col-md-4 form-group">
                                                                                <label class="bmd-label-floating">Patient
                                                                                    Story:</label>
                                                                                <textarea class="form-control" rows="3" id="up-story" name="story"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col form-group">
                                                                                <label
                                                                                    class="bmd-label-floating">Diagnosis:</label>
                                                                                <textarea class="form-control" rows="4" id="up-diagnosis" name="diagnosis"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 mt-3 form-group">
                                                                                <label class="bmd-label-floating">Medical
                                                                                    Analaysis:</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    name="medicinal_analysis"
                                                                                    id="up_medicinal_analysis">
                                                                            </div>

                                                                            {{-- <div class="col-md-4 form-group">
                                                                                <label for="inputState">Devices:</label>
                                                                                <select id="up-device" name="device"
                                                                                    class="form-control">
                                                                                </select>
                                                                            </div> --}}

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary cancel"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Show -->
                                    </div>
                                </div>
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
            let options = '';
            let url = window.location.href;
            let doctorId = url.substring(url.lastIndexOf('/') + 1);
            console.log(doctorId);
            $('#doctor_id').val(doctorId);
            $('#upDoctorId').val(doctorId);

            let device = $('#device');
            let updevice = $('#updevice');
            console.log(device);

            $('select').mousemove(function() {
                $(this).find('.optionhidden').hide();
            });

            $.ajax({
                url: "{{ route('device.record') }}",
                type: 'GET',

                success: function(response) {
                    let options = '';
                    options += '<option class="optionhidden"></option>';
                    response.forEach(function(device) {
                        options += '<option  value="' + device.id + '">' +
                            device.name + '</option>';
                    });
                    $('#device').empty().append(options);
                    $('#updevice').empty().append(options);
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error('Failed to fetch available times:', error);
                }
            });

            $('#device').on('change', function() {
                device = $(this).val();
                $('#iddevice').val(device);
            });


            //////////////////////////////////////////////// Clinic ////////////////////////////////////////////////

            //Add Record
            let recordidadd ='';
            $(document).on('click', '.add-record', function() {

                 recordidadd = $(this).data('record');
                console.log(recordidadd);
                $('#id').val(recordidadd);
            });
            $(document).on('click', '#addrecord', function(e) {

                e.preventDefault();
                let formData = new FormData($('#addFrom')[0]);

                if ($('#iddevice').val() === "") {
                    // إذا كانت القيمة فارغة، يتم حذف العنصر من FormData
                    formData.delete('device_id');
                }

                $.ajax({
                    type: "POST",
                    enctype: "multipart/form-data",
                    url: '/doctor/record/add/' + recordidadd,
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(response) {
                        location.reload();
                        if (response.status == true) {
                            toastr.success('The record has been added successfully.')
                        }
                    },
                    error: function(response) {
                        @if (Auth::guard('secretary')->check())
                            toastr.error(
                                'Please verify that the information entered is correct.'
                            );
                        @else
                            toastr.error(
                                'You do not have permission to add an record.');
                        @endif
                    }
                });
            });

            // Show last
            $(document).on('click', '.update-record', function() {
                let recordId = $(this).data('lolo');
                console.log(recordId);

                $.ajax({
                    type: "GET",
                    url: '/doctor/record/last/' + recordId,
                    dataType: 'json',

                    success: function(response) {
                        console.log(response);

                        if (response.blood_pressure == 1) {
                            $('#updateForm #up_blood_pressure').prop('checked', true);
                        } else {
                            $('#updateForm #up_blood_pressure').prop('checked', false);
                        }

                        if (response.asthma == 1) {
                            $('#updateForm #up-asthma').prop('checked', true);
                        } else {
                            $('#updateForm #up-asthma').prop('checked', false);
                        }

                        if (response.diabetes == 1) {
                            $('#updateForm #up-diabetes').prop('checked', true);
                        } else {
                            $('#updateForm #up-diabetes').prop('checked', false);
                        }

                        if (response.renal_disease == 1) {
                            $('#updateForm #up_renal_disease').prop('checked', true);
                        } else {
                            $('#updateForm #up_renal_disease').prop('checked', false);
                        }

                        if (response.tumors == 1) {
                            $('#updateForm #up-tumors').prop('checked', true);
                        } else {
                            $('#updateForm #up-tumors').prop('checked', false);
                        }

                        if (response.headache == 1) {
                            $('#updateForm #up-headache').prop('checked', true);
                        } else {
                            $('#updateForm #up-headache').prop('checked', false);
                        }

                        if (response.dizziness == 1) {
                            $('#updateForm #up-dizziness').prop('checked', true);
                        } else {
                            $('#updateForm #up-dizziness').prop('checked', false);
                        }

                        if (response.chest_pain == 1) {
                            $('#updateForm #up_chest_pain').prop('checked', true);
                        } else {
                            $('#updateForm #up_chest_pain').prop('checked', false);
                        }

                        if (response.heart_disease == 1) {
                            $('#updateForm #up_heart_disease').prop('checked', true);
                        } else {
                            $('#updateForm #up_heart_disease').prop('checked', false);
                        }

                        if (response.dyspnea == 1) {
                            $('#updateForm #up-dyspnea').prop('checked', true);
                        } else {
                            $('#updateForm #up-dyspnea').prop('checked', false);
                        }

                        if (response.cough == 1) {
                            $('#updateForm #up-cough').prop('checked', true);
                        } else {
                            $('#updateForm #up-cough').prop('checked', false);
                        }

                        if (response.abdominal_pain == 1) {
                            $('#updateForm #up_abdominal_pain').prop('checked', true);
                        } else {
                            $('#updateForm #up_abdominal_pain').prop('checked', false);
                        }

                        if (response.diarhea == 1) {
                            $('#updateForm #up-diarhea').prop('checked', true);
                        } else {
                            $('#updateForm #up-diarhea').prop('checked', false);
                        }

                        if (response.constipation == 1) {
                            $('#updateForm #up-constipation').prop('checked', true);
                        } else {
                            $('#updateForm #up-constipation').prop('checked', false);
                        }

                        if (response.vomiting == 1) {
                            $('#updateForm #up-vomiting').prop('checked', true);
                        } else {
                            $('#updateForm #up-vomiting').prop('checked', false);
                        }

                        if (response.arthralgia == 1) {
                            $('#updateForm #up-arthralgia').prop('checked', true);
                        } else {
                            $('#updateForm #up-arthralgia').prop('checked', false);
                        }

                        $('#updateForm #up_blood_pressure_rate').val(response
                            .blood_pressure_rate);
                        $('#updateForm #upId').val(response.id);
                        $('#updateForm #up_respiratory_rate').val(response.respiratory_rate);
                        $('#updateForm #up_heart_rate').val(response.heart_rate);
                        $('#updateForm #up_saturation_rate').val(response.saturation_rate);
                        $('#updateForm #up_medicinal_history').val(response.medicinal_history);
                        $('#updateForm #up_surgical_history').val(response.surgical_history);
                        $('#updateForm #up-story').val(response.story);
                        $('#updateForm #up-diagnosis').val(response.diagnosis);
                        $('#updateForm #up_medicinal_analysis').val(response
                            .medicinal_analysis);

                    },
                    error: function(response) {

                    }
                });
            });

            // Update Appointment
            $(document).on('click', '#updateRecord', function(e) {
                e.preventDefault();

                let id = $('#upId').val();
                let updateFormData = new FormData($('#updateForm')[0]);

                $('#updateForm input[type="checkbox"]').each(function() {
                    var isChecked = $(this).is(':checked') ? 1 : 0;
                    updateFormData.set(this.name, isChecked);
                });

                $.ajax({
                    type: "POST",
                    url: '/doctor/record/update/' + id,
                    data: updateFormData,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        toastr.success('The record has been updated successfully.')
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

            // Show
            $(document).on('click', '.show-record', function() {
                let recordId = $(this).data('record');
                console.log(recordId);

                $.ajax({
                    type: "GET",
                    url: '/doctor/record/index/' + recordId,
                    dataType: 'json',

                    success: function(response) {
                        console.log(response);
                        if (response.length > 0) {
                            if (response[0].blood_pressure == 1) {
                                $('#showForm1 #up_blood_pressure').prop('checked', true);
                            } else {
                                $('#showForm1 #up_blood_pressure').prop('checked', false);
                            }

                            if (response[0].asthma == 1) {
                                $('#showForm1 #up-asthma').prop('checked', true);
                            } else {
                                $('#showForm1 #up-asthma').prop('checked', false);
                            }

                            if (response[0].diabetes == 1) {
                                $('#showForm1 #up-diabetes').prop('checked', true);
                            } else {
                                $('#showForm1 #up-diabetes').prop('checked', false);
                            }

                            if (response[0].renal_disease == 1) {
                                $('#showForm1 #up_renal_disease').prop('checked', true);
                            } else {
                                $('#showForm1 #up_renal_disease').prop('checked', false);
                            }

                            if (response[0].tumors == 1) {
                                $('#showForm1 #up-tumors').prop('checked', true);
                            } else {
                                $('#showForm1 #up-tumors').prop('checked', false);
                            }

                            if (response[0].headache == 1) {
                                $('#showForm1 #up-headache').prop('checked', true);
                            } else {
                                $('#showForm1 #up-headache').prop('checked', false);
                            }

                            if (response[0].dizziness == 1) {
                                $('#showForm1 #up-dizziness').prop('checked', true);
                            } else {
                                $('#showForm1 #up-dizziness').prop('checked', false);
                            }

                            if (response[0].chest_pain == 1) {
                                $('#showForm1 #up_chest_pain').prop('checked', true);
                            } else {
                                $('#showForm1 #up_chest_pain').prop('checked', false);
                            }

                            if (response[0].heart_disease == 1) {
                                $('#showForm1 #up_heart_disease').prop('checked', true);
                            } else {
                                $('#showForm1 #up_heart_disease').prop('checked', false);
                            }

                            if (response[0].dyspnea == 1) {
                                $('#showForm1 #up-dyspnea').prop('checked', true);
                            } else {
                                $('#showForm1 #up-dyspnea').prop('checked', false);
                            }

                            if (response[0].cough == 1) {
                                $('#showForm1 #up-cough').prop('checked', true);
                            } else {
                                $('#showForm1 #up-cough').prop('checked', false);
                            }

                            if (response[0].abdominal_pain == 1) {
                                $('#showForm1 #up_abdominal_pain').prop('checked', true);
                            } else {
                                $('#showForm1 #up_abdominal_pain').prop('checked', false);
                            }

                            if (response[0].diarhea == 1) {
                                $('#showForm1 #up-diarhea').prop('checked', true);
                            } else {
                                $('#showForm1 #up-diarhea').prop('checked', false);
                            }

                            if (response[0].constipation == 1) {
                                $('#showForm1 #up-constipation').prop('checked', true);
                            } else {
                                $('#showForm1 #up-constipation').prop('checked', false);
                            }

                            if (response[0].vomiting == 1) {
                                $('#showForm1 #up-vomiting').prop('checked', true);
                            } else {
                                $('#showForm1 #up-vomiting').prop('checked', false);
                            }

                            if (response[0].arthralgia == 1) {
                                $('#showForm1 #up-arthralgia').prop('checked', true);
                            } else {
                                $('#showForm1 #up-arthralgia').prop('checked', false);
                            }

                            $('#showForm1 #up_blood_pressure_rate').val(response[0]
                                .blood_pressure_rate);
                            $('#showForm1 #recordId').val(response[0].id);
                            $('#showForm1 #up_respiratory_rate').val(response[0]
                                .respiratory_rate);
                            $('#showForm1 #up_heart_rate').val(response[0].heart_rate);
                            $('#showForm1 #up_saturation_rate').val(response[0]
                                .saturation_rate);
                            $('#showForm1 #up_medicinal_history').val(response[0]
                                .medicinal_history);
                            $('#showForm1 #up_surgical_history').val(response[0]
                                .surgical_history);
                            $('#showForm1 #up-story').val(response[0].story);
                            $('#showForm1 #up-diagnosis').val(response[0].diagnosis);
                            $('#showForm1 #up_medicinal_analysis').val(response[0]
                                .medicinal_analysis);



                            ///////////////////// showForm2 /////////////////////
                            if (response[1].blood_pressure == 1) {
                                $('#showForm2 #up_blood_pressure').prop('checked', true);
                            } else {
                                $('#showForm2 #up_blood_pressure').prop('checked', false);
                            }

                            if (response[1].asthma == 1) {
                                $('#showForm2 #up-asthma').prop('checked', true);
                            } else {
                                $('#showForm2 #up-asthma').prop('checked', false);
                            }

                            if (response[1].diabetes == 1) {
                                $('#showForm2 #up-diabetes').prop('checked', true);
                            } else {
                                $('#showForm2 #up-diabetes').prop('checked', false);
                            }

                            if (response[1].renal_disease == 1) {
                                $('#showForm2 #up_renal_disease').prop('checked', true);
                            } else {
                                $('#showForm2 #up_renal_disease').prop('checked', false);
                            }

                            if (response[1].tumors == 1) {
                                $('#showForm2 #up-tumors').prop('checked', true);
                            } else {
                                $('#showForm2 #up-tumors').prop('checked', false);
                            }

                            if (response[1].headache == 1) {
                                $('#showForm2 #up-headache').prop('checked', true);
                            } else {
                                $('#showForm2 #up-headache').prop('checked', false);
                            }

                            if (response[1].dizziness == 1) {
                                $('#showForm2 #up-dizziness').prop('checked', true);
                            } else {
                                $('#showForm2 #up-dizziness').prop('checked', false);
                            }

                            if (response[1].chest_pain == 1) {
                                $('#showForm2 #up_chest_pain').prop('checked', true);
                            } else {
                                $('#showForm2 #up_chest_pain').prop('checked', false);
                            }

                            if (response[1].heart_disease == 1) {
                                $('#showForm2 #up_heart_disease').prop('checked', true);
                            } else {
                                $('#showForm2 #up_heart_disease').prop('checked', false);
                            }

                            if (response[1].dyspnea == 1) {
                                $('#showForm2 #up-dyspnea').prop('checked', true);
                            } else {
                                $('#showForm2 #up-dyspnea').prop('checked', false);
                            }

                            if (response[1].cough == 1) {
                                $('#showForm2 #up-cough').prop('checked', true);
                            } else {
                                $('#showForm2 #up-cough').prop('checked', false);
                            }

                            if (response[1].abdominal_pain == 1) {
                                $('#showForm2 #up_abdominal_pain').prop('checked', true);
                            } else {
                                $('#showForm2 #up_abdominal_pain').prop('checked', false);
                            }

                            if (response[1].diarhea == 1) {
                                $('#showForm2 #up-diarhea').prop('checked', true);
                            } else {
                                $('#showForm2 #up-diarhea').prop('checked', false);
                            }

                            if (response[1].constipation == 1) {
                                $('#showForm2 #up-constipation').prop('checked', true);
                            } else {
                                $('#showForm2 #up-constipation').prop('checked', false);
                            }

                            if (response[1].vomiting == 1) {
                                $('#showForm2 #up-vomiting').prop('checked', true);
                            } else {
                                $('#showForm2 #up-vomiting').prop('checked', false);
                            }

                            if (response[1].arthralgia == 1) {
                                $('#showForm2 #up-arthralgia').prop('checked', true);
                            } else {
                                $('#showForm2 #up-arthralgia').prop('checked', false);
                            }

                            $('#showForm2 #up_blood_pressure_rate').val(response[1]
                                .blood_pressure_rate);
                            $('#showForm2 #recordId').val(response[1].id);
                            $('#showForm2 #up_respiratory_rate').val(response[1]
                                .respiratory_rate);
                            $('#showForm2 #up_heart_rate').val(response[1].heart_rate);
                            $('#showForm2 #up_saturation_rate').val(response[1]
                                .saturation_rate);
                            $('#showForm2 #up_medicinal_history').val(response[1]
                                .medicinal_history);
                            $('#showForm2 #up_surgical_history').val(response[1]
                                .surgical_history);
                            $('#showForm2 #up-story').val(response[1].story);
                            $('#showForm2 #up-diagnosis').val(response[1].diagnosis);
                            $('#showForm2 #up_medicinal_analysis').val(response[1]
                                .medicinal_analysis);

                            // ///////////////////// showForm33 /////////////////////
                            if (response[2].blood_pressure == 1) {
                                $('#showForm33 #up_blood_pressure').prop('checked', true);
                            } else {
                                $('#showForm33 #up_blood_pressure').prop('checked', false);
                            }

                            if (response[2].asthma == 1) {
                                $('#showForm33 #up-asthma').prop('checked', true);
                            } else {
                                $('#showForm33 #up-asthma').prop('checked', false);
                            }

                            if (response[2].diabetes == 1) {
                                $('#showForm33 #up-diabetes').prop('checked', true);
                            } else {
                                $('#showForm33 #up-diabetes').prop('checked', false);
                            }

                            if (response[2].renal_disease == 1) {
                                $('#showForm33 #up_renal_disease').prop('checked', true);
                            } else {
                                $('#showForm33 #up_renal_disease').prop('checked', false);
                            }

                            if (response[2].tumors == 1) {
                                $('#showForm33 #up-tumors').prop('checked', true);
                            } else {
                                $('#showForm33 #up-tumors').prop('checked', false);
                            }

                            if (response[2].headache == 1) {
                                $('#showForm33 #up-headache').prop('checked', true);
                            } else {
                                $('#showForm33 #up-headache').prop('checked', false);
                            }

                            if (response[2].dizziness == 1) {
                                $('#showForm33 #up-dizziness').prop('checked', true);
                            } else {
                                $('#showForm33 #up-dizziness').prop('checked', false);
                            }

                            if (response[2].chest_pain == 1) {
                                $('#showForm33 #up_chest_pain').prop('checked', true);
                            } else {
                                $('#showForm33 #up_chest_pain').prop('checked', false);
                            }

                            if (response[2].heart_disease == 1) {
                                $('#showForm33 #up_heart_disease').prop('checked', true);
                            } else {
                                $('#showForm33 #up_heart_disease').prop('checked', false);
                            }

                            if (response[2].dyspnea == 1) {
                                $('#showForm33 #up-dyspnea').prop('checked', true);
                            } else {
                                $('#showForm33 #up-dyspnea').prop('checked', false);
                            }

                            if (response[2].cough == 1) {
                                $('#showForm33 #up-cough').prop('checked', true);
                            } else {
                                $('#showForm33 #up-cough').prop('checked', false);
                            }

                            if (response[2].abdominal_pain == 1) {
                                $('#showForm33 #up_abdominal_pain').prop('checked', true);
                            } else {
                                $('#showForm33 #up_abdominal_pain').prop('checked', false);
                            }

                            if (response[2].diarhea == 1) {
                                $('#showForm33 #up-diarhea').prop('checked', true);
                            } else {
                                $('#showForm33 #up-diarhea').prop('checked', false);
                            }

                            if (response[2].constipation == 1) {
                                $('#showForm33 #up-constipation').prop('checked', true);
                            } else {
                                $('#showForm33 #up-constipation').prop('checked', false);
                            }

                            if (response[2].vomiting == 1) {
                                $('#showForm33 #up-vomiting').prop('checked', true);
                            } else {
                                $('#showForm33 #up-vomiting').prop('checked', false);
                            }

                            if (response[2].arthralgia == 1) {
                                $('#showForm33 #up-arthralgia').prop('checked', true);
                            } else {
                                $('#showForm33 #up-arthralgia').prop('checked', false);
                            }

                            $('#showForm33 #up_blood_pressure_rate').val(response[2]
                                .blood_pressure_rate);
                            $('#showForm33 #recordId').val(response[2].id);
                            $('#showForm33 #up_respiratory_rate').val(response[2]
                                .respiratory_rate);
                            $('#showForm33 #up_heart_rate').val(response[2].heart_rate);
                            $('#showForm33 #up_saturation_rate').val(response[2]
                                .saturation_rate);
                            $('#showForm33 #up_medicinal_history').val(response[2]
                                .medicinal_history);
                            $('#showForm33 #up_surgical_history').val(response[2]
                                .surgical_history);
                            $('#showForm33 #up-story').val(response[2].story);
                            $('#showForm33 #up-diagnosis').val(response[2].diagnosis);
                            $('#showForm33 #up_medicinal_analysis').val(response[2]
                                .medicinal_analysis);
                        } else {
                            // Set default or clear values for all checkboxes and input fields
                            $('#showForm1 input[type="checkbox"]').prop('checked', false);
                            $('#showForm1 input[type="text"]').val('');
                            $('#showForm1 input[type="number"]').val('');
                            $('#showForm1 textarea:input').val('');

                            $('#showForm2 input[type="checkbox"]').prop('checked', false);
                            $('#showForm2 input[type="text"]').val('');
                            $('#showForm2 input[type="number"]').val('');
                            $('#showForm2 textarea:input').val('');

                            $('#showForm33 input[type="checkbox"]').prop('checked', false);
                            $('#showForm33 input[type="text"]').val('');
                            $('#showForm33 input[type="number"]').val('');
                            $('#showForm33 textarea:input').val('');
                        }
                    },
                    error: function(response) {

                    }
                });
            });
            //////////////////////////////////////////////// Clinic ////////////////////////////////////////////////

            //////////////////////////////////////////////// All ////////////////////////////////////////////////


            // Show Appointment
            $(document).on('click', '.show-record-all', function() {
                let recordId = $(this).data('recordall');
                console.log(recordId);

                $.ajax({
                    type: "GET",
                    url: '/doctor/record/index/' + recordId,
                    dataType: 'json',

                    success: function(response) {
                        console.log(response);
                        if (response.length > 0) {
                            if (response[0].blood_pressure == 1) {
                                $('#showForm11 #up_blood_pressure').prop('checked', true);
                            } else {
                                $('#showForm11 #up_blood_pressure').prop('checked', false);
                            }

                            if (response[0].asthma == 1) {
                                $('#showForm11 #up-asthma').prop('checked', true);
                            } else {
                                $('#showForm11 #up-asthma').prop('checked', false);
                            }

                            if (response[0].diabetes == 1) {
                                $('#showForm11 #up-diabetes').prop('checked', true);
                            } else {
                                $('#showForm11 #up-diabetes').prop('checked', false);
                            }

                            if (response[0].renal_disease == 1) {
                                $('#showForm11 #up_renal_disease').prop('checked', true);
                            } else {
                                $('#showForm11 #up_renal_disease').prop('checked', false);
                            }

                            if (response[0].tumors == 1) {
                                $('#showForm11 #up-tumors').prop('checked', true);
                            } else {
                                $('#showForm11 #up-tumors').prop('checked', false);
                            }

                            if (response[0].headache == 1) {
                                $('#showForm11 #up-headache').prop('checked', true);
                            } else {
                                $('#showForm11 #up-headache').prop('checked', false);
                            }

                            if (response[0].dizziness == 1) {
                                $('#showForm11 #up-dizziness').prop('checked', true);
                            } else {
                                $('#showForm11 #up-dizziness').prop('checked', false);
                            }

                            if (response[0].chest_pain == 1) {
                                $('#showForm11 #up_chest_pain').prop('checked', true);
                            } else {
                                $('#showForm11 #up_chest_pain').prop('checked', false);
                            }

                            if (response[0].heart_disease == 1) {
                                $('#showForm11 #up_heart_disease').prop('checked', true);
                            } else {
                                $('#showForm11 #up_heart_disease').prop('checked', false);
                            }

                            if (response[0].dyspnea == 1) {
                                $('#showForm11 #up-dyspnea').prop('checked', true);
                            } else {
                                $('#showForm11 #up-dyspnea').prop('checked', false);
                            }

                            if (response[0].cough == 1) {
                                $('#showForm11 #up-cough').prop('checked', true);
                            } else {
                                $('#showForm11 #up-cough').prop('checked', false);
                            }

                            if (response[0].abdominal_pain == 1) {
                                $('#showForm11 #up_abdominal_pain').prop('checked', true);
                            } else {
                                $('#showForm11 #up_abdominal_pain').prop('checked', false);
                            }

                            if (response[0].diarhea == 1) {
                                $('#showForm11 #up-diarhea').prop('checked', true);
                            } else {
                                $('#showForm11 #up-diarhea').prop('checked', false);
                            }

                            if (response[0].constipation == 1) {
                                $('#showForm11 #up-constipation').prop('checked', true);
                            } else {
                                $('#showForm11 #up-constipation').prop('checked', false);
                            }

                            if (response[0].vomiting == 1) {
                                $('#showForm11 #up-vomiting').prop('checked', true);
                            } else {
                                $('#showForm11 #up-vomiting').prop('checked', false);
                            }

                            if (response[0].arthralgia == 1) {
                                $('#showForm11 #up-arthralgia').prop('checked', true);
                            } else {
                                $('#showForm11 #up-arthralgia').prop('checked', false);
                            }

                            $('#showForm11 #up_blood_pressure_rate').val(response[0]
                                .blood_pressure_rate);
                            $('#showForm11 #recordId').val(response[0].id);
                            $('#showForm11 #up_respiratory_rate').val(response[0]
                                .respiratory_rate);
                            $('#showForm11 #up_heart_rate').val(response[0].heart_rate);
                            $('#showForm11 #up_saturation_rate').val(response[0]
                                .saturation_rate);
                            $('#showForm11 #up_medicinal_history').val(response[0]
                                .medicinal_history);
                            $('#showForm11 #up_surgical_history').val(response[0]
                                .surgical_history);
                            $('#showForm11 #up-story').val(response[0].story);
                            $('#showForm11 #up-diagnosis').val(response[0].diagnosis);
                            $('#showForm11 #up_medicinal_analysis').val(response[0]
                                .medicinal_analysis);



                            ///////////////////// showForm2 /////////////////////
                            if (response[1].blood_pressure == 1) {
                                $('#showForm22 #up_blood_pressure').prop('checked', true);
                            } else {
                                $('#showForm22 #up_blood_pressure').prop('checked', false);
                            }

                            if (response[1].asthma == 1) {
                                $('#showForm22 #up-asthma').prop('checked', true);
                            } else {
                                $('#showForm22 #up-asthma').prop('checked', false);
                            }

                            if (response[1].diabetes == 1) {
                                $('#showForm22 #up-diabetes').prop('checked', true);
                            } else {
                                $('#showForm22 #up-diabetes').prop('checked', false);
                            }

                            if (response[1].renal_disease == 1) {
                                $('#showForm22 #up_renal_disease').prop('checked', true);
                            } else {
                                $('#showForm22 #up_renal_disease').prop('checked', false);
                            }

                            if (response[1].tumors == 1) {
                                $('#showForm22 #up-tumors').prop('checked', true);
                            } else {
                                $('#showForm22 #up-tumors').prop('checked', false);
                            }

                            if (response[1].headache == 1) {
                                $('#showForm22 #up-headache').prop('checked', true);
                            } else {
                                $('#showForm22 #up-headache').prop('checked', false);
                            }

                            if (response[1].dizziness == 1) {
                                $('#showForm22 #up-dizziness').prop('checked', true);
                            } else {
                                $('#showForm22 #up-dizziness').prop('checked', false);
                            }

                            if (response[1].chest_pain == 1) {
                                $('#showForm22 #up_chest_pain').prop('checked', true);
                            } else {
                                $('#showForm22 #up_chest_pain').prop('checked', false);
                            }

                            if (response[1].heart_disease == 1) {
                                $('#showForm22 #up_heart_disease').prop('checked', true);
                            } else {
                                $('#showForm22 #up_heart_disease').prop('checked', false);
                            }

                            if (response[1].dyspnea == 1) {
                                $('#showForm22 #up-dyspnea').prop('checked', true);
                            } else {
                                $('#showForm22 #up-dyspnea').prop('checked', false);
                            }

                            if (response[1].cough == 1) {
                                $('#showForm22 #up-cough').prop('checked', true);
                            } else {
                                $('#showForm22 #up-cough').prop('checked', false);
                            }

                            if (response[1].abdominal_pain == 1) {
                                $('#showForm22 #up_abdominal_pain').prop('checked', true);
                            } else {
                                $('#showForm22 #up_abdominal_pain').prop('checked', false);
                            }

                            if (response[1].diarhea == 1) {
                                $('#showForm22 #up-diarhea').prop('checked', true);
                            } else {
                                $('#showForm22 #up-diarhea').prop('checked', false);
                            }

                            if (response[1].constipation == 1) {
                                $('#showForm22 #up-constipation').prop('checked', true);
                            } else {
                                $('#showForm22 #up-constipation').prop('checked', false);
                            }

                            if (response[1].vomiting == 1) {
                                $('#showForm22 #up-vomiting').prop('checked', true);
                            } else {
                                $('#showForm22 #up-vomiting').prop('checked', false);
                            }

                            if (response[1].arthralgia == 1) {
                                $('#showForm22 #up-arthralgia').prop('checked', true);
                            } else {
                                $('#showForm22 #up-arthralgia').prop('checked', false);
                            }

                            $('#showForm22 #up_blood_pressure_rate').val(response[1]
                                .blood_pressure_rate);
                            $('#showForm22 #recordId').val(response[1].id);
                            $('#showForm22 #up_respiratory_rate').val(response[1]
                                .respiratory_rate);
                            $('#showForm22 #up_heart_rate').val(response[1].heart_rate);
                            $('#showForm22 #up_saturation_rate').val(response[1]
                                .saturation_rate);
                            $('#showForm22 #up_medicinal_history').val(response[1]
                                .medicinal_history);
                            $('#showForm22 #up_surgical_history').val(response[1]
                                .surgical_history);
                            $('#showForm22 #up-story').val(response[1].story);
                            $('#showForm22 #up-diagnosis').val(response[1].diagnosis);
                            $('#showForm22 #up_medicinal_analysis').val(response[1]
                                .medicinal_analysis);

                            // ///////////////////// showForm3 /////////////////////
                            if (response[2].blood_pressure == 1) {
                                $('#showForm33 #up_blood_pressure').prop('checked', true);
                            } else {
                                $('#showForm33 #up_blood_pressure').prop('checked', false);
                            }

                            if (response[2].asthma == 1) {
                                $('#showForm33 #up-asthma').prop('checked', true);
                            } else {
                                $('#showForm33 #up-asthma').prop('checked', false);
                            }

                            if (response[2].diabetes == 1) {
                                $('#showForm33 #up-diabetes').prop('checked', true);
                            } else {
                                $('#showForm33 #up-diabetes').prop('checked', false);
                            }

                            if (response[2].renal_disease == 1) {
                                $('#showForm33 #up_renal_disease').prop('checked', true);
                            } else {
                                $('#showForm33 #up_renal_disease').prop('checked', false);
                            }

                            if (response[2].tumors == 1) {
                                $('#showForm33 #up-tumors').prop('checked', true);
                            } else {
                                $('#showForm33 #up-tumors').prop('checked', false);
                            }

                            if (response[2].headache == 1) {
                                $('#showForm33 #up-headache').prop('checked', true);
                            } else {
                                $('#showForm33 #up-headache').prop('checked', false);
                            }

                            if (response[2].dizziness == 1) {
                                $('#showForm33 #up-dizziness').prop('checked', true);
                            } else {
                                $('#showForm33 #up-dizziness').prop('checked', false);
                            }

                            if (response[2].chest_pain == 1) {
                                $('#showForm33 #up_chest_pain').prop('checked', true);
                            } else {
                                $('#showForm33 #up_chest_pain').prop('checked', false);
                            }

                            if (response[2].heart_disease == 1) {
                                $('#showForm33 #up_heart_disease').prop('checked', true);
                            } else {
                                $('#showForm33 #up_heart_disease').prop('checked', false);
                            }

                            if (response[2].dyspnea == 1) {
                                $('#showForm33 #up-dyspnea').prop('checked', true);
                            } else {
                                $('#showForm33 #up-dyspnea').prop('checked', false);
                            }

                            if (response[2].cough == 1) {
                                $('#showForm33 #up-cough').prop('checked', true);
                            } else {
                                $('#showForm33 #up-cough').prop('checked', false);
                            }

                            if (response[2].abdominal_pain == 1) {
                                $('#showForm33 #up_abdominal_pain').prop('checked', true);
                            } else {
                                $('#showForm33 #up_abdominal_pain').prop('checked', false);
                            }

                            if (response[2].diarhea == 1) {
                                $('#showForm33 #up-diarhea').prop('checked', true);
                            } else {
                                $('#showForm33 #up-diarhea').prop('checked', false);
                            }

                            if (response[2].constipation == 1) {
                                $('#showForm33 #up-constipation').prop('checked', true);
                            } else {
                                $('#showForm33 #up-constipation').prop('checked', false);
                            }

                            if (response[2].vomiting == 1) {
                                $('#showForm33 #up-vomiting').prop('checked', true);
                            } else {
                                $('#showForm33 #up-vomiting').prop('checked', false);
                            }

                            if (response[2].arthralgia == 1) {
                                $('#showForm33 #up-arthralgia').prop('checked', true);
                            } else {
                                $('#showForm33 #up-arthralgia').prop('checked', false);
                            }

                            $('#showForm33 #up_blood_pressure_rate').val(response[2]
                                .blood_pressure_rate);
                            $('#showForm33 #recordId').val(response[2].id);
                            $('#showForm33 #up_respiratory_rate').val(response[2]
                                .respiratory_rate);
                            $('#showForm33 #up_heart_rate').val(response[2].heart_rate);
                            $('#showForm33 #up_saturation_rate').val(response[2]
                                .saturation_rate);
                            $('#showForm33 #up_medicinal_history').val(response[2]
                                .medicinal_history);
                            $('#showForm33 #up_surgical_history').val(response[2]
                                .surgical_history);
                            $('#showForm33 #up-story').val(response[2].story);
                            $('#showForm33 #up-diagnosis').val(response[2].diagnosis);
                            $('#showForm33 #up_medicinal_analysis').val(response[2]
                                .medicinal_analysis);
                        } else {
                            // Set default or clear values for all checkboxes and input fields
                            $('#showForm11 input[type="checkbox"]').prop('checked', false);
                            $('#showForm11 input[type="text"]').val('');
                            $('#showForm11 input[type="number"]').val('');


                            $('#showForm22 input[type="checkbox"]').prop('checked', false);
                            $('#showForm22 input[type="text"]').val('');
                            $('#showForm22 input[type="number"]').val('');


                            $('#showForm33 input[type="checkbox"]').prop('checked', false);
                            $('#showForm33 input[type="text"]').val('');
                            $('#showForm33 input[type="number"]').val('');


                            $('textarea').val('');
                        }
                    },
                    error: function(response) {

                    }
                });
            });


            //////////////////////////////////////////////// All ////////////////////////////////////////////////

        })

        $('.cancel').on('click', function() {

            $('#showForm11 input[type="checkbox"]').prop('checked', false);
            $('#showForm11 input[type="text"]').val('');
            $('#showForm11 input[type="tel"]').val('');


            $('input[type="checkbox"]').prop('checked', false);
            $(' input[type="text"]').val('');
            $('input[type="tel"]').val('');


            $('#showForm33 input[type="checkbox"]').prop('checked', false);
            $('#showForm33 input[type="text"]').val('');
            $('input[type="tel"]').val('');


            $('textarea').val('');
            // $('input').val('');
        });


        function cancel() {
            toastr.warning('The data has not been sent.');
        }
    </script>
@endsection
