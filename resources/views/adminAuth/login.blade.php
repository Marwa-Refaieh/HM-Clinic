@extends('layouts.app')

@section('content')


    <!-- Start Section Hero-->
    <section class="hero is-success is-fullheight" >
        <div class="hero-head">
            <header class="navbar nav-fixed pt-2">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item">
                            <img src="{{ URL::asset('demo/img/home/logo.png') }}" alt="Logo" width="35" class="mr-2">
                            <h1 class="brand-name title is-4 has-text-weight-bold">HM-Clinic</h1>
                        </a>
                        <span class="navbar-burger has-text-white" data-target="navbarMenuHeroC">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>
                    <div id="navbarMenuHeroC" class="navbar-menu">
                        <div class="navbar-end">
                           <span class="navbar-item">Dashboard</span>
                        </div>
                    </div>
                </div>
            </header>

        </div>

        <div class="hero-body p-0">
            <div class="container">
                <div class="columns is-flex is-justify-content-center">
                    <div class="column is-10-mobile is-6-tablet is-5-desktop is-4-widescreen">
                        <form method="POST" action="{{ route('admin.login.submit') }}" class="box">
                            @csrf
                            <figure class="image is-96x96">
                                <img class="is-rounded" src="{{ URL::asset('demo/img/login/avater.jpg') }}">
                            </figure>
                            <div class="start has-text-white has-text-centered">
                                <h1 class="is-size-4 mt-4">WELCOME</h1>
                                <span class="icon-text pt-2">
                                    <span class="is-size-7 has-text-grey-light">Login here</span>
                                    <span class="icon">
                                        <i class="fa fa-hand-o-down has-text-primary" aria-hidden="true"></i>
                                    </span>
                                </span>
                            </div>
                            <div class="field ">
                                <div class="control has-icons-left mb-4">
                                    <input id="email" type="email" placeholder="Email"
                                        class="input has-text-white @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input id="password" type="password" placeholder="Password"
                                        class="input has-text-white @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="field mt-4">
                                <button type="submit" onclick="loginfunction()" class="button is-success is-fullwidth">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End Section Hero-->





















    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
