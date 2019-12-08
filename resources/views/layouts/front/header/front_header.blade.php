<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top menubar-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset(config('app.logo')) }}" width="60px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">CONTACT</a>
                </li>
                @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/profile') }}">ACCOUNT</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">SIGN IN</a>
                </li>
                @endauth
                @endif
                <li class="nav-item">
                    <a class="nav-link d-lg-none d-md-none d-sm-block d-xs-block" href="#">ABOUT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>