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
<div class="container wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="row login_top_bottom">
        <div class="col-12 mx-auto">
            <div class="row">
                <div class="col-lg-8 col-sm-12  col-md-8 mx-auto">
                    <div class="login_logo login_border_radius1">
                        <h3 class="text-center">
                            <img src="{{ asset('admin/img/logow2.png') }}" alt="{{ config('app.name') }} logo"
                                class="admire_logo"><span class="text-white">
                                {{ config('app.name') }}<br />
                                {{ __('Register') }}</span>
                        </h3>
                    </div>
                    <div class="bg-white login_content login_border_radius">
                        <!-- Register Form Start here -->
                        <form class="form-horizontal login_validator m-b-20" id="register_valid"
                            action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="common" id="Common">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label">{{ __('You are?') }}</label>
                                    </div>
                                    @foreach(Spatie\Permission\Models\Role::get() as $roles)
                                    <div class="col-sm-3 col-12">
                                        <label class="custom-control custom-radio">
                                            <input type="radio" id="If{{ $roles->name }}" name="roles"
                                                onclick="javascript:userTypeCheck();" value="{{ $roles->name }}"
                                                class="custom-control-input form-control @error('roles') is-invalid @enderror"
                                                >
                                            <span class="custom-control-indicator"></span>
                                            <a class="custom-control-description">{{ $roles->name }}</a>
                                        </label>
                                        @error('roles')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="client_form agentForm" id="ifLawyerCheck" style="display:block;">
                                <div class="form-group row">
                                    <!-- Title field -->
                                    <div class="col-sm-6">
                                        <label for="title" class="col-form-label">{{ __('Title *') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"> <i
                                                    class="fa fa-get-pocket text-primary"></i>
                                            </span>
                                            <select type="text"
                                                class="form-control @error('title') is-invalid @enderror" name="title"
                                                value="{{ old('title') }}" required id="title">
                                                <option value="Mr.">Mr.</option>
                                                <option value="Ms.">Ms.</option>
                                                <option value="Mrs.">Mrs.</option>
                                            </select>

                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.Title field -->
                                    <!-- Username field -->
                                    <div class="col-sm-6">
                                        <label for="username" class="col-form-label">{{ __('Username *') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"> <i
                                                    class="fa fa-user-circle-o text-primary"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror"
                                                name="username" value="{{ old('username') }}" required id="username"
                                                placeholder="Username">

                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.Username field -->
                                </div>
                                <div class="form-group row">
                                    <!-- First Name field -->
                                    <div class="col-sm-6">
                                        <label for="first name" class="col-form-label">{{ __('First Name *') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                name="first_name" value="{{ old('first_name') }}" required
                                                autocomplete="first_name" id="first_name" placeholder="First Name">

                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.First Name field -->
                                    <!-- Last Name field -->
                                    <div class="col-sm-6">
                                        <label for="last name" class="col-form-label">{{ __('Last Name *') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"> <i
                                                    class="fa fa-user-plus text-primary"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                name="last_name" value="{{ old('last_name') }}" required
                                                autocomplete="last_name" id="last_name" placeholder="Last Name">

                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.Last Name field -->
                                </div>
                                <div class="form-group row">
                                    <!-- Email Address field -->
                                    <div class="col-sm-6">
                                        <label for="email" class="col-form-label">{{ __('Email Address *') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope text-primary"></i>
                                            </span>
                                            <input type="email" placeholder="Email Address" name="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" required autocomplete="email" />

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.Email Address field -->
                                    <!-- Phone number field -->
                                    <div class="col-sm-6">
                                        <label for="phone" class="col-form-label">{{ __('Phone *') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone text-primary"></i>
                                            </span>
                                            <input type="tel" id="phone" placeholder="Phone Number" name="phone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                value="{{ old('phone') }}" required autocomplete="phone" />

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.Phone number field -->
                                </div>
                                <div class="form-group row">
                                    <!-- Password field -->
                                    <div class="col-sm-6">
                                        <label for="password"
                                            class="col-form-label text-sm-right">{{ __('Password *') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-key text-primary"></i>
                                            </span>
                                            <input type="password" placeholder="Password" id="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror" required />

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.Password Field -->
                                    <!-- Confirm Password field -->
                                    <div class="col-sm-6">
                                        <label for="confirmpassword"
                                            class="col-form-label">{{ __('Confirm Password *') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-key text-primary"></i>
                                            </span>
                                            <input type="password" placeholder="Confirm Password" name="confirm"
                                                id="confirmpassword"
                                                class="form-control @error('password') is-invalid @enderror" required />

                                            @error('confirmpassword')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.Confirm Password field -->
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-9">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input form-control"
                                                name="terms" id="Terms">
                                            <span class="custom-control-indicator"></span>
                                            <span href="#" class="custom-control-description">I agree with the <a
                                                    href="#" style="text-decoration:underline;">Terms and
                                                    Conditions</a>.</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="reset" class="btn btn-danger btn-lg pull-left">Reset</button>
                                        <input type="submit" value="Submit" class="btn btn-primary btn-lg pull-right" />

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <label class="col-form-label">Already have an account?</label> <a
                                        href="{{ route('login') }}" class="text-primary login_hover"><b>Log
                                            In</b></a>
                                </div>
                            </div>
                        </form>
                        <!-- /.Register form ends here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection