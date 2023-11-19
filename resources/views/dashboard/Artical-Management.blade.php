@extends('dashboard.dashboard-layouts.master')

@section('title')
    HM-Clinic
@stop
@section('content')
    <div class="content pb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-md-12">
                    <div class="card card-art">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs">

                                        <li class="nav-item">
                                            <a class="nav-link active"
                                                href="{{ route('articles.index', ['category' => 1]) }}"
                                                data-target="#cardiology" data-toggle="tab">
                                                <i class="fa fa-circle pr-2" aria-hidden="true"></i>Cardiology
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('articles.index', ['category' => 4]) }}"
                                                data-target="#endocinology" data-toggle="tab">
                                                <i class="fa fa-circle pr-2" aria-hidden="true"></i>Endocinology
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('articles.index', ['category' => 2]) }}"
                                                data-target="#neurologist" data-toggle="tab">
                                                <i class="fa fa-circle pr-2" aria-hidden="true"></i> Neurologist
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('articles.index', ['category' => 3]) }}"
                                                data-target="#psychology" data-toggle="tab">
                                                <i class="fa fa-circle pr-2" aria-hidden="true"></i> Psychology
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>

                                    </ul>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link btn" href="#messages" data-toggle="modal"
                                                data-target="#add-modal">
                                                <i class="material-icons fa  fa-plus ">add</i> Add
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="cardiology">
                                    <div class="row justify-content-center">
                                        @foreach ($cardiologys as $cardiology)
                                            <div class="col-xl-4 col-lg-6 col-sm-5">
                                                <div class="card card-chart d-flex ">
                                                    <div class="card-header card-header-image">

                                                        <div
                                                            class="card-image d-flex justify-content-center align-items-center">
                                                            <img src="{{ $cardiology->image }}" alt="">
                                                        </div>
                                                        <div
                                                            class="person d-flex align-items-center has-text-weight-medium">
                                                            <figure class="image is-64x64 m-0 mr-3 mb-3">
                                                                <img src="{{ $cardiology->author_photo }}">
                                                            </figure>
                                                            <div class="person-info">
                                                                <p class="m-0">{{ $cardiology->author_name }}</p>
                                                                <span>{{ $cardiology->created_at->format('Y-m-d') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <h4 class="card-title">{{ $cardiology->title }}</h4>
                                                        <p class="card-category">
                                                            {{ $cardiology->definition }}
                                                        </p>
                                                        <button type="button" class="btn btn-light mt-4" id="readmore"
                                                            data-toggle="modal" data-target="#readmore-modal"
                                                            data-id="{{ $cardiology->id }}">Read
                                                            More</button>
                                                    </div>
                                                    <div class="card-footer justify-content-end">
                                                        <div class="stats-icon">
                                                            <a class=" material-symbols-outlined text-warning  update-artical"
                                                                data-toggle="modal" data-target="#update-modal"
                                                                aria-hidden="true"
                                                                data-id="{{ $cardiology->id }}">edit_square</a>

                                                            <a class="material-symbols-outlined text-danger delete-artical"
                                                                data-toggle="modal" data-target="#delete-modal"
                                                                aria-hidden="true" data-id="{{ $cardiology->id }}">delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane" id="endocinology">
                                    <div class="row justify-content-center">
                                        @foreach ($endocinologys as $endocinology)
                                            <div class="col-xl-4 col-lg-6 col-sm-5">
                                                <div class="card card-chart d-flex ">
                                                    <div class="card-header card-header-image">

                                                        <div
                                                            class="card-image d-flex justify-content-center align-items-center">
                                                            <img src="{{ $endocinology->image }}" alt="">
                                                        </div>
                                                        <div
                                                            class="person d-flex align-items-center has-text-weight-medium">
                                                            <figure class="image is-64x64 m-0 mr-3 mb-3">
                                                                <img src="{{ $endocinology->author_photo }}">
                                                            </figure>
                                                            <div class="person-info">
                                                                <p class="m-0">{{ $endocinology->author_name }}</p>
                                                                <span>{{ $endocinology->created_at->format('Y-m-d') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <h4 class="card-title">{{ $endocinology->title }}</h4>
                                                        <p class="card-category">
                                                            {{ $endocinology->definition }}
                                                        </p>
                                                        <button type="button" class="btn btn-light mt-4" id="readmore"
                                                            data-toggle="modal" data-target="#readmore-modal"
                                                            data-id="{{ $endocinology->id }}">Read
                                                            More</button>
                                                    </div>
                                                    <div class="card-footer justify-content-end">
                                                        <div class="stats-icon">
                                                            <a class=" material-symbols-outlined text-warning  update-artical"
                                                                data-toggle="modal" data-target="#update-modal"
                                                                aria-hidden="true"
                                                                data-id="{{ $endocinology->id }}">edit_square</a>

                                                            <a class="material-symbols-outlined text-danger delete-artical"
                                                                data-toggle="modal" data-target="#delete-modal"
                                                                aria-hidden="true" data-id="{{ $endocinology->id }}">delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane" id="neurologist">
                                    <div class="row justify-content-center">
                                        @foreach ($neurologists as $neurologist)
                                            <div class="col-xl-4 col-lg-6 col-sm-5">
                                                <div class="card card-chart d-flex ">
                                                    <div class="card-header card-header-image">

                                                        <div
                                                            class="card-image d-flex justify-content-center align-items-center">
                                                            <img src="{{ $neurologist->image }}" alt="">
                                                        </div>
                                                        <div
                                                            class="person d-flex align-items-center has-text-weight-medium">
                                                            <figure class="image is-64x64 m-0 mr-3 mb-3">
                                                                <img src="{{ $neurologist->author_photo }}">
                                                            </figure>
                                                            <div class="person-info">
                                                                <p class="m-0">{{ $neurologist->author_name }}</p>
                                                                <span>{{ $neurologist->created_at->format('Y-m-d') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <h4 class="card-title">{{ $neurologist->title }}</h4>
                                                        <p class="card-category">
                                                            {{ $neurologist->definition }}
                                                        </p>
                                                        <button type="button" class="btn btn-light mt-4" id="readmore"
                                                            data-toggle="modal" data-target="#readmore-modal"
                                                            data-id="{{ $neurologist->id }}">Read
                                                            More</button>
                                                    </div>
                                                    <div class="card-footer justify-content-end">
                                                        <div class="stats-icon">
                                                            <a class=" material-symbols-outlined text-warning  update-artical"
                                                                data-toggle="modal" data-target="#update-modal"
                                                                aria-hidden="true"
                                                                data-id="{{ $neurologist->id }}">edit_square</a>

                                                            <a class="material-symbols-outlined text-danger delete-artical"
                                                                data-toggle="modal" data-target="#delete-modal"
                                                                aria-hidden="true" data-id="{{ $neurologist->id }}">delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane" id="psychology">
                                    <div class="row justify-content-center">
                                        @foreach ($psychologys as $psychology)
                                            <div class="col-xl-4 col-lg-6 col-sm-5">
                                                <div class="card card-chart d-flex ">
                                                    <div class="card-header card-header-image">

                                                        <div
                                                            class="card-image d-flex justify-content-center align-items-center">
                                                            <img src="{{ $psychology->image }}" alt="">
                                                        </div>
                                                        <div
                                                            class="person d-flex align-items-center has-text-weight-medium">
                                                            <figure class="image is-64x64 m-0 mr-3 mb-3">
                                                                <img src="{{ $psychology->author_photo }}">
                                                            </figure>
                                                            <div class="person-info">
                                                                <p class="m-0">{{ $psychology->author_name }}</p>
                                                                <span>{{ $psychology->created_at->format('Y-m-d') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <h4 class="card-title">{{ $psychology->title }}</h4>
                                                        <p class="card-category">
                                                            {{ $psychology->definition }}
                                                        </p>
                                                        <button type="button" class="btn btn-light mt-4" id="readmore"
                                                            data-toggle="modal" data-target="#readmore-modal"
                                                            data-id="{{ $psychology->id }}">Read
                                                            More</button>
                                                    </div>
                                                    <div class="card-footer justify-content-end">
                                                        <div class="stats-icon">
                                                            <a class=" material-symbols-outlined text-warning  update-artical"
                                                                data-toggle="modal" data-target="#update-modal"
                                                                aria-hidden="true"
                                                                data-id="{{ $psychology->id }}">edit_square</a>

                                                            <a class="material-symbols-outlined text-danger delete-artical"
                                                                data-toggle="modal" data-target="#delete-modal"
                                                                aria-hidden="true" data-id="{{ $psychology->id }}">delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- start modal button readmore -->
            <div class="modal fade " id="readmore-modal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class=" modal-dialog modal-lg" role="document">
                    <div class="modal-content dark-edition">
                        <div class="modal-header modal-border-bottom">
                            <h2 class="modal-title text-white" id="exampleModalLongTitle">Artical Information</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="modal-text-artical" id="definition"></p>
                            <h3 class="text-capitalize font-weight-bold title-inside-modal">Symptoms :</h3>
                            <p class="modal-text-artical" id="symptoms"></p>

                            <h3 class="text-capitalize  font-weight-bold title-inside-modal">risk factors :</h3>
                            <p class="modal-text-artical" id="risk_factor"></p>

                            <h3 class="text-capitalize  font-weight-bold title-inside-modal">When should you see
                                a doctor?</h3>
                            <p class="modal-text-artical" id="when"></p>
                            <h3 class="text-capitalize  font-weight-bold title-inside-modal">treatment :</h3>
                            <p class="modal-text-artical" id="treatment"></p>
                            <h3 class="text-capitalize  font-weight-bold title-inside-modal">wrong concepts :</h3>
                            <p class="modal-text-artical" id="misconceptions"></p>
                        </div>
                        <div class="modal-footer modal-border-top">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal button readmore -->

            <!-- Start Modal Add -->
            <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class=" modal-dialog modal-lg" role="document">
                    <div class="modal-content dark-edition">
                        <div class="modal-header  modal-border-bottom">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Add Artical</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="addForm" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group form-group-artical-update">
                                            <label for="artical-pic" class="form-label">Artical Picture :</label>
                                            <input class=" artical-pic" type="file" id="image" name="image">

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-group-artical-update">
                                            <label for="author-pic" class="form-label">Author Picture :</label>
                                            <input class=" artical-pic" type="file" id="author_photo"
                                                name="author_photo">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-group-artical-update">
                                            <label class="bmd-label-floating mt-4">Author Name:</label>
                                            <input type="text" class="form-control" id="author_name"
                                                name="author_name">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-group-artical-update">
                                            <label class="bmd-label-floating mt-4">Artical Title:</label>
                                            <input type="text" class="form-control" id="title" name="title">
                                        </div>
                                    </div>


                                    <div class="col-md-4 form-group">
                                        <label for="inputState" class="mt-3 pb-0 ">Specialize:</label>
                                        <select id="category_id" name="category_id" class="form-control">
                                            <option hidden></option>
                                            <option value="1">cardiology</option>
                                            <option value="4">endocinology</option>
                                            <option value="2">neurology</option>
                                            <option value="3">psychology</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Bio:</label>
                                            <div class="form-outline">
                                                <textarea class="form-control" rows="4" id="definition" name="definition"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Symptoms:</label>
                                            <textarea class="form-control" id="symptoms" name="symptoms" rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Risk Factors::</label>
                                            <textarea class="form-control" id="risk_factor" name="risk_factor" rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">When Should You See A Doctor?:</label>
                                            <textarea class="form-control" id="when" name="when" rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Treatment:</label>
                                            <textarea class="form-control" id="treatment" name="treatment" rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Wrong Concepts:</label>
                                            <textarea class="form-control" id="misconceptions" name="misconceptions" rows="4"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cancel()">Close</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"
                                id="addArtical">Add</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Add -->

            <!-- start Update Modal Artical -->
            <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content dark-edition">
                        <div class="modal-header modal-border-bottom">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Update Artical</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="updateForm">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-artical-update">
                                            <label for="artical-pic" class="form-label">ID:</label>
                                            <input class=" artical-pic" type="number" id="up-id" name="id">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-group-artical-update">
                                            <label for="artical-pic" class="form-label">Artical Picture :</label>
                                            <input class=" artical-pic" type="file" id="up-image" name="image">

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-group-artical-update">
                                            <label for="author-pic" class="form-label">Author Picture :</label>
                                            <input class=" artical-pic" type="file" id="up_author_photo"
                                                name="author_photo">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-group-artical-update">
                                            <label class="bmd-label-floating mt-4">Author Name:</label>
                                            <input type="text" class="form-control" id="up_author_name"
                                                name="author_name">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-group-artical-update">
                                            <label class="bmd-label-floating mt-4">Artical Title:</label>
                                            <input type="text" class="form-control" id="up_title" name="title">
                                        </div>
                                    </div>


                                    <div class="col-md-4 form-group">
                                        <label for="inputState" class="mt-3 pb-0 ">Specialize:</label>
                                        <select id="up_category_id" name="category_id" class="form-control">
                                            <option hidden></option>
                                            <option value="1">cardiology</option>
                                            <option value="4">endocinology</option>
                                            <option value="2">neurology</option>
                                            <option value="3">psychology</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Bio:</label>
                                            <div class="form-outline">
                                                <textarea class="form-control" rows="4" id="up-definition" name="definition"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Symptoms:</label>
                                            <textarea class="form-control" id="up-symptoms" name="symptoms" rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Risk Factors::</label>
                                            <textarea class="form-control" id="up_risk_factor" name="risk_factor" rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">When Should You See A Doctor?:</label>
                                            <textarea class="form-control" id="up-when" name="when" rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Treatment:</label>
                                            <textarea class="form-control" id="up-treatment" name="treatment" rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Wrong Concepts:</label>
                                            <textarea class="form-control" id="up-misconceptions" name="misconceptions" rows="4"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cancel()">Close</button>
                            <button type="button" class="btn btn-primary" id="updateArtical">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Update Modal Artical -->

            <!-- Start Modal Delete -->
            <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog small-size" role="document">
                    <div class="modal-content dark-edition">
                        <div class="modal-header modal-border-bottom">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Delet Artical?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <div class="modal-body ">
                                <p class="text-white">Are You Sure you want To Delete?</p>
                                <input type="hidden" id="del-id">
                            </div>
                        </div>
                        <div class="modal-footer modal-border-top">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cancel()">Close</button>
                            <button type="button" class="btn btn-primary" id="deleteArtical">Delete</button>
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

            //Add Artical
            $(document).on('click', '#addArtical', function(e) {
                e.preventDefault();
                let formData = new FormData($('#addForm')[0]);

                $.ajax({
                    type: "POST",
                    enctype: "multipart/form-data",
                    url: "{{ route('articles.store') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(response) {

                        if (response.status == 'success') {
                            toastr.success('The artical has been added successfully.')
                            $('#addForm')[0].reset();
                            location.reload();
                        }
                    },
                    error: function(response) {

                        if (response.status == 'error') {
                            toastr.error('Please verify that the information entered is correct.');
                        }
                    }
                });
            });

            //Show Artical
            $(document).on('click', '.update-artical', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: '/admin/artical/show/' + id,
                    dataType: 'json',

                    success: function(response) {
                        $('#updateForm #up-id').val(response.id);
                        $('#updateForm #up_author_name').val(response.author_name);
                        $('#updateForm #up_title').val(response.title);
                        $('#updateForm #up_category_id').val(response.category_id);
                        $('#updateForm #up-definition').val(response.definition);
                        $('#updateForm #up-symptoms').val(response.symptoms);
                        $('#updateForm #up_risk_factor').val(response.risk_factor);
                        $('#updateForm #up-when').val(response.when);
                        $('#updateForm #up-treatment').val(response.treatment);
                        $('#updateForm #up-misconceptions').val(response.misconceptions);
                        $('#updateForm #up-image').val(response.image);
                        $('#updateForm #up_author_photo').val(response.author_photo);


                    },
                    error: function(response) {

                    }
                });
            });

            // Update Artical
            $(document).on('click', '#updateArtical', function(e) {
                e.preventDefault();

                let id = $('#up-id').val();
                let updateFormData = new FormData($('#updateForm')[0]);
                $.ajax({
                    type: "POST",
                    url: '/admin/artical/update/' + id,
                    data: updateFormData,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        location.reload();
                        toastr.success('The artical has been updated successfully.');
                    },
                    error: function(error) {
                        console.log(error);
                        toastr.error('Please verify that the information entered is correct.');
                    }
                });
            });

            // Delete Artical
            $(document).on('click', '.delete-artical', function() {
                let id = $(this).data('id');
                $('#del-id').val(id);
                // Delete Artical
                $(document).on('click', '#deleteArtical', function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: "delete",
                        url: '/admin/artical/destroy/' + id,
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
                                toastr.success('The artical has been deleted successfully.');
                                location.reload();
                            }
                        },
                        error: function(error) {
                            toastr.error('Sorry, the deletion process did not take place.');
                        }
                    });
                });

            });

            //Show Artical
            $(document).on('click', '#readmore', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: '/admin/artical/show/' + id,
                    dataType: 'json',

                    success: function(response) {
                        document.getElementById("definition").innerHTML = response.definition;
                        document.getElementById("symptoms").innerHTML = response.symptoms;
                        document.getElementById("risk_factor").innerHTML = response.risk_factor;
                        document.getElementById("when").innerHTML = response.when;
                        document.getElementById("treatment").innerHTML = response.treatment;
                        document.getElementById("misconceptions").innerHTML = response
                            .misconceptions;
                    },
                    error: function(response) {

                    }
                });
            });


        })

        function cancel() {
            toastr.warning('The data has not been sent.')
        }
    </script>
@endsection
