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
            <div class="col-md-9 m-auto">
                <div class="card">
                    <div class="card-header">Create New Category</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/supplier-category') }}" title="Back"><button
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

                        <form method="POST" action="{{ url('/admin/supplier-category') }}" accept-charset="UTF-8"
                            class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="control-label">{{ 'Name' }}</label>
                                <input class="form-control" name="name" type="text" id="name"
                                    value="{{ isset($suppliercategory->name) ? $suppliercategory->name : ''}}">
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                                <label for="description" class="control-label">{{ 'Description' }}</label>
                                <textarea class="form-control" rows="5" name="description" type="textarea"
                                    id="description">{{ isset($suppliercategory->description) ? $suppliercategory->description : ''}}</textarea>
                                {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                                <label for="status" class="control-label">{{ 'Status' }}</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="1">Enable
                                    </option>
                                    <option value="0">Disable
                                    </option>
                                </select>
                                {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                            </div>


                            <div class="form-group">
                                <input class="btn btn-primary" type="submit"
                                    value="Add Category">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection