@extends('layouts.front.front_design')
@section('content')

@include('front.product.partials.category_list')

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
                    <a href="{{ url('/category/'.$pcat->name.'/products/') }}" class="list-group-item green-txt gry-bg">{{ $pcat->name }}</a>
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
                            <a href="#"><img class="card-img-top" src="{{ asset('images/watch1.png') }}" alt=""></a>
                            <div class="card-body">
                                <h5 class="text-white">{{ $prod->product_name }}</h5>
                                <p class="card-text mt-2">{{ str_limit($prod->product_description, $limit=100) }}</p>
                                <h4 class="card-title">
                                    <a href="#" class="green-txt">Get Inquired</a>
                                </h4>
                            </div>
                            <!-- <div class="card-footer gry-bg">
                                <small class="text-muted green-txt">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                            </div> -->
                        </div>
                    </div>
                    @endforeach
                    @endif
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