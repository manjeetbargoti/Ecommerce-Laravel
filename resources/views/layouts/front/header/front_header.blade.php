<!-- Top Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fa fa-align-justify"></i>
            <span></span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>
        <span style="font-size:2em;font-weight:400;"> &nbsp;{{ config('app.name') }}</span>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if (Route::has('login'))
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">How it works</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="{{ route('register') }}">Register</a> -->
                </li>
                @endauth
            </ul>
            @endif
        </div>
    </div>
</nav>
<!-- /.Top Navbar -->