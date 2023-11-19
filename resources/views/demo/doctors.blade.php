@extends('demo.demo-layouts.master')

@section('title')
    Doctors
@stop

@section('css')
    <!-- Link Animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="{{ URL::asset('demo/css/doctors.css') }}" rel="stylesheet">
@stop

@section('content')
    <a id="button"></a>
    <!-- Start Section Hero-->
    <section class="hero is-success">
        <!-- Hero head: will stick at the top -->
        <div class="hero-head">
            <div id="particles-js"></div>
            @include('demo.demo-layouts.main-header')
        </div>

        <!-- Hero content: will be in the middle -->
        <div class="hero-body ">
            <div class="container ">
                <div class="columns">
                    <div class="column has-text-centered ">
                        <h1
                            class="is-size-2-desktop is-size-2-tablet is-size-4-mobile has-text-weight-bold is-capitalized ">
                            The best doctors in our center</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Hero-->

    <!-- start doctor page -->
    <section class="section doctors">
        <div class="container">
            <h2 class="title is-1 is-relative">Our Doctor</h2>

            <div class="columns mt-6 is-multiline ">
                @foreach ($doctors as $doctor)
                    <div class="column is-4-desktop is-6-tablet">
                        <a class="js-modal-trigger model-button cardClicked" data-toggle="modal" data-target="mymodal"
                            data-id="{{ $doctor->id }}" onclick="DetailsClicked({{ $doctor->id }})">
                            {{-- نكتب data-id كمتغير يتم استخدامه في مكان أخر في الصفحة بستخدام data --}}
                            <div class="card">
                                <div class="card-image">
                                    <div class="doctor-picture is-clipped">
                                        <img src="{{ $doctor->photo }}">
                                    </div>
                                </div>
                                <div class="content is-flex is-flex-direction-column is-align-items-center mt-3">
                                    <h3 class="title is-size-4">{{ $doctor->name }}</h3>
                                    <h4 class="subtitle">{{ $doctor->specialization->name }}</h4>
                                </div>
                                {{-- <a  class="js-modal-trigger model-button" data-toggle="modal" data-target="mymodal" data-id="{{ $doctor->id }}">details</a> --}}
                                {{-- <a >details</a> --}}
                                {{-- <a
                                class="js-modal-trigger model-button"
                                href="javascript:void(0)"
                                id="show-user"
                                data-toggle="modal" data-target="mymodal" data-url="{{ url('/doctor/show/'. $doctor->id) }}"
                                >Show</a> --}}

                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- start modal doctor -->

    <section class="section model">
        <div id="mymodal" class="modal is-clipped">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="box">

                    <div class="header-model is-flex is-flex-direction-row is-justify-content-start">
                        <div class="doctor-image is-clipped">
                            <img src="{{ URL::asset('') }}" id="img" alt="doctor-image-1">
                        </div>
                        <div class="media-doctors ml-6 mt-5 is-relative">
                            <h2 class="title is-3 is-relative ml-0 line-doctor">Dr: <span id="doctorName"></span></h2>
                            <h3 class="subtitle pt-4 mb-0 pb-2 pt-2 "></h3>
                            <h3 class="subtitle mb-3"><span id="doctorSpecialization"></span></h3>
                            <h3 class="subtitle mb-3">Age: <span id="doctorAge"></span></h3>
                            <h3 class="subtitle mb-3">Price: <span id="doctorPrice"></span></h3>
                        </div>
                    </div>

                    <div class="body-model" id="doctor-details">
                        <p class="py-4 px-3" id="doctorBio"></p>
                        {{-- <div class="pl-3 mb-2">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span class="pl-2 has-text-light work-time"> 8:00 AM - 10:00 AM </span>
                        </div> --}}
                        <div class="pl-3">
                            <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                            <span class="pl-2 has-text-bold tt">
                                <span class=" has-text-primary-dark has-text-weight-bold"><span id="doctorDay1"></span>
                                    -</span>
                                <span class=" has-text-primary-dark has-text-weight-bold"><span id="doctorDay2"></span>
                                    -</span>
                                <span class=" has-text-primary-dark has-text-weight-bold"><span
                                        id="doctorDay3"></span></span>
                            </span>
                        </div>
                    </div>
                    <footer class="modal-card-foot mt-4 pb-0 is-flex is-justify-content-space-between">
                        <div class="social-media">
                            <div class="has-text-weight-bold">TO CONNECT :
                                <span id="doctorPhone"></span>
                            </div>
                        </div>
                        <button class="button has-text-right" id="appointment" onclick="appointment()">Make
                            Appointment</button>
                    </footer>

                </div>
                <button class="modal-close is-large" aria-label="close"></button>
            </div>
    </section>

@stop
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<script>
    function DetailsClicked(id) {
        // console.log('open model : ' );
        // document.getElementById("doctorAge").innerHTML = 'Marah 26';

        // Use AJAX to get the doctor details
        $.ajax({
            url: '/doctor/show/' + id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response);
                // document.getElementById('doctorName').innerHtml = response.doctor.name;
                document.getElementById("doctorName").innerHTML = response.fullname;
                document.getElementById("doctorSpecialization").innerHTML = response.specialization.name;
                document.getElementById("doctorAge").innerHTML = response.age;
                document.getElementById("doctorPrice").innerHTML = response.avarage_price;
                document.getElementById("doctorBio").innerHTML = response.bio;
                document.getElementById("doctorPhone").innerHTML = response.phone_number;
                document.getElementById("doctorDay1").innerHTML = response.doctor_days[0].day.name;
                document.getElementById("doctorDay2").innerHTML = response.doctor_days[1].day.name;
                document.getElementById("doctorDay3").innerHTML = response.doctor_days[2].day.name;
                let img = document.getElementById('img');
                img.src = response.photo;

            }
        })
    }

    // الانتقال إلى صفحة حجز الموعد عند النقر على زر الحجز داخل الـ Modal
    $(document).ready(function() {
        $('.cardClicked').on('click', function() {
            let doctorId = $(this).data("id");
            // console.log(doctorId);
            $('#appointment').on('click', function() {
                // القيام بتحقق من تسجيل الدخول باستخدام middleware
                $.ajax({
                    url: '/checkLogin',
                    type: 'GET',
                    success: function(response) {
                        if (response.status === 'success') {
                            // إذا تم تسجيل الدخول، يتم إرسال طلب AJAX للانتقال إلى صفحة المواعيد مع ID الطبيب
                            $.ajax({
                                url: '/appointment/index/' + doctorId,
                                type: 'GET',
                                success: function(response) {
                                    // إعادة توجيه المستخدم إلى صفحة المواعيد مع ID الطبيب
                                    window.location.href =
                                        '/appointment/index/' +
                                        doctorId;
                                }
                            });
                        } else {
                            // إذا لم يتم تسجيل الدخول، يتم إعادة توجيه المستخدم إلى صفحة تسجيل الدخول
                            window.location.href = '/login';
                        }
                    }
                });
            });
        });

    });
</script>

@section('script')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    {{-- <script src="{{ URL::asset('demo/js/jquery.tabpager.js') }}"></script>/ --}}
    <script src="{{ URL::asset('demo/js/doctors.js') }}"></script>


@stop
