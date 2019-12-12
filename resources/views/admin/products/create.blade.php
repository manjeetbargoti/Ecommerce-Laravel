@extends('layouts.panel.panel_design')

@section('content')
<style>
.product_image_upload .fileinput-upload-button {
    display: none;
}
</style>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Products
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-9 m-auto">
                <div class="card file_input">
                    <div class="card-header">Create New Product</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/product') }}" title="Back"><button class="btn btn-warning btn-sm"><i
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

                        <form method="POST" action="{{ url('/admin/product') }}" accept-charset="UTF-8"
                            class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="product_category" class="control-label">{{ 'Product Category' }}</label>
                                    <select name="product_category" class="form-control" id="product_category">
                                        <option value=""> -- Select Category -- </option>
                                        @foreach($productCategory as $pcat)
                                        <option value="{{ $pcat->name }}">{{ $pcat->name }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('product_category', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-sm-6 col-12">
                                    <label for="product_name" class="control-label">{{ 'Product Name' }}</label>
                                    <input class="form-control" name="product_name" type="text" id="product_name"
                                        value="{{ isset($product->product_name) ? $product->product_name : ''}}">
                                    {!! $errors->first('product_name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 col-12">
                                    <label for="product_slug" class="control-label">{{ 'Product Url' }}</label>
                                    <input class="form-control" name="product_slug" type="text" id="slug"
                                        value="{{ old('product_slug') }}">
                                    {!! $errors->first('product_slug', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-sm-6">
                                    <label for="product_category" class="control-label">{{ 'Vendor' }}</label>
                                    <select name="vendor" class="form-control" id="vendor">
                                        <option value=""> -- Select Vendor -- </option>
                                        @foreach($productVendor as $pvend)
                                        <option value="{{ $pvend->name }}">{{ $pvend->name }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('product_category', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4 col-12">
                                    <label for="Quantity" class="control-label">{{ 'Quantity' }}</label>
                                    <input class="form-control" name="quantity" type="text" id="quantity"
                                        value="{{ isset($product->quantity) ? $product->quantity : ''}}">
                                    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-sm-4 col-12">
                                    <label for="Initial Stock" class="control-label">{{ 'Initial Stock' }}</label>
                                    <input class="form-control" name="initial_stock" type="text" id="initial_stock"
                                        value="{{ isset($product->initial_stock) ? $product->initial_stock : ''}}">
                                    {!! $errors->first('initial_stock', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-sm-4 col-12">
                                    <label for="Current Stock" class="control-label">{{ 'Current Stock' }}</label>
                                    <input class="form-control" name="current_stock" type="text" id="current_stock"
                                        value="{{ isset($product->current_stock) ? $product->current_stock : ''}}">
                                    {!! $errors->first('current_stock', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4 col-12">
                                    <label for="Buying Price" class="control-label">{{ 'Original Price' }}</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"> $ </span>
                                        <input class="form-control" name="buying_price" type="text" id="buying_price"
                                            value="{{ isset($product->buying_price) ? $product->buying_price : ''}}">
                                    </div>
                                    {!! $errors->first('buying_price', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-sm-4 col-12">
                                    <label for="Selling Price" class="control-label">{{ 'Selling Price' }}</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"> $ </span>
                                        <input class="form-control" name="selling_price" type="text" id="selling_price"
                                            value="{{ isset($product->selling_price) ? $product->selling_price : ''}}">
                                    </div>
                                    {!! $errors->first('selling_price', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-sm-4 col-12">
                                    <label for="Product Status" class="control-label">{{ 'Product Status' }}</label>
                                    <select name="status" class="form-control" id="ProductStatus">
                                        <option value="1">Enable</option>
                                        <option value="0">Disable</option>
                                    </select>
                                    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4 col-12">
                                    <label for="is Premium" class="control-label">{{ 'is VVV' }}</label>
                                    <select name="is_premium" class="form-control" id="IsPremium">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    {!! $errors->first('is_premium', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 col-12">
                                    <label for="Product Description"
                                        class="control-label">{{ 'Product Description' }}</label>
                                    <textarea class="form-control" name="product_description" rows="5"
                                        id="product_description">{{ isset($product->product_description) ? $product->product_description : ''}}</textarea>
                                    {!! $errors->first('product_description', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 col-12 product_image_upload">
                                    <label for="Product Description" class="control-label">{{ 'File Upload' }}</label>
                                    <input id="input-fa" name="product_image[]" accept="image/*" type="file"
                                        class="file-loading" accept="image/*" multiple>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <input class="btn btn-warning pull-left" type="reset" value="Reset">
                                <input class="btn btn-primary pull-right" type="submit" value="Add Product">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection