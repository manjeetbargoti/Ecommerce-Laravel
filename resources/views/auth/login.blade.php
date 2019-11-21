@extends('layouts.front.front_design')
@section('content')
<style>
body {
    background-image: url(../../admin/img/login.jpg) !important;
    background-repeat: no-repeat !important;
    background-size: cover !important;
    background-position: inherit !important;
}
</style>
<div class="container wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="2s">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 login_top_bottom">
            <div class="row">
                <div class="col-lg-5  col-md-8  col-sm-12 mx-auto">
                    <div class="login_logo login_border_radius1">
                        <h3 class="text-center">
                            <img src="{{ asset('admin/img/logow2.png') }}" alt="{{ config('app.name') }} logo"
                                class="admire_logo"><span class="text-white">
                                {{ config('app.name') }} &nbsp;<br />
                                Log In</span>
                        </h3>
                    </div>
                    <div class="bg-white login_content login_border_radius">
                        <form action="{{ route('login') }}" id="login_validator" method="post" class="login_validator">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="col-form-label"> {{ __('E-Mail Address') }}</label>
                                <div class="input-group">
                                    <span class="input-group-addon input_email"><i
                                            class="fa fa-envelope text-primary"></i></span>
                                    <input id="email" type="email" name="email"
                                        class="form-control  form-control-md @error('email') is-invalid @enderror"
                                        id="email" name="username" value="{{ old('email') }}" placeholder="E-mail"
                                        required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!--</h3>-->
                            <div class="form-group">
                                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                <div class="input-group">
                                    <span class="input-group-addon addon_password"><i
                                            class="fa fa-lock text-primary"></i></span>
                                    <input id="password" type="password"
                                        class="form-control form-control-md @error('password') is-invalid @enderror"
                                        id="password" name="password" required autocomplete="current-password"
                                        placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="submit" value="{{ __('Login') }}"
                                            class="btn btn-primary btn-block login_button">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}
                                            class="custom-control-input form-control">
                                        <span class="custom-control-indicator"></span>
                                        <a class="custom-control-description">{{ __('Keep me logged in') }}</a>
                                    </label>
                                </div>
                                <div class="col-6 text-right forgot_pwd">
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                        class="custom-control-description forgottxt_clr">{{ __('Forgot Password?') }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm m-t-10">
                                    <div class="icon-white btn-facebook icon_padding loginpage_border">
                                        <i class="fa fa-facebook"></i>
                                        <span class="text-white icon_padding text-center question_mark">Log In With
                                            Facebook</span>
                                    </div>
                                </div>
                                <div class="col-sm m-t-10">
                                    <div class="icon-white btn-google icon_padding loginpage_border">
                                        <i class="fa fa-google-plus"></i>
                                        <span class="text-white icon_padding question_mark">Log In With
                                            Google+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Don't you have an Account? </label>
                            <a href="{{ route('register') }}" class="text-primary"><b>Sign Up</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection