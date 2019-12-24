@extends('layouts.panel.panel_design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Profile
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Business info</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/profile') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back</button></a>
                        <form class="form-horizontal login_validator" id="tryitForm"
                            action="{{ url('/supplier-info/'.$sdata->id.'/edit') }}" method="post">

                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="business name" class="col-form-label">Business Name *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                                </span>
                                                <input readonly type="text" name="business_name" id="business_name"
                                                    class="form-control" value="{{ $sdata->business_name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Description" class="col-form-label">Description *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <textarea name="description" rows="4" id="description"
                                                class="form-control">{{ $sdata->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="License Number" class="col-form-label">License Number *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                                </span>
                                                <input type="text" name="license_number" id="license_number"
                                                    class="form-control" value="{{ $sdata->license_number }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Website" class="col-form-label">Website *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                                </span>
                                                <input type="text" name="website" id="website" class="form-control"
                                                    value="{{ $sdata->website }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Country" class="col-form-label">Country *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-globe text-primary"></i></span>
                                                <select class="form-control" name="country" id="country">
                                                    <option value="">-- Select Country --</option>
                                                    @foreach(\App\Country::get() as $cont)
                                                    <option value="{{ $cont->iso3 }}" @if($cont->iso3 ==
                                                        $sdata->country) selected @endif>{{ $cont->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="State" class="col-form-label">State
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-globe text-primary"></i></span>
                                                <input type="text" placeholder=" " id="state" name="state"
                                                    class="form-control" value="{{ $sdata->state }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="City" class="col-form-label">City
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-globe text-primary"></i></span>
                                                <input type="text" placeholder=" " id="city" name="city"
                                                    class="form-control" value="{{ $sdata->city }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6 m-auto">
                                            <button class="btn btn-warning" type="reset" id="clear">
                                                <i class="fa fa-refresh"></i>
                                                Reset
                                            </button>
                                            <button class="btn btn-primary pull-right" type="submit">
                                                <i class="fa fa-user"></i>
                                                Update
                                            </button>
                                        </div>
                                    </div>
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