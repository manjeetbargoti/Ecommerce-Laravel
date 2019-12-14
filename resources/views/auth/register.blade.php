@extends('layouts.front.front_design')
@section('content')
<div id="particles-js"></div>
<div class="product-page-heading ">
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
        <form class=" p-4 form-horizontal register_valid m-b-20" id="register_valid" action="{{ route('register') }}"
            method="POST">
            @csrf
            <div class="form-group row">
                <div class="col-sm-12">
                    <label class="col-form-label">{{ __('You are?') }}</label>
                </div>
                @foreach(Spatie\Permission\Models\Role::whereIn('name',
                array('Buyer','Supplier','Seller'))->get() as $roles)
                <div class="col-sm-3 col-12" id="UserOption">
                    <label class="custom-control custom-radio">
                        <input type="radio" id="If{{ $roles->name }}" class="form-check-input" @if($roles->name ==
                        'User')
                        checked @endif name="roles"
                        value="{{ $roles->name }}"
                        class="custom-control-input @error('roles') is-invalid
                        @enderror">
                        <span class="custom-control-indicator"></span>
                        <a class="custom-control-description">{{ $roles->name }}</a>
                    </label>
                    @error('roles')
                    <span class="invalid-feedback text-white" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                @endforeach
            </div>
            <div class="form-group row d-none" id="IfSupplierCheck">
                <!-- Business name field -->
                <div class="col-sm-12">
                    <label for="Business Name" class="col-form-label">{{ __('Business Name *') }}</label>
                    </span>
                    <input type="text" class="form-control @error('business_name') is-invalid @enderror"
                        name="business_name" value="{{ old('business_name') }}" required id="business_name"
                        placeholder="Business Name">
                    @error('business_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- /.Business name field -->
                <!-- Business Category field -->
                <div class="col-sm-12">
                    <label for="Category" class="col-form-label">{{ __('Category *') }}</label>
                    <select name="supplier_category" id="supplier_category" class="form-control">
                        <option value=""> -- Select Category -- </option>
                        @foreach(\App\SupplierCategory::where('status','1')->get() as $suppCat)
                        <option value="{{ $suppCat->name }}">{{ $suppCat->name }}</option>
                        @endforeach
                    </select>
                    @error('supplier_category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- /.Business Category field -->
            </div>
            <div class="form-group row">
                <!-- Title field -->
                <div class="col-sm-6">
                    <label for="title" class="col-form-label">{{ __('Title *') }}</label>
                    <div class="input-group">
                        <select type="text" class="form-control @error('title') is-invalid @enderror" name="title"
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
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                        value="{{ old('username') }}" required id="username" placeholder="Username">
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- /.Username field -->
            </div>
            <div class="form-group row">
                <!-- First Name field -->
                <div class="col-sm-6">
                    <label for="first name" class="col-form-label">{{ __('First Name *') }}</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                        value="{{ old('first_name') }}" required autocomplete="first_name" id="first_name"
                        placeholder="First Name">
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- /.First Name field -->
                <!-- Last Name field -->
                <div class="col-sm-6">
                    <label for="last name" class="col-form-label">{{ __('Last Name *') }}</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                        value="{{ old('last_name') }}" required autocomplete="last_name" id="last_name"
                        placeholder="Last Name">
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- /.Last Name field -->
            </div>
            <div class="form-group row">
                <!-- Email Address field -->
                <div class="col-sm-6">
                    <label for="email" class="col-form-label">{{ __('Email Address *') }}</label>
                    <input type="email" placeholder="Email Address" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                        autocomplete="email" />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- /.Email Address field -->
                <!-- Phone number field -->
                <div class="col-sm-6">
                    <label for="phone" class="col-form-label">{{ __('Phone *') }}</label>
                    <input type="tel" id="phone" placeholder="Phone Number" name="phone"
                        class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required
                        autocomplete="phone" />
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- /.Phone number field -->
            </div>
            <div class="form-group row">
                <!-- Password field -->
                <div class="col-sm-6">
                    <label for="password" class="col-form-label text-sm-right">{{ __('Password *') }}</label>
                    <input type="password" placeholder="Password" id="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" required
                        autocomplete="new-password" />
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- /.Password Field -->
                <!-- Confirm Password field -->
                <div class="col-sm-6">
                    <label for="password-confirm"
                        class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                    @error('confirmpassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- /.Confirm Password field -->
            </div>
            <div class="form-group row">
                <div class="col-sm-9">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="form-check-input" name="terms" id="Terms" required>
                        <span class="custom-control-indicator"></span>
                        <span href="#" class="custom-control-description">I agree with the <a href="#"
                                style="text-decoration:underline;">Terms and
                                Conditions</a>.</span>
                    </label>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="reset" class="btn btn-danger btn-lg pull-left">Reset</button>
                    <input type="submit" value="Register" class="btn btn-primary btn-lg pull-right" />
                </div>
            </div>
        </form>
    </div>
</div>
<div class="col-lg-3 col-md-3 d-none d-md-block d-lg-block"></div>
</div>

@endsection