<div class="container-fluid container-fluid-nav">
    <div class="navbar navbar-expand-lg p-0 mt-4">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('/images/logo-light.png') }}"
                alt="MY 🔐Blog" /></a>
        <ul class="navbar-nav reg-log">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class=" nav-link text-dark text-uppercase" href="{{ route('login') }}"><span
                        class="mdi mdi-account-key mdi-24px"> </span> {{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="reg-log nav-link text-dark text-uppercase" href="{{ route('register') }}"><span
                        class="mdi mdi-account-multiple-plus mdi-24px"> </span> {{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    @if (Auth::check() && Auth::user()->isAdmin())
                    <a class="dropdown-item" href="{{ url('/admin')}}">{{ __('Admin') }}</a>
                    @endif
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
        <form class="form-inline my-2 my-lg-0 ml-0 ml-auto">
            <input class="my-search-input form-control mr-sm-2" type="search" aria-label="Search">
            <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    <nav class="navbar navbar-expand-lg mt-4 my-nav shadow rounded ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="mdi mdi-menu mdi-24px"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center order-2" id="navbarNavAltMarkup">
            <ul class="navbar-nav text-uppercase">
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
