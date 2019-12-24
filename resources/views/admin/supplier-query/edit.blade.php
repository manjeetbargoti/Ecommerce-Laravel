@extends('layouts.panel.panel_design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Support Center
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card">
                    <div class="card-header">Edit Supplier Query #{{ $supplierQuery->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/support/supplier-query') }}" title="Back"><button
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

                        <form method="POST" action="{{ url('/admin/support/supplier-query/' . $supplierQuery->id) }}"
                            accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="control-label">{{ 'Name' }}</label>
                                <input class="form-control" name="name" type="text" id="name"
                                    value="{{ isset($supplierQuery->name) ? $supplierQuery->name : ''}}">
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                <label for="email" class="control-label">{{ 'Email' }}</label>
                                <input class="form-control" name="email" type="text" id="email"
                                    value="{{ isset($supplierQuery->email) ? $supplierQuery->email : ''}}">
                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                                <label for="phone" class="control-label">{{ 'Phone' }}</label>
                                <input class="form-control" name="phone" type="text" id="phone"
                                    value="{{ isset($supplierQuery->phone) ? $supplierQuery->phone : ''}}">
                                {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('query_message') ? 'has-error' : ''}}">
                                <label for="query_message" class="control-label">{{ 'Query Message' }}</label>
                                <textarea class="form-control" rows="5" name="query_message" type="textarea"
                                    id="query_message">{{ isset($supplierQuery->query_message) ? $supplierQuery->query_message : ''}}</textarea>
                                {!! $errors->first('query_message', '<p class="help-block">:message</p>') !!}
                            </div>
                            <!-- <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                                <label for="status" class="control-label">{{ 'Status' }}</label>
                                <div class="radio">
                                    <label><input name="status" type="radio" value="1"
                                            {{ (isset($supplierQuery) && 1 == $supplierQuery->status) ? 'checked' : '' }}>
                                        Yes</label>
                                </div>
                                <div class="radio">
                                    <label><input name="status" type="radio" value="0" @if (isset($supplierQuery))
                                            {{ (0 == $supplierQuery->status) ? 'checked' : '' }} @else {{ 'checked' }}
                                            @endif> No</label>
                                </div>
                                {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                            </div> -->
                            <!-- <div class="form-group {{ $errors->has('terms') ? 'has-error' : ''}}">
                                <label for="terms" class="control-label">{{ 'Terms' }}</label>
                                <div class="form-group {{ $errors->has('terms') ? 'has-error' : ''}}">
                                    <label for="terms" class="control-label">{{ 'Terms' }}</label>
                                    <div class="radio">
                                        <label><input name="terms" type="checkbox" value="1" @if($supplierQuery->terms ==
                                            1) checked @endif> No</label>
                                    </div>
                                    {!! $errors->first('terms', '<p class="help-block">:message</p>') !!}
                                </div>
                                {!! $errors->first('terms', '<p class="help-block">:message</p>') !!}
                            </div> -->


                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Update">
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection