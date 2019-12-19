@extends('layouts.panel.panel_design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    User Profile
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 m-auto">
                <div class="card">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/profile') }}" title="Back"><button class="btn btn-warning btn-sm"><i
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

                        <form action="{{ url('admin/profile/'.Auth::user()->id.'/change-password') }}" method="POST"
                            class="form-horizontal login_validator" enctype="multipart/form-data"
                            id="form_inline_validator">
                            <!-- <input name="_method" type="hidden" value="PATCH"> -->
                            @csrf
                            
                            <!--  Password Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="New Password" class="col-form-label">{{ __('New Password *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="password" id="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" required>
                                </div>
                            </div>
                            <!-- /.Password Input Field -->

                            <!--  Confirm Password Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Confirm Password" class="col-form-label">{{ __('Confirm Password *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="password" id="conf_password" name="conf_password"
                                        class="form-control @error('conf_password') is-invalid @enderror" required>
                                </div>
                            </div>
                            <!-- /.Confirm Password Input Field -->

                            <div class="form-actions form-group row">
                                <div class="col-xl-4 m-auto">
                                    <input type="reset" value="Reset" class="btn btn-warning pull-left">
                                    <input type="submit" value="Update Password" class="btn btn-primary pull-right">
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