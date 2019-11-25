@extends('layouts.panel.panel_design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Products
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-9 m-auto">
                <div class="card">
                    <div class="card-header">Product {{ $product->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/product') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/product/' . $product->id . '/edit') }}" title="Edit Product"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>

                        <form method="POST" action="{{ url('admin/product' . '/' . $product->id) }}"
                            accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Product"
                                onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                    aria-hidden="true"></i> Delete</button>
                        </form>
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $product->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Product Name </th>
                                        <td> {{ $product->product_name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Product Category </th>
                                        <td> {{ $product->product_category }} </td>
                                    </tr>
                                    <tr>
                                        <th> Vendor </th>
                                        <td> {{ $product->vendor }} </td>
                                    </tr>
                                    <tr>
                                        <th> Quantity </th>
                                        <td> {{ $product->quantity }} </td>
                                    </tr>
                                    <tr>
                                        <th> Initial Stock </th>
                                        <td> {{ $product->initial_stock }} </td>
                                    </tr>
                                    <tr>
                                        <th> Current Stock </th>
                                        <td> {{ $product->current_stock }} </td>
                                    </tr>
                                    <tr>
                                        <th> Buying Price </th>
                                        <td> {{ $product->buying_price }} </td>
                                    </tr>
                                    <tr>
                                        <th> Selling Price </th>
                                        <td> {{ $product->selling_price }} </td>
                                    </tr>
                                    <tr>
                                        <th> Add By </th>
                                        <td> {{ $user->first_name }} {{ $user->last_name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Status </th>
                                        <td> @if($product->status == 1) <label
                                                class="badge badge-success badge-lg badge-pill">Enable</label>
                                            @elseif($product->status == 0) <label
                                                class="badge badge-danger badge-lg badge-pill">Disable</label> @endif </td>
                                    </tr>
                                    <tr>
                                        <th> Product Description </th>
                                        <td> {{ $product->product_description }} </td>
                                    </tr>
                                    <tr>
                                        <th> Created on </th>
                                        <td> {{ date('d M, Y (h:i:s A)', strtotime($product->created_at)) }} </td>
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