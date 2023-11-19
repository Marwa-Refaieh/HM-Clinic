@extends('demo.demo-layouts.master')

@section('title')
    Contact
@stop

@section('css')
    <link href="{{ URL::asset('demo/css/contact.css') }}" rel="stylesheet">
@stop

@section('content')

    <a id="button"></a>
    <!-- Start Section Hero-->
    <section class="hero is-success pb-6">
        <div id="particles-js"></div>
        <div id="particles-js"></div>
        <!-- Hero head: will stick at the top -->
        <div class="hero-head pt-2">
            @include('demo.demo-layouts.main-header')
        </div>

        <!-- Hero content: will be in the middle -->
        <div class="hero-body">
            <div class="container ">
                <h1 class="title is-2 has-text-white has-text-centered is-capitalized">Contact Us</h1>

                <div class="columns py-4 px-3">
                    <div class="column is-6 ">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ url('/contact') }}">
                            @csrf
                            <div class="field mb-5 {{ $errors->has('name') ? 'has-error' : '' }}">
                                <div class="control has-icons-left">
                                    <input type="text" name="name" id="name" class="input" placeholder="Name"
                                        autofocus>
                                    <span class="icon is-left">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <span class="has-text-danger">{{ $errors->first('name') }}</span>
                                </div>
                            </div>
                            <div class="field mb-5 {{ $errors->has('name') ? 'has-error' : '' }}">
                                <div class="control has-icons-left">
                                    <input type="email" name="email" id="email" class="input" placeholder="Email">
                                    <span class="icon is-left">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <span class="has-text-danger">{{ $errors->first('email') }}</span>

                                </div>
                            </div>
                            <div class="field mb-5 {{ $errors->has('name') ? 'has-error' : '' }}">
                                <textarea name="comment" id="message" rows="3" class="textarea is-medium" placeholder="Message"></textarea>
                                <span class="has-text-danger">{{ $errors->first('comment') }}</span>
                            </div>
                            <button type="submit" class="button is-fullwidth is-rounded is-success">Submit</button>
                        </form>
                    </div>
                    <div class="column text-column is-6 pl-6 py-5">
                        <h3 class="is-size-3 has-text-weight-semibold">Get in touch</h3>
                        <strong class="py-3">We believe sustainability is vitally important.</strong>
                        <p>Etiam sit amet convallis erat – class aptent taciti sociosqu ad litora torquent per conubia!
                            Maecenas
                            gravida lacus. Lorem etiam sit amet convallis erat.</p>
                        <div class="social is-size-3 mt-4">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                            <i class="fa fa-instagram " aria-hidden="true"></i>
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- End Section Hero-->

    <section class="section map">
        <div class="container">
            <div class="columns px-4">
                <div class="column is-5">
                    <div class="icon-text">
                        <span class="icon has-text-info mb-2">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </span>
                        <span class="has-text-weight-bold">Address</span>
                    </div>

                    <p class="block pl-5">
                        SoHo 94 Broadway St New York, NY 1001
                    </p>

                    <div class="icon-text">
                        <span class="icon has-text-success mb-2">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                        <span class="has-text-weight-bold">Phone</span>
                    </div>

                    <p class="block mb-0 pl-5">
                        234-9876-5400
                    </p>
                    <p class="block pl-5">
                        888-0123-4567 (Toll Free)
                    </p>

                    <div class="icon-text">
                        <span class="icon has-text-warning mb-2">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        <span class="has-text-weight-bold">Email</span>
                    </div>

                    <p class="block pl-5">
                        <a href="">hmclinic8@gmail.com</a>
                    </p>

                    <div class="icon-text">
                        <span class="icon has-text-danger mb-2">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                        </span>
                        <span class="has-text-weight-bold">Time</span>
                    </div>

                    <p class="block mb-0 pl-5">
                        Sut-Sun- 10:00 – 19:00
                    </p>
                    <p class="block pl-5">
                        Mon — Fri 10:00 – 23:00
                    </p>
                </div>
                <div class="column is-7">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d831.8086225975835!2d36.3050522!3d33.4952758!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1518e0d9b4bfffff%3A0xb8896ae4e4336ce4!2z2YXYtNmB2Ykg2KfZhNmH2YTYp9mEINin2YTYo9it2YXYsQ!5e0!3m2!1sar!2suk!4v1677605991310!5m2!1sar!2suk"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
@stop
