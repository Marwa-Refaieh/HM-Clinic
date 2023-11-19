<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('dashboard.dashboard-layouts.head')
</head>

<body class="dark-edition">

    <div class="wrapper ">
        <!-- Start Sidebar -->
        @include('dashboard.dashboard-layouts.main-sidebar')
        <!-- End Sidebar -->
        <div class="main-panel">


            <!-- Start Navbar -->
            @include('dashboard.dashboard-layouts.main-header')
            <!-- End Navbar -->

            <!-- Start Content -->
            @yield('content')
            <!-- End  Content -->

            <!-- Start Footer -->
            @include('dashboard.dashboard-layouts.footer')
            <!-- End Footer -->
        </div>
    </div>

    @include('dashboard.dashboard-layouts.scripts')
    @yield('script')

    <script type="text/javascript">
        let cardiologist = $('.cardiologist-appoint').data('category');
        let neurologist = $('.neurologist-appoint').data('category');
        let endocrinology = $('.endocrinology-appoint').data('category');
        let psychological = $('.psychological-appoint').data('category');

        let cardiologistRecord = $('.cardiologist-records').data('category');
        let endocrinologyRecord = $('.endocrinology-records').data('category');
        let psychologyRecord = $('.psychology-records').data('category');
        let neurologistRecord = $('.neurologist-records').data('category');




        $(document).on('click', '#appointments', function() {

            @if (Auth::guard('secretary')->check())
                {
                    $.ajax({
                        url: '/secretary/doctor_name/' + cardiologist,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var doctorsHtml = "";
                            $.each(data, function(index, doctor) {
                                doctorsHtml +=
                                    "<li><a class='nav-link'  href='/secretary/appointment/index/all/" +
                                    doctor.id + "'>" + doctor.name +
                                    "</a></li>";
                            });
                            $('#doctor-cardiologist').html(doctorsHtml);
                        }
                    });

                    $.ajax({
                        url: '/secretary/doctor_name/' + endocrinology,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var doctorsHtml = "";
                            $.each(data, function(index, doctor) {
                                doctorsHtml +=
                                    "<li><a class='nav-link' href='/secretary/appointment/index/all/" +
                                    doctor.id + "'>" + doctor.name +
                                    "</a></li>";
                            });
                            $('#doctor-endocrinology').html(doctorsHtml);
                        }
                    });

                    $.ajax({
                        url: '/secretary/doctor_name/' + psychological,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var doctorsHtml = "";
                            $.each(data, function(index, doctor) {
                                doctorsHtml +=
                                    "<li><a class='nav-link' href='/secretary/appointment/index/all_psycholo/" +
                                    doctor.id + "'>" + doctor.name +
                                    "</a></li>";
                            });
                            $('#doctor-psychological').html(doctorsHtml);
                        }
                    });

                    $.ajax({
                        url: '/secretary/doctor_name/' + neurologist,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var doctorsHtml = "";
                            $.each(data, function(index, doctor) {
                                doctorsHtml +=
                                    "<li><a class='nav-link' href='/secretary/appointment/index/all/" +
                                    doctor.id + "'>" + doctor.name +
                                    "</a></li>";
                            });
                            $('#doctor-neurologist').html(doctorsHtml);
                        }
                    });
                }
            @elseif (Auth::guard('admin')->check()) {
                    $.ajax({
                        url: '/admin/doctor/doctor_name/' + cardiologist,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var doctorsHtml = "";
                            $.each(data, function(index, doctor) {
                                doctorsHtml +=
                                    "<li><a class='nav-link'  href='/admin/doctor/index/all/" +
                                    doctor.id + "'>" + doctor.name +
                                    "</a></li>";
                            });
                            $('#doctor-cardiologist').html(doctorsHtml);
                        }
                    });

                    $.ajax({
                        url: '/admin/doctor/doctor_name/' + endocrinology,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var doctorsHtml = "";
                            $.each(data, function(index, doctor) {
                                doctorsHtml +=
                                    "<li><a class='nav-link' href='/admin/doctor/index/all/" +
                                    doctor.id + "'>" + doctor.name +
                                    "</a></li>";
                            });
                            $('#doctor-endocrinology').html(doctorsHtml);
                        }
                    });

                    $.ajax({
                        url: '/admin/doctor/doctor_name/' + psychological,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var doctorsHtml = "";
                            $.each(data, function(index, doctor) {
                                doctorsHtml +=
                                    "<li><a class='nav-link' href='/admin/doctor/index/all_psycholo/" +
                                    doctor.id + "'>" + doctor.name +
                                    "</a></li>";
                            });
                            $('#doctor-psychological').html(doctorsHtml);
                        }
                    });

                    $.ajax({
                        url: '/admin/doctor/doctor_name/' + neurologist,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var doctorsHtml = "";
                            $.each(data, function(index, doctor) {
                                doctorsHtml +=
                                    "<li><a class='nav-link' href='/admin/doctor/index/all/" +
                                    doctor.id + "'>" + doctor.name +
                                    "</a></li>";
                            });
                            $('#doctor-neurologist').html(doctorsHtml);
                        }
                    });
                }
            @elseif (Auth::guard('doctor')->check()) {
                    $.ajax({
                        url: '/doctor/names/' + cardiologist,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $(document).on('click', '.cardiologistBtn', function() {
                                // let cardiologist = $('.cardiologist-appoint').data('category');
                                console.log(cardiologist);
                                console.log(data);
                                if (data.length > 0) {
                                    var doctorsHtml = "";
                                    doctorsHtml +=
                                        "<li><a class='nav-link' href='/doctor/appointment/index/all/" +
                                        data[0].id + "'>" + data[0].name +
                                        "</a></li>";
                                    $('#doctor-cardiologist').html(doctorsHtml);
                                } else {
                                    toastr.error('No doctors found.', 'Error!');
                                }
                            });

                        }
                    });

                    $.ajax({
                        url: '/doctor/names/' + neurologist,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $(document).on('click', '.neurologistBtn', function() {
                                console.log(data);
                                if (data.length > 0) {
                                    var doctorsHtml = "";
                                    doctorsHtml +=
                                        "<li><a class='nav-link' href='/doctor/appointment/index/all/" +
                                        data[0].id + "'>" + data[0].name +
                                        "</a></li>";
                                    $('#doctor-neurologist').html(doctorsHtml);
                                } else {
                                    toastr.error('No doctors found.', 'Error!');
                                }
                            });

                        }
                    });

                    $.ajax({
                        url: '/doctor/names/' + endocrinology,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $(document).on('click', '.endocrinologyBtn', function() {
                                console.log(endocrinology);
                                console.log(data);
                                if (data.length > 0) {
                                    var doctorsHtml = "";
                                    doctorsHtml +=
                                        "<li><a class='nav-link' href='/doctor/appointment/index/all/" +
                                        data[0].id + "'>" + data[0].name +
                                        "</a></li>";
                                    $('#doctor-endocrinology').html(doctorsHtml);
                                } else {
                                    toastr.error('No doctors found.', 'Error!');
                                }
                            });

                        }
                    });

                    $.ajax({
                        url: '/doctor/names/' + psychological,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $(document).on('click', '.psychologicalBtn', function() {
                                console.log(psychological);
                                console.log(data);
                                if (data.length > 0) {
                                    var doctorsHtml = "";
                                    doctorsHtml +=
                                        "<li><a class='nav-link' href='/doctor/appointment/index/all_psycholo/" +
                                        data[0].id + "'>" + data[0].name +
                                        "</a></li>";
                                    $('#doctor-psychological').html(doctorsHtml);
                                } else {
                                    toastr.error('No doctors found.', 'Error!');
                                }
                            });

                        }
                    });
                }
            @endif





        });

        $(document).on('click', '#records', function() {

            @if (Auth::guard('admin')->check())
                {
                    $.ajax({
                        url: '/admin/doctor/doctor_name/' + cardiologistRecord,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $(document).on('click', '.cardiologistBtnRecord', function() {
                                if (data.length > 0) {
                                    var doctorsHtml = "";
                                    $.each(data, function(index, doctor) {
                                        doctorsHtml +=
                                            "<li><a class='nav-link' href='/admin/appointment/index/patient/" +
                                            doctor.id + "'>" + doctor.name +
                                            "</a></li>";
                                    });
                                    $('#doctor-cardiologist-records').html(doctorsHtml);
                                } else {
                                    toastr.error('No doctors found.', 'Error!');
                                }
                            });

                        }
                    });

                    $.ajax({
                        url: '/admin/doctor/doctor_name/' + neurologistRecord,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $(document).on('click', '.neurologistBtnRecord', function() {
                                if (data.length > 0) {
                                    var doctorsHtml = "";
                                    $.each(data, function(index, doctor) {
                                        doctorsHtml +=
                                            "<li><a class='nav-link' href='/admin/appointment/index/patient/" +
                                            doctor.id + "'>" + doctor.name +
                                            "</a></li>";
                                    });
                                    $('#doctor-neurologist-records').html(doctorsHtml);
                                } else {
                                    toastr.error('No doctors found.', 'Error!');
                                }
                            });

                        }
                    });

                    $.ajax({
                        url: '/admin/doctor/doctor_name/' + psychologyRecord,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $(document).on('click', '.psychologyBtnRecord', function() {
                                if (data.length > 0) {
                                    var doctorsHtml = "";
                                    $.each(data, function(index, doctor) {
                                        doctorsHtml +=
                                            "<li><a class='nav-link' href='/admin/appointment/index/psycholo/" +
                                            doctor.id + "'>" + doctor.name +
                                            "</a></li>";
                                    });
                                    $('#doctor-psychology-records').html(doctorsHtml);
                                } else {
                                    toastr.error('No doctors found.', 'Error!');
                                }
                            });

                        }
                    });

                    $.ajax({
                        url: '/admin/doctor/doctor_name/' + endocrinologyRecord,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $(document).on('click', '.endocrinologyBtnRecord', function() {
                                if (data.length > 0) {
                                    var doctorsHtml = "";
                                    $.each(data, function(index, doctor) {
                                        doctorsHtml +=
                                            "<li><a class='nav-link' href='/admin/appointment/index/patient/" +
                                            doctor.id + "'>" + doctor.name +
                                            "</a></li>";
                                    });
                                    $('#doctor-endocrinology-records').html(doctorsHtml);
                                } else {
                                    toastr.error('No doctors found.', 'Error!');
                                }
                            });

                        }
                    });

                }
            @elseif (Auth::guard('doctor')->check()) {
                    $.ajax({
                        url: '/doctor/names/' + cardiologistRecord,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $(document).on('click', '.cardiologistBtnRecord', function() {
                                if (data.length > 0) {
                                    var doctorsHtml = "";
                                    doctorsHtml +=
                                        "<li><a class='nav-link' href='/doctor/appointment/index/patient/" +
                                        data[0].id + "'>" + data[0].name +
                                        "</a></li>";
                                    $('#doctor-cardiologist-records').html(doctorsHtml);
                                } else {
                                    toastr.error('No doctors found.', 'Error!');
                                }
                            });

                        }
                    });

                    $.ajax({
                        url: '/doctor/names/' + endocrinologyRecord,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $(document).on('click', '.endocrinologyBtnRecord', function() {
                                if (data.length > 0) {
                                    var doctorsHtml = "";
                                    doctorsHtml +=
                                        "<li><a class='nav-link' href='/doctor/appointment/index/patient/" +
                                        data[0].id + "'>" + data[0].name +
                                        "</a></li>";
                                    $('#doctor-endocrinology-records').html(doctorsHtml);
                                } else {
                                    toastr.error('No doctors found.', 'Error!');
                                }
                            });

                        }
                    });

                    $.ajax({
                        url: '/doctor/names/' + neurologistRecord,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $(document).on('click', '.neurologistBtnRecord', function() {
                                if (data.length > 0) {
                                    var doctorsHtml = "";
                                    doctorsHtml +=
                                        "<li><a class='nav-link' href='/doctor/appointment/index/patient/" +
                                        data[0].id + "'>" + data[0].name +
                                        "</a></li>";
                                    $('#doctor-neurologist-records').html(doctorsHtml);
                                } else {
                                    toastr.error('No doctors found.', 'Error!');
                                }
                            });

                        }
                    });

                    $.ajax({
                        url: '/doctor/names/' + psychologyRecord,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $(document).on('click', '.psychologyBtnRecord', function() {
                                if (data.length > 0) {
                                    var doctorsHtml = "";
                                    doctorsHtml +=
                                        "<li><a class='nav-link' href='/doctor/appointment/index/psycholo/" +
                                        data[0].id + "'>" + data[0].name +
                                        "</a></li>";
                                    $('#doctor-psychology-records').html(doctorsHtml);
                                } else {
                                    toastr.error('No doctors found.', 'Error!');
                                }
                            });

                        }
                    });
                }
            @endif





        });
    </script>

</body>

</html>
