<header class="navbar nav-fixed">
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
                <a href="{{ route('home') }}" class="navbar-item">
                    Home
                </a>
                <a href="{{ route('doctors') }}" class="navbar-item">
                    Doctor
                </a>
                {{-- <a href="{{ route('doctors') }}" class="navbar-item">
                    Doctor Details
                </a> --}}
                <a href="{{ route('articles', ['category' => 1]) }}" class="navbar-item">
                    Blog
                </a>
                <a href="{{ route('contact') }}" class="navbar-item">
                    Contact us
                </a>
                <span class="navbar-item">
                    <div class="field has-addons">
                        <nav class="breadcrumb" aria-label="breadcrumbs">
                            <ul>
                                @guest

                                    @if (Route::has('login'))
                                        <li>
                                            <a href="{{ route('login') }}">
                                                <span class="icon is-small">
                                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                                </span>
                                                <span class="has-text-white">Log In</span>

                                            </a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li>
                                            <a href="{{ route('register') }}">
                                                <span class="icon is-small">
                                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                                </span>
                                                <span class="has-text-white">Sign Up</span>
                                            </a>
                                        </li>
                                    @endif
                                @else
                                    <li class="navbar-item has-dropdown is-hoverable ">
                                        <a class="navbar-link has-text-white">
                                            {{ Auth::user()->fname }}
                                            {{ Auth::user()->lname }}
                                        </a>
                                    
                                        <div class="navbar-dropdown">
                                            <a class="navbar-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                  
                                @endguest

                            </ul>

                        </nav>
                    </div>
                </span>

            </div>
        </div>
    </div>
</header>
