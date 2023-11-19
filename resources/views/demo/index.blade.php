@extends('demo.demo-layouts.master')

@section('title')
    HM-Clinic
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('demo/css/swiper-bundle.min.css') }}">
@stop

@section('content')
    <a id="button"></a>
    <!-- Start Section Hero-->
    <section class="hero is-success is-clipped">
        <div id="particles-js"></div>
        <!-- Hero head: will stick at the top -->
        <div class="hero-head pt-2">
            @include('demo.demo-layouts.main-header')
        </div>
        <!-- Hero content: will be in the middle -->
        <div class="hero-body pb-0">
            <div class="container ">
                <div class="columns mt-5 is-multiline is-centered">
                    <div
                        class="column is-5-desktop has-text-centered-mobile has-text-centered-tablet has-text-left-desktop is-flex is-flex-direction-column is-align-content-center is-justify-content-center ">
                        <h1 class="is-size-1-desktop is-size-2-tablet is-size-3-mobile has-text-weight-bold ">
                            Welcome In Our Clinics</h1>
                        <p class="is-size-5-desktop is-size-5-tablet is-size-6-mobile has-text-grey-light mt-1">
                            We Provide The Best Medical Services.</p>
                    </div>
                    <div
                        class="column img is-7-desktop is-12-tablet is-flex is-align-content-end is-justify-content-center">
                        <img src="{{ URL::asset('demo/img/home/hero-2.png') }}" alt="" width="500">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Hero-->

    <!-- START ABOUT US SECTION -->
    <section class="section aboutus has-background-light">
        <div class="container ">
            <div class="columns is-centered is-vcentered is-multiline ">
                <div class="column is-5-desktop is-12-tablet aboutus-border-img">
                    <img src="{{ URL::asset('demo/img/home/about.jpg') }}" class="pt-6">
                </div>
                <div class="column is-5-desktop">
                    <h3 class="title is-3 is-relative aboutus-line">About Us</h3>
                    <p class="is-size-6-desktop is-size-4-tablet">Welcome to the HM-Clinic center the center provides
                        many services
                        to the patient and many facilities for the doctor, the patient can book through
                        the site and make online payments directly,he can browse the doctors offered by
                        the center and choose the doctor he wants to treat,there is a remote treatment
                        service that it is especially for mental patients only,and he can browse many
                        medical articles and know the instructions and symptoms for eaach disease,
                        and there are manyfacilities for the doctor as well </p>
                </div>
            </div>
        </div>
    </section>
    <!-- END ABOUT US SECTION -->

    <!-- Start Section Services-->
    <section class="section services">
        <div class="container">
            <h2 class="title is-2 is-relative ">Services</h2>
            <div class="columns mt-6">

                <div
                    class="column is-flex is-flex-direction-column is-justify-content-center is-align-items-center mx-6 has-text-centered">
                    <figure class="image is-96x96">
                        <img src="{{ URL::asset('demo/img/services/services1.png') }}">
                    </figure>
                    <h3 class="is-size-5 has-text-weight-semibold py-2">Request Ambulance</h3>
                    <p>In necessary cases you can request ambulance by entering the phone number only and we will
                        contact you.</p>
                </div>

                <div
                    class="column is-flex is-flex-direction-column is-justify-content-center is-align-items-center mx-6 has-text-centered">
                    <figure class="image is-96x96">
                        <img src="{{ URL::asset('demo/img/services/services2.png') }}">
                    </figure>
                    <h3 class="is-size-5 has-text-weight-semibold py-2">Online Payment</h3>
                    <p>We provide electronic payment service when booking an appointment directly from the site.</p>
                </div>

                <div
                    class="column is-flex is-flex-direction-column is-justify-content-center is-align-items-center mx-6 has-text-centered">
                    <figure class="image is-96x96">
                        <img src="{{ URL::asset('demo/img/services/services3.png') }}">
                    </figure>
                    <h3 class="is-size-5 has-text-weight-semibold py-2">Online Treatment</h3>
                    <p>This feature aims to treat metal patients remotly in the event that they are unable to leave the
                        house and meet the world due to a disease.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Services-->

    <!-- Start Section device-->
    <section class="section pricing">
        <div class="container is-flex is-justify-content-center is-align-items-center is-flex-direction-column">

            <h2 class="title is-2 is-relative">Devices</h2>
            <div class="swiper mySwiper swiper-pricing">
                <div class="swiper-wrapper mt-5">
                    @foreach ($devices as $device)
                        <div class="swiper-slide">
                            <div class="card p-5">
                                <div class="card-opcity is-relative">
                                    <div class="card-image">
                                        <img src="{{ $device->image }}">
                                    </div>
                                    <div
                                        class="opcity-text is-flex is-flex-direction-column is-justify-content-center is-align-items-center has-text-light has-text-weight-semibold">
                                        <p class="is-size-5">{{ $device->name }}</p>
                                        <span class="is-size-3 "><span
                                                class="dolar-sign has-text-weight-bold">$</span>{{ $device->price }}</span>
                                    </div>
                                </div>
                                <div class="content">
                                    <p class="has-text-centered py-4">{{ $device->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="pricing-pagination"></div>
        </div>
        </div>
    </section>
    <!-- End Section device-->

    <!-- Start Section Counter-->
    <section class="section my-6 counter">
        <div class="container">
            <nav class="level">

                <div class="level-item has-text-centered">
                    <div class="info-counter has-background-link-light">
                        <i class="fa fa-users icon-counter is-size-4 pb-3" aria-hidden="true"></i>
                        <p class="title count">{{ $visits }}</p>
                        <p class="heading pt-1">Visitors</p>
                    </div>
                </div>

                <div class="level-item has-text-centered">
                    <div class="info-counter has-background-link-light">
                        <i class="fa fa-user-md icon-counter is-size-4 pb-3" aria-hidden="true"></i>
                        <p class="title count">{{ $data['doctor'] }}</p>
                        <p class="heading pt-1">Doctors</p>
                    </div>
                </div>

                <div class="level-item has-text-centered">
                    <div class="info-counter has-background-link-light">
                        <i class="fa fa-wheelchair icon-counter is-size-4 pb-3" aria-hidden="true"></i>
                        <p class="title count">{{ $data['patient'] }}</p>
                        <p class="heading pt-1">Patitaint</p>
                    </div>
                </div>

                <div class="level-item has-text-centered">
                    <div class="info-counter has-background-link-light">
                        <i class="fa fa-ambulance  icon-counter is-size-4 pb-3" aria-hidden="true"></i>
                        <p class="title count">{{ $data['ambulance'] }}</p>
                        <p class="heading pt-1">Request Embulance</p>
                    </div>
                </div>

            </nav>
        </div>
    </section>
    <!-- End Section Counter-->



    <!-- strat section blog -->
    <section class="section blog">
        <div class="container">
            <h2 class="title is-2 is-relative">Latest News</h2>
            <div class="columns mt-6 is-multiline ">
                @foreach ($latestArticles as $latestArticle)
                    <div class="column is-4 is-flex is-justify-content-center is-align-items-center">
                        <button class="js-modal-trigger" data-target="modal-js-1"
                            onclick="Details({{ $latestArticle->id }})">
                            <div class="card-blog is-relative" data-name="b-1">
                                <div class="header">
                                    <img src="{{ $latestArticle->image }}">
                                </div>
                                <div class="body px-3 py-3 has-text-left">
                                    <h5 class="post-title is-size-5 has-text-grey-dark has-text-weight-medium">
                                        {{ $latestArticle->title }}</h5>
                                    <div class="info mt-3 is-flex">
                                        <figure class="image image  is-48x48" >
                                            <img src="{{ $latestArticle->author_photo }}">
                                        </figure>
                                        <div class="is-flex is-flex-direction-column ml-3">
                                            <span>{{ $latestArticle->author_name }}</span>
                                            <span>{{ $latestArticle->created_at->format('Y-m-d') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                @endforeach

                <div class="column is-12 has-text-centered mt-4">
                    <a href="{{ route('articles', ['category' => 1]) }}" class="button">Read More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ebd section blog -->

       <!-- strat section request -->
       <section class="section ambulance has-background-light my-6">
        {{-- <img src="{{ URL::asset('demo/img/iStock-695349930-scaled.jpg') }}"> --}}

        <div class="container">
            <h3 class="title is-2 is-relative  has-text-centered">Request an Ambulance</h3>
            <div class="columns is-centered is-vcentered is-multiline mt-6 ">
                <div class="column inputNumber is-5">
                    <div class="control hideNumber">
                        <input class="input" type="tel" id="phone_number" name="phone_number"
                            placeholder="Enter your number" required>
                        <span id="error" class="pt-1"></span>
                    </div>
                </div>
                <div class="column is-1 hideNumber">
                    <div class="control">
                        <button class="button is-primary" id="submitBtn">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section request -->


    <!-- strat blog mdal -->
    <section class="blog-model">
        <div id="modal-js-1" class="modal">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="box">
                    <div class="card-modal">
                        <div class="card-image">
                            <figure class="image px-6 mx-6">
                                <img src="{{ URL::asset('') }}" id="img" alt="Placeholder image" >
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="content" id="definition"></div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>
    </section>
    <!-- end blo modal -->

@stop
@section('script')

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script>
        // عرض تفاصيل modal المقالات
        function Details(id) {
            console.log('open model : ' + id);
            $.ajax({
                url: 'http://127.0.0.1:8000/artical/show/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    document.getElementById("definition").innerHTML = response.definition;
                    let img = document.getElementById('img');
                    img.src = response.image;
                }
            })
        }

        $(document).ready(function() {
            $("#submitBtn").click(function() {
                let formData = new FormData();
                let phone_number = $("#phone_number").val();
                formData.append("phone_number", phone_number);

                $.ajax({
                    type: "POST",
                    url: "/ambulance_order/add",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(response) {
                        // تنفيذ إجراءات بعد الإرسال بنجاح

                        // إخفاء حقل إدخال الرقم وعرض العداد التنازلي
                        $(".hideNumber").hide();
                        let countdownElement = $("<p>").addClass("countdown").text(
                            "Wait a minute. If he doesn't call you, we apologize for the lack of cars at the moment"
                            );
                        $(".inputNumber").append(countdownElement);

                        // تحديث العداد التنازلي بشكل دوري
                        let remainingTime = 60;
                        let countdownInterval = setInterval(function() {
                            if (remainingTime <= 0) {
                                clearInterval(countdownInterval);
                                countdownElement.remove();
                                $(".hideNumber").show();
                                $("#phone_number").val("");
                            } else {
                                let minutes = Math.floor(remainingTime / 60);
                                let seconds = remainingTime % 60;
                                countdownElement.text(
                                    "You can submit the form again in " + minutes +
                                    "m " + seconds + "s");
                                remainingTime--;
                            }
                        }, 1000);
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = " inter number ";
                        $("#error").append(errorMessage);
                    }
                });
            });
            $("#phone_number").on("focus keyup", function() {
                $("#error").empty(); // إفراغ عنصر الخطأ عند البدء في الكتابة
            });
        });
    </script>







    <script src="{{ URL::asset('demo/js/jquery-3.6.3.js') }}"></script>
    <script src="{{ URL::asset('demo/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('demo/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ URL::asset('demo/js/swiper-bundle.min.js') }}"></script>
@stop
