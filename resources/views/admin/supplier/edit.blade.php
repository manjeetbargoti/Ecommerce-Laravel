@extends('layouts.panel.panel_design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Suppliers
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">Edit Supplier #{{ $user->id }} ({{ $user->first_name }}
                        {{ $user->last_name }})</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/supplier') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        <form action="{{ url('admin/supplier/'.$user->id) }}" method="POST"
                            class="form-horizontal login_validator" enctype="multipart/form-data"
                            id="form_inline_validator">
                            <input name="_method" type="hidden" value="PATCH">
                            @csrf
                            <!-- User Role Select Field -->
                            <div class="form-group row d-none">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="User Role" class="col-form-label">{{ __('User Role *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="text" name="roles" id="roles"
                                        class="form-control @error('roles') is-invalid @enderror" required
                                        value="Supplier">
                                </div>
                            </div>
                            <!-- /.User Role Select Field -->

                            <!-- Business name Field -->
                            <div class="form-group row" id="BusinessEName">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Business Name"
                                        class="col-form-label">{{ __('Business Name *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="text" name="business_name" id="business_name"
                                        class="form-control @error(' business_name') is-invalid @enderror" required
                                        value="{{ $supplierData->business_name }}">
                                </div>
                            </div>
                            <!-- /.Business name Field -->

                            <!-- Supplier Category Select Field -->
                            <div class="form-group row" id="SupplierECategory">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Supplier Category"
                                        class="col-form-label">{{ __('Supplier Category *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <select name="category" id="SuppCategory"
                                        class="validate[required] form-control select2 @error('category') is-invalid @enderror"
                                        required value="{{ old('category') }}">
                                        <option value=""> -- Supplier Category -- </option>
                                        @foreach(\App\SupplierCategory::where('status',1)->get() as $suppCat)
                                        <option value="{{ $suppCat->name }}" @if($supplierData->category ==
                                            $suppCat->name) selected @endif>{{ $suppCat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.Supplier Category Select Field -->

                            <!-- User Title Select Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="User Role" class="col-form-label">{{ __('Supplier Title *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <select name="title" id="UserTitle" class="validate[required] form-control select2 @error(' title') is-invalid
                                            @enderror" required value="{{ old('title') }}">
                                        <option value="">Select a Title</option>
                                        <option value="Mr." @if($user->title == 'Mr.') selected @endif>Mr.</option>
                                        <option value="Ms." @if($user->title == 'Ms.') selected @endif>Ms.</option>
                                        <option value="Mrs." @if($user->title == 'Mrs.') selected @endif>Mrs.</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.User Title Select Field -->

                            <!-- Username Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Username" class="col-form-label">{{ __('Username *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="text" id="UserName" name="username"
                                        class="form-control @error('username') is-invalid @enderror" required
                                        value="{{ $user->username }}">
                                    <span class="pull-left" id="error_username"></span>
                                </div>
                            </div>
                            <!-- /.Username Input Field -->

                            <!-- First Name Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="First Name" class="col-form-label">{{ __('First Name *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="text" id="FirstName" name="first_name"
                                        class="form-control @error('first_name') is-invalid @enderror" required
                                        value="{{ $user->first_name }}">
                                </div>
                            </div>
                            <!-- /.First Name Input Field -->

                            <!-- Last Name Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Last Name" class="col-form-label">{{ __('Last Name *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="text" id="LastName" name="last_name"
                                        class="form-control @error('last_name') is-invalid @enderror"
                                        value="{{ $user->last_name }}">
                                </div>
                            </div>
                            <!-- /.Last Name Input Field -->

                            <!-- Email Address Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="email" class="col-form-label">{{ __('E-mail *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="email" id="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" required
                                        value="{{ $user->email }}">
                                    <span class="pull-left" id="error_email"></span>
                                </div>
                            </div>
                            <!-- Email Address Input Field -->

                            <!-- Phone Number Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Phone" class="col-form-label">{{ __('Phone *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="tel" id="PhoneNumber" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror" required
                                        value="{{ $user->phone }}">
                                </div>
                            </div>
                            <!-- Phone Number Input Field -->

                            <!-- Country Select Field -->
                            <div class="form-group row" id="SupplierCountry">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Country"
                                        class="col-form-label">{{ __('Country *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <select name="country" id="SCountry"
                                        class="validate[required] form-control select2 @error('country') is-invalid @enderror"
                                        required value="{{ old('country') }}">
                                        <option value=""> -- Select Country -- </option>
                                        @foreach(\App\Country::get() as $count)
                                        <option value="{{ $count->iso3 }}" @if($count->iso3 == $user->country) selected @endif>{{ $count->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.Country Select Field -->

                            <!-- User Status Select Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Status" class="col-form-label">{{ __('Status *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <select name="status" id="status" value="{{ $user->status }}"
                                        class="form-control @error('status') is-invalid @enderror">
                                        <option value="1" @if($user->status == 1) selected @endif>Enable</option>
                                        <option value="0" @if($user->status == 0) selected @endif>Disable</option>
                                    </select>
                                </div>
                            </div>
                            <!-- User Status Field -->

                            <div class="form-actions form-group row">
                                <div class="col-xl-4 m-auto">
                                    <input type="reset" value="Reset" class="btn btn-warning pull-left">
                                    <input type="submit" value="Update Supplier" class="btn btn-primary pull-right">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection