@extends('layouts.panel.panel_design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Users
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
                    <div class="card-header">Edit user #{{ $user->id }} ({{ $user->first_name }} {{ $user->last_name }})</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/user') }}" title="Back"><button class="btn btn-warning btn-sm"><i
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

                        <form action="{{ url('admin/user/'.$user->id) }}"  method="POST"
                            class="form-horizontal login_validator" enctype="multipart/form-data"
                            id="form_inline_validator">
                            <input name="_method" type="hidden" value="PATCH">
                            @csrf
                            <!-- User Role Select Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="User Role" class="col-form-label">{{ __('User Role *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <select name="roles[]" id="roles"
                                        class="validate[required] form-control select2 @error('roles') is-invalid @enderror"
                                        required value="{{ old('roles') }}">
                                        <option value="">Select a Role</option>
                                        @foreach(Spatie\Permission\Models\Role::get() as $roles)
                                        <option value="{{ $roles->name }}" @if(implode(', ', $user->getRoleNames()->toArray()) == $roles->name) selected @endif>{{ $roles->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.User Role Select Field -->

                            <!-- User Title Select Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="User Role" class="col-form-label">{{ __('User Title *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <select name="title" id="UserTitle"
                                        class="validate[required] form-control select2 @error(' title') is-invalid
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
                                    <input type="text" id="Username" name="username"
                                        class="form-control @error('username') is-invalid @enderror" required
                                        value="{{ $user->username }}">
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
                                    <input type="email" id="EmailAddress" name="email"
                                        class="form-control @error('email') is-invalid @enderror" required
                                        value="{{ $user->email }}">
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

                            <div class="form-actions form-group row">
                                <div class="col-xl-4 m-auto">
                                    <input type="reset" value="Reset" class="btn btn-warning pull-left">
                                    <input type="submit" value="Update User" class="btn btn-primary pull-right">
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