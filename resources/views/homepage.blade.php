@extends('layouts.front.front_design')
@section('content')
<div id="particles-js"></div> <!-- stats - count particles -->
<!-- <div class="count-particles"> <span class="js-count-particles"></span> particles </div> -->
<div class="container">
<!-- <h2 class="vvvLux-typed" style="position:relative;text-align:center;top:7em;left:4em;color:#fff;font-family: 'Roboto';"></h2>
<h3 class="vvvLux-typed2" style="position:fixed;top:4em;color:#fff;left:5em;font-size:40px;font-family: 'Pinyon Script', cursive;margin:auto;"></h3> -->
</div>
<div class="page-content" style="margin: 12% 0 0 !important;">
    <div class="container text-center">
        <div class="row" style="padding-bottom: 3em;">
            <div class="col-lg-3 hidden-md hidden-sm hidden-xs"></div>
            <div class="col-lg-3 col-md-12 products"><a href="{{ url('/product/categories') }}">PRODUCTS</a></div>
            <div class="col-lg-3 col-md-12 suppliers"><a href="{{ url('/supplier/categories') }}">SUPPLIERS</a></div>
            <div class="col-lg-3 hidden-md hidden-sm hidden-xs"></div>
        </div>
        <div class="row">
        <div class="col-lg-12 col-md-12" style="text-align: center;"><a><img width="400" class="img-responsive" src="{{ url('/images/vvv.png') }}" alt="{{ config('app.name') }}"></a></div>
        </div>
    </div>
</div>
<div class="container">
<!-- <h2 class="vvvLux-typed3" style="position:relative;text-align:center;top:7em;left:4em;color:#fff;font-family: 'Roboto';"></h2>
<h3 class="vvvLux-typed4" style="position:fixed;top:4em;color:#fff;left:5em;font-size:40px;font-family: 'Pinyon Script', cursive;margin:auto;"></h3> -->
</div>
@endsection