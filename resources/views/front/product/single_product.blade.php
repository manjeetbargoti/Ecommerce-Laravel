@extends('layouts.front.front_design')
@section('content')

@include('front.product.partials.category_list')

<div class="space">.</div>

<!-- hero area -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center mb-5 mb-md-0">
                <img class="img-fluid" src="{{ asset('/images/watch.png') }}" alt="">
            </div>
            <div class="col-md-6 align-self-center text-center text-md-left">
                <div class="block">
                    <h1 class="font-weight-bold mb-4 font-size-60">{{ $productData->product_name }}</h1>
                    <p class="mb-4">{{ $productData->product_description }}</p>
                    <a class="btn btn-main" href="" data-toggle="modal" data-target="#Product{{ $productData->id }}"
                        role="button">Get Inquired</a>
                </div>
            </div>
        </div><!-- .row close -->
    </div><!-- .container close -->
</section><!-- header close -->

<section class="section grey-bg">
    <div class="container">
        <div class="row">
            <div class="col-12 m-auto">
                <div class="heading">
                    <h2>Our Core Features</h2>
                </div>
            </div>
            
            <div class="col-sm-6 m-auto">
                <table class="table table-bordered product-info">
                    <tr>
                        <td>Product Name</td>
                        <td>{{ $productData->product_name }}</td>
                    </tr>
                    <tr>
                        <td>Product Code</td>
                        <td>{{ $productData->product_code }}</td>
                    </tr>
                    <tr>
                        <td>Product Category</td>
                        <td>{{ $productData->product_category }}</td>
                    </tr>
                    <tr>
                        <td>Product Price</td>
                        <td>{{ $productData->selling_price }}</td>
                    </tr>
                    <tr>
                        <td>Product Type</td>
                        <td>@if($productData->is_premium == 1) VVV Premium @elseif($productData->is_premium == 0) Basic Product @endif</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{ $productData->product_description }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div><!-- .container close -->
</section><!-- #service close -->

<div class="section"></div>

<!-- Modal -->
<div class="modal fade" id="Product{{ $productData->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $productData->product_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/category/'.$productData->product_category.'/product/'.$productData->id) }}"
                    method="POST" class="EnquiryForm">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" id="FullName" class="form-control mb-2" placeholder="Full Name"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="EmailAddress" class="form-control mb-2"
                            placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" id="PhoneNumber" class="form-control mb-2"
                            placeholder="Phone number" required>
                    </div>
                    <div class="form-group d-none">
                        <input type="text" name="product_id" id="ProductId" class="form-control mb-2"
                            placeholder="Product ID" value="{{ $productData->id }}">
                    </div>
                    <div class="form-group d-none">
                        <input type="text" name="product_type" id="ProductType" class="form-control mb-2"
                            placeholder="Product Type" value="{{ $productData->is_premium }}">
                    </div>
                    <div class="form-group">
                        <textarea name="location" id="Location" cols="30" rows="2" class="form-control"
                            placeholder="Location" required></textarea>
                    </div>
                    <div class="form-group">
                        <textarea name="query_message" id="QueryMessage" cols="30" rows="5" class="form-control"
                            placeholder="Query..." required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="Terms" class="mb-2" value="1" required>
                        I accept <a href="#">Terms and Conditions</a>.
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-warning" data-dismiss="modal">Reset</button>
                        <button type="submit" class="btn btn-primary pull-right">Submit
                            Query</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection