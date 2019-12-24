@extends('layouts.panel.panel_design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Sellers
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Product Seller #{{ $productvendor->id }} ({{ $productvendor->first_name }} {{ $productvendor->last_name }})</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/product-vendor') }}" title="Back"><button
                                class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back</button></a>
                        <a href="{{ url('/admin/product-vendor/' . $productvendor->id . '/edit') }}"
                            title="Edit ProductVendor"><button class="btn btn-primary btn-sm"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/productvendor' . '/' . $productvendor->id) }}"
                            accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete ProductVendor"
                                onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o"
                                    aria-hidden="true"></i> Delete</button>
                        </form>
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $productvendor->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $productvendor->title }} {{ $productvendor->first_name }} {{ $productvendor->last_name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Phone </th>
                                        <td> {{ $productvendor->phone }} </td>
                                    </tr>
                                    <tr>
                                        <th> Email </th>
                                        <td> {{ $productvendor->email }} </td>
                                    </tr>
                                    <tr>
                                        <th> Role </th>
                                        <td> {{ implode(', ', $productvendor->getRoleNames()->toArray()) }} </td>
                                    </tr>
                                    <tr>
                                        <th> Business Name </th>
                                        <td> {{ $supplierData->business_name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Category </th>
                                        <td> <label class="badge badge-info badge-lg badge-pill text-20"> {{ $supplierData->category }} </label></td>
                                    </tr>
                                    <tr>
                                        <th> Status </th>
                                        <td> @if($productvendor->status == 1) <label
                                                class="badge badge-success badge-lg badge-pill">Enable</label>
                                            @elseif($productvendor->status == 0) <label
                                                class="badge badge-danger badge-lg badge-pill">Disable</label> @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Created on </th>
                                        <td> {{ date('d M, Y (h:i:s A)', strtotime($productvendor->created_at)) }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection