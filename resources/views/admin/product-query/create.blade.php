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
                    <div class="card-header">Create New Product Query</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/support/product-query') }}" title="Back"><button
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

                        <form method="POST" action="{{ url('/admin/support/product-query') }}" accept-charset="UTF-8"
                            class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <!-- Name field -->
                            <div class="form-group row">
                                <div class="col-sm-4 text-xl-right">
                                    <label for="name" class="control-label">{{ 'Name' }}</label>
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="name" type="text" id="name"
                                        value="{{ isset($productquery->name) ? $productquery->name : ''}}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <!-- /. Name field -->

                            <!-- Email address -->
                            <div class="form-group row">
                                <div class="col-sm-4 text-xl-right">
                                    <label for="email" class="control-label">{{ 'Email' }}</label>
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="email" type="text" id="email"
                                        value="{{ isset($productquery->email) ? $productquery->email : ''}}">
                                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <!-- /. Email address -->

                            <!-- Phone number -->
                            <div class="form-group row">
                                <div class="col-sm-4 text-xl-right">
                                    <label for="phone" class="control-label">{{ 'Phone' }}</label>
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="phone" type="text" id="phone"
                                        value="{{ isset($productquery->phone) ? $productquery->phone : ''}}">
                                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <!-- /. Phone number -->

                            <!-- Query message -->
                            <div class="form-group row">
                                <div class="col-sm-4 text-xl-right">
                                    <label for="query_message" class="control-label">{{ 'Query Message' }}</label>
                                </div>
                                <div class="col-sm-4">
                                    <textarea class="form-control" rows="5" name="query_message" type="textarea"
                                        id="query_message">{{ isset($productquery->query_message) ? $productquery->query_message : ''}}</textarea>
                                    {!! $errors->first('query_message', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <!-- /. Query message -->

                            <!-- Product id (Query for) -->
                            <div class="form-group row">
                                <div class="col-sm-4 text-xl-right">
                                    <label for="product_id" class="control-label">{{ 'Product Id' }}</label>
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="product_id" type="text" id="product_id"
                                        value="{{ isset($productquery->product_id) ? $productquery->product_id : ''}}">
                                    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <!-- /. Product id (Query for) -->

                            <!-- Product type (is Premium) -->
                            <div class="form-group row">
                                <div class="col-sm-4 text-xl-right">
                                    <label for="product_type" class="control-label">{{ 'Product Type' }}</label>
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="product_type" type="text" id="product_type"
                                        value="{{ isset($productquery->product_type) ? $productquery->product_type : ''}}">
                                    {!! $errors->first('product_type', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <!-- /. Product type (is Premium) -->

                            <!-- Product Query Status -->
                            <div class="form-group row">
                                <div class="col-sm-4 text-xl-right">
                                    <label for="status" class="control-label">{{ 'Status' }}</label>
                                </div>
                                <div class="col-sm-4">
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Enable</option>
                                        <option value="0">Disable</option>
                                    </select>
                                    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <!-- /. Product Query Status -->

                            <!-- Accept Terms & COnditions -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Terms & Condition" class="col-form-label"></label>
                                </div>

                                <div class="col-xl-4">
                                    <div class="checkbox">
                                        <label class="text-primary">
                                            <input type="checkbox" name="terms" id="terms" value="1">
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            I agree with the <a href="#">Terms and Conditions</a>.
                                        </label>
                                    </div>
                                    {!! $errors->first('terms', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <!-- /. Accept Terms & COnditions -->


                            <div class="form-actions form-group row">
                                <div class="col-sm-4 m-auto">
                                    <input class="btn btn-warning pull-left" type="reset" value="Reset">
                                    <input class="btn btn-primary pull-right" type="submit" value="Add Query">
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