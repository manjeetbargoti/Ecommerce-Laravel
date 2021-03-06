<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top menubar-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('/images/logo/'.config('app.logo')) }}" width="60px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link" href="{{ url('/promotions') }}" style="color:#67d5ae !important;">PROMOTIONS &nbsp;&nbsp;|</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">CONTACT &nbsp;&nbsp;|</a>
                </li>
                @if (Route::has('login'))
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ACCOUNT</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown"
                        style="top: 0em;left: 2em;background: rgba(255,255,255,0.05);">
                        <a class="dropdown-item" href="{{ url('/admin/profile') }}"><i class="fa fa-user"></i>
                            Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                class="fa fa-sign-out"></i>
                            {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">SIGN IN</a>
                </li>
                @endauth
                @endif
                <li class="nav-item">
                    <a class="nav-link d-lg-none d-md-none d-sm-block d-xs-block" href="{{ url('/about-us') }}">ABOUT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>