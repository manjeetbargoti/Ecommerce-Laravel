@extends('layouts.front.front_design')
@section('content')

<div id="particles-js"></div>
<div class="" style="position: relative;">
    <div class="product-page-heading ">
        <div class="menu-destination-prehome">
            <ul class="list-unstyled text-center product-supplier">
                <li class="active">
                    <div style="display: block;"><a class="" href="{{ url('/product/categories') }}">PRODUCTS</a></div>
                </li>
                <li class="">
                    <div style="display: block;"><a class="" href="{{ url('/supplier/categories') }}">SUPPLIERS</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="product-page-content">
        <div class="menu-destination-prehome">
            <ul class="list-unstyled text-center">
                @foreach($productcategory as $pcat)
                <li class="{{ (request()->is('category/'.$pcat->name.'/*')) ? 'active':'' }}">
                    <span style="display: block;"><a class=""
                            href="{{ url('/category/'.$pcat->name.'/products/') }}">{{ $pcat->name }}</a></span>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="menu-destination-prehome" style="padding-top: 7em;">
            <ul class="list-unstyled text-center">
                <li class="">
                    <span style="display: block;"><a class="" href="{{ url('/vvv-lux/products/') }}"
                            style="font-size: 3em !important;">VVV LUXURY</a></span>
                </li>
            </ul>
        </div>
        <div class="space2"></div>
    </div>
</div>


<div class="space"></div>
<!-- hero area -->
<section class="section grey-bg">
    <div class="container">
        <div class="row">
            <!-- Page Content -->
            <div class="col-lg-3 mb-5">
                <h2 class="my-4">Product Categories</h2>
                <div class="list-group">
                    @foreach($productcategory as $pcat)
                    <a href="{{ url('/category/'.$pcat->name.'/products/') }}"
                        class="list-group-item green-txt gry-bg">{{ $pcat->name }}</a>
                    @endforeach
                </div>
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-lg-9 all-products">
                <div class="row">

                    @if($products->count() == 0)
                    <p style="margin: auto;padding-top: 6rem;">Sorry! We have no product in this category.</p>
                    @else
                    @foreach($products as $prod)
                    <div class="col-lg-4 col-md-6 mb-4" id="watch1">
                        <div class="card h-100">
                            <a href="{{ url('/category/'.$prod->product_category.'/product/'.$prod->id) }}"><img
                                    class="card-img-top @if($prod->is_premium == 1) blur-img @endif"
                                    src="{{ asset('images/watch1.png') }}" alt=""></a>
                            <div class="card-body">
                                <h5><a href="{{ url('/category/'.$prod->product_category.'/product/'.$prod->id) }}"
                                        class="text-white">{{ $prod->product_name }}</a></h5>
                                <p class="card-text mt-2">{{ str_limit($prod->product_description, $limit=100) }}</p>
                                <h4 class="card-title">
                                @if(Auth::check())
                                    @if($prod->is_premium == 1)
                                    <a href="" class="green-txt" data-toggle="modal"
                                        data-target="#Product{{ $prod->id }}">Get
                                        Inquired</a>
                                    @elseif($prod->is_premium == 0)
                                    <a href="{{ url('/category/'.$prod->product_category.'/product/'.$prod->id) }}"
                                        class="green-txt">More Info</a>
                                    @endif
                                @else
                                <a href="{{ route('login') }}" class="green-txt">Get
                                        Inquired</a>
                                @endif
                                </h4>
                            </div>
                            <!-- <div class="card-footer gry-bg">
                                    <small class="text-muted green-txt">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div> -->
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="Product{{ $prod->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ $prod->product_name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('/category/'.$pcat->name.'/products/') }}" method="POST"
                                        class="EnquiryForm">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name" id="FullName" class="form-control mb-2"
                                                placeholder="Full Name" required>
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
                                            <input type="text" name="product_id" id="ProductId"
                                                class="form-control mb-2" placeholder="Product ID"
                                                value="{{ $prod->id }}">
                                        </div>
                                        <div class="form-group d-none">
                                            <input type="text" name="product_type" id="ProductType"
                                                class="form-control mb-2" placeholder="Product Type"
                                                value="{{ $prod->is_premium }}">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="location" id="Location" cols="30" rows="2"
                                                class="form-control" placeholder="Location" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="query_message" id="QueryMessage" cols="30" rows="5"
                                                class="form-control" placeholder="Query..." required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="terms" id="Terms" class="mb-2" value="1"
                                                required>
                                            I accept <a href="#" data-toggle="modal" data-target="#TermCondition" style="color: #67d5ae;">Terms and Conditions</a>.
                                        </div>
                                        <div class="form-group">
                                            <button type="reset" class="btn btn-info" style="background: #67d5ae;border: 1px solid #67d5ae;">Reset</button>
                                            <button type="submit" class="btn btn-info pull-right" style="background: #67d5ae;border: 1px solid #67d5ae;">Submit
                                                Query</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    @endif
                    <!-- <h3 class="m-auto">Please <a href="{{ route('login') }}" style="color: #67d5ae;font-size:20px !important;">Login/Register</a> to check our products.</h3> -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.col-lg-9 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section><!-- header close -->
<div class="section"></div>

@endsection