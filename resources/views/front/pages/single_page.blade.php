@extends('layouts.front.front_design')
@section('content')

<div class="product-page-heading">
    <div class="container">
    <h2>{{ $pageData->name }}</h2>
    <div class="page_content" style="padding-top: 2em;">
        {!! $pageData->content !!}
    </div>
    </div>
</div>

@endsection