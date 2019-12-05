@extends('layouts.panel.panel_design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Users
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <!-- User infromation -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ $user->first_name }} {{ $user->last_name }}
                        ({{ implode(', ', $user->getRoleNames()->toArray()) }})</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/user') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/user/' . $user->id . '/edit') }}" title="Edit user"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>
                        {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['admin/user', $user->id],
                        'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-sm',
                        'title' => 'Delete user',
                        'onclick'=>'return confirm("Confirm delete?")'
                        ))!!}
                        {!! Form::close() !!}
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td>{{ $user->title }} {{ $user->first_name }} {{ $user->last_name }}
                                            ({{ $user->username }})</td>
                                    </tr>
                                    <tr>
                                        <th> Phone </th>
                                        <td> {{ $user->phone }} </td>
                                    </tr>
                                    <tr>
                                        <th> Email </th>
                                        <td> {{ $user->email }} </td>
                                    </tr>
                                    <tr>
                                        <th> Role </th>
                                        <td> {{ implode(', ', $user->getRoleNames()->toArray()) }} </td>
                                    </tr>
                                    @if($roleName == "Supplier" || $roleName == "Vendor")
                                    <tr>
                                        <th> Business Name </th>
                                        <td>@if(!empty($supplierData->business_name)) {{ $supplierData->business_name }}
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <th> Category </th>
                                        <td>@if(!empty($supplierData->category)) <label
                                                class="badge badge-success badge-lg">{{ $supplierData->category }}
                                                @endif</label> </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th> Status </th>
                                        <td>@if($user->status == 1) <label
                                                class="badge badge-success badge-lg">Enable</label>@elseif($user->status
                                            == 0)<label class="badge badge-danger badge-lg">Disable</label> @endif </td>
                                    </tr>
                                    <tr>
                                        <th> Created on </th>
                                        <td> {{ date('d M, Y (h:i:s A)', strtotime($user->created_at)) }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /. User information -->

            <!-- User Order info -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Orders info for <u>{{ $user->first_name }} {{ $user->last_name }}
                        ({{ implode(', ', $user->getRoleNames()->toArray()) }})</u></div>
                    <div class="card-body">

                        <a href="{{ url('/admin/user') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/user/' . $user->id . '/edit') }}" title="Edit user"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>
                        {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['admin/user', $user->id],
                        'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-sm',
                        'title' => 'Delete user',
                        'onclick'=>'return confirm("Confirm delete?")'
                        ))!!}
                        {!! Form::close() !!}
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td>{{ $user->title }} {{ $user->first_name }} {{ $user->last_name }}
                                            ({{ $user->username }})</td>
                                    </tr>
                                    <tr>
                                        <th> Phone </th>
                                        <td> {{ $user->phone }} </td>
                                    </tr>
                                    <tr>
                                        <th> Email </th>
                                        <td> {{ $user->email }} </td>
                                    </tr>
                                    <tr>
                                        <th> Role </th>
                                        <td> {{ implode(', ', $user->getRoleNames()->toArray()) }} </td>
                                    </tr>
                                    @if($roleName == "Supplier" || $roleName == "Vendor")
                                    <tr>
                                        <th> Business Name </th>
                                        <td>@if(!empty($supplierData->business_name)) {{ $supplierData->business_name }}
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <th> Category </th>
                                        <td>@if(!empty($supplierData->category)) <label
                                                class="badge badge-success badge-lg">{{ $supplierData->category }}
                                                @endif</label> </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th> Status </th>
                                        <td>@if($user->status == 1) <label
                                                class="badge badge-success badge-lg">Enable</label>@elseif($user->status
                                            == 0)<label class="badge badge-danger badge-lg">Disable</label> @endif </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /. User Order info -->
        </div>
    </div>
</div>
@endsection