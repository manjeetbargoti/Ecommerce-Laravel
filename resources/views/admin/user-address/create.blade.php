@extends('layouts.panel.panel_design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    User Address
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
                    <div class="card-header">Add New Address</div>
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

                        <form action="{{ url('admin/user/address') }}" method="post"
                            class="form-horizontal login_validator" enctype="multipart/form-data"
                            id="form_inline_validator">
                            @csrf

                            <!--  Name Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Full Name" class="col-form-label">{{ __('Full Name *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="text" id="FullName" name="name"
                                        class="form-control @error('name') is-invalid @enderror" required
                                        value="{{ old('name') }}">
                                </div>
                            </div>
                            <!-- /.Name Input Field -->

                            <!-- Phone Number Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Phone" class="col-form-label">{{ __('Phone *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="tel" id="PhoneNumber" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror" required
                                        value="{{ old('phone') }}">
                                </div>
                            </div>
                            <!-- Phone Number Input Field -->

                            <!-- Address Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Full Address" class="col-form-label">{{ __('Full Address *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <textarea name="address1" id="Address1" cols="30" rows="3"
                                        class="form-control @error('address1') is-invalid @enderror" required
                                        value="{{ old('address1') }}"></textarea>
                                </div>
                            </div>
                            <!-- /.Address Input Field -->

                            <!-- Country Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Country" class="col-form-label">{{ __('Country *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <select name="country" id="Country"
                                        class="form-control @error('country') is-invalid @enderror">
                                        <option value="" selected> -- Select Country -- </option>
                                        @foreach(\App\Country::get() as $count)
                                        <option value="{{ $count->iso3 }}"> {{ $count->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.Country Input Field -->

                            <!-- State Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="State" class="col-form-label">{{ __('State *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="text" id="state" name="state"
                                        class="form-control @error('state') is-invalid @enderror" required
                                        value="{{ old('state') }}">
                                </div>
                            </div>
                            <!-- /.State Input Field -->

                            <!-- City Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="City" class="col-form-label">{{ __('City *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="text" id="city" name="city"
                                        class="form-control @error('city') is-invalid @enderror" required
                                        value="{{ old('city') }}">
                                </div>
                            </div>
                            <!-- /.City Input Field -->

                            <!-- Zipcode Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Zipcode" class="col-form-label">{{ __('Zipcode/P.O.Box *') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="text" id="zipcode" name="zipcode"
                                        class="form-control @error('zipcode') is-invalid @enderror" required
                                        value="{{ old('zipcode') }}">
                                </div>
                            </div>
                            <!-- /.City Input Field -->

                            <div class="form-actions form-group row">
                                <div class="col-xl-4 m-auto">
                                    <input type="reset" value="Reset" class="btn btn-warning pull-left">
                                    <input type="submit" value="Add Address" class="btn btn-primary pull-right">
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