@extends('layouts.front.front_design')
@section('content')
<div id="particles-js"></div>
<div class="product-page-heading">
    <div class="menu-destination-prehome">
        <ul class="list-unstyled text-center">
            <li>
                <div style="display: block;"><a>WELCOME</a></div>
            </li>
        </ul>
    </div>
</div>
<div class="container inquireform">
    <div class="col-lg-3 col-md-3 d-none d-md-block d-lg-block"></div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <!-- Default form contact -->
        <form action="{{ route('login') }}" id="login_validator" method="post" class="login_validator p-4">
            @csrf
            <div class="form-group">
                <label for="email" class="col-form-label"> {{ __('E-Mail Address') }}</label>
                <input id="email" type="email" name="email"
                    class="form-control  form-control-md @error('email') is-invalid @enderror" id="email"
                    name="username" value="{{ old('email') }}" placeholder="E-mail" required autocomplete="email"
                    autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                <input id="password" type="password"
                    class="form-control form-control-md @error('password') is-invalid @enderror" id="password"
                    name="password" required autocomplete="current-password" placeholder="Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                                class="form-check-input">
                            <span class="custom-control-indicator"></span>
                            <a class="custom-control-description">{{ __('Keep me logged in') }}</a>
                        </label>
                    </div>
                    <div class="col-6 text-right forgot_pwd">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="custom-control-description forgottxt_clr text-success" style="color: #67d5ae !important;">{{ __('Forgot Password?') }}</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12">
                        <input type="submit" value="{{ __('Login') }}" class="btn btn-info btn-block login_button">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label"> </label>
                <a href="{{ route('register') }}" class=""
                    style="color:#67d5ae;font-size:18px;font-weight:bold;"><b>CREATE AN ACCOUNT</b></a>
            </div>
        </form>
    </div>
    <div class="col-lg-3 col-md-3 d-none d-md-block d-lg-block"></div>
</div>
@endsection