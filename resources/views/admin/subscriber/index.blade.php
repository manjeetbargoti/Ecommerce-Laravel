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
                    <div class="card-header">Subscribers</div>
                    <div class="card-body">
                        <!-- <a href="{{ url('/admin/support/product-query/create') }}" class="btn btn-success btn-sm"
                            title="Add New ProductQuery">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a> -->

                        <form method="GET" action="{{ url('/admin/support/subscribers') }}" accept-charset="UTF-8"
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
                                        <!-- <th>Name</th> -->
                                        <th>Email</th>
                                        <!-- <th>Phone</th> -->
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subscriber as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <!-- <td>{{ $item->name }}</td> -->
                                        <td>{{ $item->email }}</td>
                                        <!-- <td>{{ $item->phone }}</td> -->

                                        <td>
                                            <a href="{{ url('/admin/support/subscribers/' . $item->id) }}"
                                                title="View Subscriber"><button class="btn btn-info btn-sm"><i
                                                        class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                            <a href="{{ url('/admin/support/subscribers/' . $item->id . '/edit') }}"
                                                title="Edit Subscriber"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button></a>

                                            <form method="POST"
                                                action="{{ url('/admin/support/subscribers' . '/' . $item->id) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Subscriber"
                                                    onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o"
                                                        aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection