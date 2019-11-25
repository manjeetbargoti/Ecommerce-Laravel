@extends('layouts.panel.panel_design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Product
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-9 m-auto">
                <div class="card">
                    <div class="card-header">Edit Vendor #{{ $productvendor->id }} ({{ $productvendor->name }})</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/product-vendor') }}" title="Back"><button
                                class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/product-vendor/' . $productvendor->id) }}"
                            accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="control-label">{{ 'Name' }}</label>
                                <input class="form-control" name="name" type="text" id="name"
                                    value="{{ isset($productvendor->name) ? $productvendor->name : ''}}">
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('business_name') ? 'has-error' : ''}}">
                                <label for="business_name" class="control-label">{{ 'Business Name' }}</label>
                                <input class="form-control" name="business_name" type="text" id="business_name"
                                    value="{{ isset($productvendor->business_name) ? $productvendor->business_name : ''}}">
                                {!! $errors->first('business_name', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                                <label for="status" class="control-label">{{ 'Status' }}</label>
                                <select name="status" id="Status" class="form-control">
                                    <option value="1" @if($productvendor->status == 1) selected @endif>Enable</option>
                                    <option value="0" @if($productvendor->status == 0) selected @endif>Disable</option>
                                </select>
                                {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                                <label for="description" class="control-label">{{ 'Description' }}</label>
                                <textarea class="form-control" rows="5" name="description" type="textarea"
                                    id="description">{{ isset($productvendor->description) ? $productvendor->description : ''}}</textarea>
                                {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                            </div>


                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Add Vendor">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection