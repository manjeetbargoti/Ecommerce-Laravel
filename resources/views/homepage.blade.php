@extends('layouts.front.front_design')
@section('content')
<div class="page-content ">
    <div class="container text-center">

        <div class="row">
            <div class="col-lg-3 hidden-md hidden-sm hidden-xs"></div>
            <div class="col-lg-3 col-md-12 products"><a href="{{ url('/product/categories') }}">PRODUCTS</a></div>
            <div class="col-lg-3 col-md-12 suppliers"><a href="{{ url('/suppliers') }}">SUPPLIERS</a></div>
            <div class="col-lg-3 hidden-md hidden-sm hidden-xs"></div>
        </div>

    </div>
</div>
@endsection