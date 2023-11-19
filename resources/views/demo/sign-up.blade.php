@extends('demo.demo-layouts.master-log-sign')

@section('title')
    Contact
@stop

@section('css')
    <link href="{{ URL::asset('demo/css/login.css') }}" rel="stylesheet">
@stop

@section('content')
    <!-- Start Section Hero-->
    <section class="hero is-success is-fullheight">
        <div class="hero-head">
            @include('demo.demo-layouts.main-header')
        </div>

        <div class="hero-body p-0">
            <div class="container">
                <div class="columns is-flex is-justify-content-center">
                    <div class="column is-10-mobile is-6-tablet is-5-desktop is-4-widescreen">
                        <form action="" class="box ">
                            <figure class="image is-96x96">
                                <img class="is-rounded" src="{{ URL::asset('demo/img/login/avater.jpg') }}">
                            </figure>
                            <div class="start has-text-white has-text-centered">
                                <h1 class="is-size-4">WELCOME</h1>
                                <span class="icon-text pt-2">
                                    <span class="is-size-7 has-text-grey-light">Sign Up here</span>
                                    <span class="icon">
                                        <i class="fa fa-hand-o-down has-text-primary" aria-hidden="true"></i>
                                    </span>
                                </span>
                            </div>
                            <div class="field ">
                                <div class="control has-icons-left mb-4">
                                    <input type="text" placeholder="First Name" class="input has-text-white" required>
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field ">
                                <div class="control has-icons-left mb-4">
                                    <input type="text" placeholder="Last Name" class="input has-text-white" required>
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field ">
                                <div class="control has-icons-left mb-4">
                                    <input type="email" placeholder="Email" class="input has-text-white" required>
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input type="password" placeholder="Password" class="input has-text-white" required>
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field">
                                <button class="button is-success is-fullwidth">
                                    Sign Up
                                </button>
                            </div>
                            <div class="end has-text-centered mt-3">
                                <p class="is-size-7 pb-2 has-text-grey-light">Do have an account?</p>
                                <a href="{{ url('demo/login') }}" class="has-text-primary">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Hero-->
@stop
