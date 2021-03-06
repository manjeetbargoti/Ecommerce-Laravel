@extends('layouts.panel.panel_design')

@section('content')
<style>
.product_image_upload .fileinput-upload-button {
    display: none;
}

#filediv {
    display: inline-block !important;
}

#file {
    color: green;
    padding: 5px;
    border: 1px dashed #123456;
    background-color: #f9ffe5
}

#noerror {
    color: green;
    text-align: left
}

#error {
    color: red;
    text-align: left
}

#img {
    width: 17px;
    border: none;
    height: 17px;
    margin-left: 10px;
    cursor: pointer;
}

.abcd img {
    height: 100px;
    width: 100px;
    padding: 5px;
    border-radius: 10px;
    border: 1px solid #e8debd
}

#close {
    vertical-align: top;
    background-color: red;
    color: white;
    border-radius: 5px;
    padding: 4px;
    margin-left: -13px;
    margin-top: 1px;
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
                <div class="card">
                    <div class="card-header">Edit Product #{{ $product->id }} ({{ $product->product_name }})</div>
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

                        <form method="POST" action="{{ url('/admin/product/' . $product->id) }}" method="POST"
                            accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input name="_method" type="hidden" value="PATCH">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="product_category" class="control-label">{{ 'Product Category' }}</label>
                                    <select name="product_category" class="form-control" id="product_category">
                                        <option value=""> -- Select Category -- </option>
                                        @foreach($productCategory as $pcat)
                                        <option value="{{ $pcat->name }}" @if($product->product_category == $pcat->name)
                                            selected @endif>{{ $pcat->name }}</option>
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
                                        value="{{ isset($product->product_slug) ? $product->product_slug : ''}}">
                                    {!! $errors->first('product_slug', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-sm-6">
                                    <label for="Vendor" class="control-label">{{ 'Vendor' }}</label>
                                    <select name="vendor" class="form-control" id="vendor">
                                        <option value=""> -- Select Vendor -- </option>
                                        @foreach($productVendor as $pvend)
                                        <option value="{{ $pvend->name }}" @if($product->vendor == $pvend->name)
                                            selected
                                            @endif>{{ $pvend->name }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('vendor', '<p class="help-block">:message</p>') !!}
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
                                    <label for="Buying Price" class="control-label">{{ 'Buying Price' }}</label>
                                    <input class="form-control" name="buying_price" type="text" id="buying_price"
                                        value="{{ isset($product->buying_price) ? $product->buying_price : ''}}">
                                    {!! $errors->first('buying_price', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-sm-4 col-12">
                                    <label for="Selling Price" class="control-label">{{ 'Selling Price' }}</label>
                                    <input class="form-control" name="selling_price" type="text" id="selling_price"
                                        value="{{ isset($product->selling_price) ? $product->selling_price : ''}}">
                                    {!! $errors->first('selling_price', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-sm-4 col-12">
                                    <label for="Product Status" class="control-label">{{ 'Product Status' }}</label>
                                    <select name="status" class="form-control" id="ProductStatus">
                                        <option value="1" @if($product->status == '1') selected @endif>Enable</option>
                                        <option value="0" @if($product->status == '0') selected @endif>Disable</option>
                                    </select>
                                    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4 col-12">
                                    <label for="is Premium" class="control-label">{{ 'is Premium' }}</label>
                                    <select name="is_premium" class="form-control" id="IsPremium">
                                        <option value="1" @if($product->is_premium == '1') selected @endif>Yes</option>
                                        <option value="0" @if($product->is_premium == '0') selected @endif>No</option>
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
                                    <!-- <input id="input-f" name="product_image[]" accept="image/*" type="file" accept="image/*" multiple> -->
                                    <div class="add_image">
                                        <input type="button" id="add_more" class="btn btn-info" value="add image" />
                                        <!-- <i class="fas fa-camera"></i> -->
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row filediv">
                                <div id="abcd1" class="abcd">
                                    @foreach(\App\ProductImage::where('product_id', $product->id)->get() as $pimg)
                                    <img class="img-responsive" width="100"
                                        src="{{ asset('/images/product/large/'.$pimg->image_name) }}"
                                        alt="{{ $product->name }}" style="padding: 0 0.1em;">
                                    <a href="{{ url('/admin/product/' . $pimg->id . '/delete-image') }}"><i id="close" alt="delete" class="fa fa-close"></i></a>
                                    @endforeach
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <div class="col-sm-12 col-12 product_image_upload">
                                    <label for="Product Description" class="control-label">{{ 'File Upload' }}</label>
                                    <input id="input-fa" name="product_image[]" accept="image/*" type="file"
                                        class="file-loading" accept="image/*" multiple>
                                </div>
                            </div> -->

                            <hr>

                            <div class="form-group">
                                <input class="btn btn-warning pull-left" type="reset" value="Reset">
                                <input class="btn btn-primary pull-right" type="submit" value="Update Product">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection