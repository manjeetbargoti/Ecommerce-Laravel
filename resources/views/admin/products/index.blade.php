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
            <div class="col-md-12 m-auto">
                <div class="card">
                    <div class="card-header">Products</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/product/create') }}" class="btn btn-success btn-sm"
                            title="Add New Product">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/product') }}" accept-charset="UTF-8"
                            class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..."
                                    value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Quantity</th>
                                        <!-- <th>Initial Stock</th> -->
                                        <th>Current Stock</th>
                                        <!-- <th>Buying Price</th> -->
                                        <th>Selling Price</th>
                                        <th>Status</th>
                                        <th>Premium</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->product_category }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <!-- <td>{{ $item->initial_stock }}</td> -->
                                        <td>{{ $item->current_stock }}</td>
                                        <!-- <td>{{ $item->buying_price }}</td> -->
                                        <td>{{ $item->selling_price }}</td>
                                        <td>@if($item->status == 1)<i class="fa text-success fa-check-square-o"></i>@elseif($item->status == 0) <i class="fa fa-window-close text-danger"></i> @endif</td>
                                        <td>@if($item->is_premium == 1)<i class="fa text-success fa-check-square-o"></i>@elseif($item->is_premium == 0) <i class="fa fa-window-close text-danger"></i> @endif</td>
                                        <td>
                                            <a href="{{ url('/admin/product/' . $item->id) }}"
                                                title="View Product"><button class="btn btn-info btn-sm"><i
                                                        class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                            <a href="{{ url('/admin/product/' . $item->id . '/edit') }}"
                                                title="Edit Product"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </button></a>

                                            <form method="POST" action="{{ url('/admin/product' . '/' . $item->id) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    title="Delete Product"
                                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $products->appends(['search' =>
                                Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection