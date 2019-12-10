@extends('layouts.front.front_design')
@section('content')
<div id="particles-js"></div> <!-- stats - count particles -->
<!-- <div class="count-particles"> <span class="js-count-particles"></span> particles </div> -->
<div class="page-content ">
    <div class="container text-center">

        <div class="row">
            <div class="col-lg-3 hidden-md hidden-sm hidden-xs"></div>
            <div class="col-lg-3 col-md-12 products"><a href="{{ url('/product/categories') }}">PRODUCTS</a></div>
            <div class="col-lg-3 col-md-12 suppliers"><a href="{{ url('/supplier/categories') }}">SUPPLIERS</a></div>
            <div class="col-lg-3 hidden-md hidden-sm hidden-xs"></div>
        </div>

    </div>
</div>
@endsection