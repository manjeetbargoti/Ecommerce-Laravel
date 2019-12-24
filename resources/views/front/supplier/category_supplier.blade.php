@extends('layouts.front.front_design')
@section('content')

@include('front.supplier.partials.category_list')

<div class="space"></div>
<!-- hero area -->
<section class="section grey-bg">
    <div class="container">
        <div class="row">
            <!-- Page Content -->
            <div class="col-lg-3 mb-5">
                <h2 class="my-4">Supplier Categories</h2>
                <div class="list-group">
                    @foreach($suppliercategory as $sc)
                    <a href="{{ url('/category/'.$sc->name.'/suppliers/') }}"
                        class="list-group-item green-txt gry-bg">{{ $sc->name }}</a>
                    @endforeach
                </div>
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-lg-9 all-products">
                <div class="row">

                    @if($supplier_count == 0)
                    <p style="margin: auto;padding-top: 6rem;">Sorry! We have no Supplier in this category.</p>
                    @else
                    @foreach($supplier as $supp)
                    <div class="col-lg-12 col-md-12 mb-4" id="watch1">
                        <div class="card h-100">
                            <a href="#">
                                @if(!empty($supp->image))
                                <!-- <img class="card-img-top" src="{{ asset('images/watch1.png') }}" alt=""> -->
                                @else
                                <!-- <img class="card-img-top" src="{{ asset('images/supplier.png') }}" alt=""> -->
                                @endif
                            </a>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        @if(!empty($supp->image))
                                        <img class="img-responsive" width="200"
                                            src="{{ url('/images/business/large/'.$supp->image) }}"
                                            alt="{{ $supp->business_name }}">
                                        @else
                                        <img class="img-responsive" width="200"
                                            src="{{ asset('/images/business/large/default.png') }}"
                                            alt="{{ $supp->business_name }}">
                                        @endif
                                    </div>
                                    <div class="col-sm-9">
                                        <h5><a href="#" class="text-white">{{ $supp->business_name }}</a></h5>
                                        <p class="card-text mt-2">
                                            {{ $supp->category }}@foreach(\App\Country::where('iso3',$supp->country)->get()
                                            as $count), {{ $count->name }} @endforeach</p>
                                        <p>{{ str_limit(strip_tags($supp->description), $limit=100) }}</p>
                                        <h4 class="card-title">
                                            <a href="" class="green-txt" data-toggle="modal"
                                                data-target="#Supplier{{ $supp->id }}">Get
                                                Inquired</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card-footer gry-bg">
                                    <small class="text-muted green-txt">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div> -->
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="Supplier{{ $supp->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ $supp->business_name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('/category/'.$supp->category.'/suppliers/') }}" method="POST"
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
                                            <input type="text" name="supplier_id" id="SupplierId"
                                                class="form-control mb-2" placeholder="Supplier ID"
                                                value="{{ $supp->id }}">
                                        </div>
                                        <!-- <div class="form-group d-none">
                                            <input type="text" name="product_type" id="ProductType"
                                                class="form-control mb-2" placeholder="Product Type"
                                                value="">
                                        </div> -->
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
                                            I accept <a href="#" data-toggle="modal" style="color: #67d5ae;"
                                                data-target="#TermCondition">Terms and Conditions</a>.
                                        </div>
                                        <div class="form-group">
                                            <button type="reset" class="btn btn-info"
                                                style="background: #67d5ae;border: 1px solid #67d5ae;">Reset</button>
                                            <button type="submit" class="btn btn-info pull-right"
                                                style="background: #67d5ae;border: 1px solid #67d5ae;">Submit
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