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
                    <div class="card-header">Category #{{ $productcategory->id }} ({{ $productcategory->name }})</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/product-category') }}" title="Back"><button
                                class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back</button></a>
                        <a href="{{ url('/admin/product-category/' . $productcategory->id . '/edit') }}"
                            title="Edit ProductCategory"><button class="btn btn-primary btn-sm"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/product-category' . '/' . $productcategory->id) }}"
                            accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete ProductCategory"
                                onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                    aria-hidden="true"></i> Delete</button>
                        </form>
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $productcategory->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $productcategory->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Description </th>
                                        <td> {{ $productcategory->description }} </td>
                                    </tr>
                                    <tr>
                                        <th> Status </th>
                                        <td>@if($productcategory->status == 1) <label
                                                class="badge badge-success badge-lg badge-pill">Enable</label>
                                            @elseif($productcategory->status == 0) <label
                                                class="badge badge-danger badge-lg badge-pill">Disable</label> @endif
                                        </td>
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