@extends('layouts.panel.panel_design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Support Center
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
                    <div class="card-header">Product Query</div>
                    <div class="card-body">
                        <!-- <a href="{{ url('/admin/support/product-query/create') }}" class="btn btn-success btn-sm"
                            title="Add New ProductQuery">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a> -->

                        <form method="GET" action="{{ url('/admin/support/product-query') }}" accept-charset="UTF-8"
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Product</th>
                                        <th>Product Type</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productquery as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        @foreach(\App\Product::where('id', $item->product_id)->get() as $prod)
                                        <td>{{ $prod->product_name }}</td>
                                        @endforeach
                                        <td>@if($item->product_type == 1)<label class="badge badge-success">VVIP</label>@elseif($item->product_type == 0) <label class="badge badge-info">Basic</label> @endif</td>
                                        <td>@if($item->status == 1)<label class="badge badge-success">Done</label>@elseif($item->status == 0) <label class="badge badge-danger">Pending</label> @endif</td>
                                        <td>
                                            <a href="{{ url('/admin/product-query/' . $item->id) }}"
                                                title="View Query"><button class="btn btn-info btn-sm"><i
                                                        class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                            <a href="{{ url('/admin/product-query/' . $item->id . '/edit') }}"
                                                title="Edit Query"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </button></a>

                                            <form method="POST"
                                                action="{{ url('/admin/product-query' . '/' . $item->id) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    title="Delete Query"
                                                    onclick="return confirm('Confirm delete?')"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>

                                            <a href="{{ url('/admin/send-email/' . $item->id) }}"
                                                title="Send Email"><button class="btn btn-info btn-sm"><i
                                                        class="fa fa-envelope" aria-hidden="true"></i> </button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $productquery->appends(['search' =>
                                Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection