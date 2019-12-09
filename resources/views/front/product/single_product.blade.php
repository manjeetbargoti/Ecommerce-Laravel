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
                    <a class="btn btn-main" href="#" role="button">Get Inquired</a>
                </div>
            </div>
        </div><!-- .row close -->
    </div><!-- .container close -->
</section><!-- header close -->

<section class="section grey-bg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading">
                    <h2>Our Core Features</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-40 text-center text-md-left">
                    <i class="d-inlin-block h2 mb-10 tf-ion-ios-alarm-outline"></i>
                    <h4 class="font-weight-bold mb-2">Smooth Touch</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, inventore?</p>
                </div>
                <div class="mb-40 text-center text-md-left">
                    <i class="d-inlin-block h2 mb-10 tf-ion-ios-bell-outline"></i>
                    <h4 class="font-weight-bold mb-2">Elegant Design</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, inventore?</p>
                </div>
                <div class="mb-40 text-center text-md-left">
                    <i class="d-inlin-block h2 mb-10 tf-ion-ios-cart-outline"></i>
                    <h4 class="font-weight-bold mb-2">Easy Pricing</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, inventore?</p>
                </div>
            </div>
            <div class="col-md-4 text-center align-self-center mb-4 mb-md-0">
                <img class="img-fluid" src="{{ asset('/images/watch-2.png') }}" alt="">
            </div>
            <div class="col-md-4">
                <div class="mb-40 text-center text-md-left">
                    <i class="d-inlin-block h2 mb-10 tf-ion-ios-alarm-outline"></i>
                    <h4 class="font-weight-bold mb-2">Smooth Touch</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, inventore?</p>
                </div>
                <div class="mb-40 text-center text-md-left">
                    <i class="d-inlin-block h2 mb-10 tf-ion-ios-bell-outline"></i>
                    <h4 class="font-weight-bold mb-2">Elegant Design</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, inventore?</p>
                </div>
                <div class="mb-40 text-center text-md-left">
                    <i class="d-inlin-block h2 mb-10 tf-ion-ios-cart-outline"></i>
                    <h4 class="font-weight-bold mb-2">Easy Pricing</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, inventore?</p>
                </div>
            </div>
        </div>
    </div><!-- .container close -->
</section><!-- #service close -->

<div class="section"></div>

@endsection