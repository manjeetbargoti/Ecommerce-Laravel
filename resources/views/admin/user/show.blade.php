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
                        <form method="POST" action="{{ url('/admin/user' . '/' . $user->id) }}" accept-charset="UTF-8"
                            style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete User"
                                onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o"
                                    aria-hidden="true"></i> </button>
                        </form>
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <div class="m-auto" style="padding: 0.2em 0;">
                                        @if(!empty($user->image))<img
                                            src="{{ url('/images/user/large/'.$user->image) }}" width="100"
                                            class="img-responsive img-circle"
                                            alt="{{ $user->first_name }} {{ $user->last_name }}">@else
                                        <img src="{{ url('/images/user/user.png') }}" width="100"
                                            class="img-responsive img-circle"
                                            alt="{{ $user->first_name }} {{ $user->last_name }}">@endif

                                    </div>
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

                                    <tr>
                                        <th> Status </th>
                                        <td>@if($user->status == 1) <label
                                                class="badge badge-success badge-lg">Enable</label>@elseif($user->status
                                            == 0)<label class="badge badge-danger badge-lg">Disable</label> @endif </td>
                                    </tr>
                                    <tr>
                                        <th> Country </th>
                                        <td>@foreach(\App\Country::where('iso3',$user->country)->get() as $cont)
                                            {{ $cont->name }} @endforeach</td>
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

            @if($roleName == 'Supplier' || $roleName == 'Seller')
            <!-- User infromation -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Business info</div>
                    <div class="card-body">
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Business Name</th>
                                        <td>@if(!empty($supplierData->business_name)) {{ $supplierData->business_name }}
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <th> Category </th>
                                        <td>@if(!empty($supplierData->category)) {{ $supplierData->category }}
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <th> License Number </th>
                                        <td> @if(!empty($supplierData->license_number))
                                            {{ $supplierData->license_number }}
                                            @endif </td>
                                    </tr>
                                    <tr>
                                        <th> Website </th>
                                        <td> @if(!empty($supplierData->website)) {{ $supplierData->website }}
                                            @endif </td>
                                    </tr>
                                    <tr>
                                        <th> Country </th>
                                        <td>@foreach(\App\Country::where('iso3',$supplierData->country)->get() as $cont)
                                            {{ $cont->name }} @endforeach</td>
                                    </tr>
                                    <tr>
                                        <th> State </th>
                                        <td>@if(!empty($supplierData->state)) {{ $supplierData->state }}
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <th> City </th>
                                        <td>@if(!empty($supplierData->city)) {{ $supplierData->city }}
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <th> Created on </th>
                                        <td> {{ date('d M, Y (h:i:s A)', strtotime($supplierData->created_at)) }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /. Supplier Business -->
            @endif

            <!-- User Order info -->
            <div class="col-md-12" style="padding-top: 2em;">
                <div class="card">
                    <div class="card-header"><u>{{ $user->first_name }} {{ $user->last_name }}
                            ({{ implode(', ', $user->getRoleNames()->toArray()) }})</u></div>
                    <div class="card-body">

                        <a href="{{ url('/admin/user') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/user/' . $user->id . '/edit') }}" title="Edit user"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>


                        <div class="table-responsive">

                        </div>

                    </div>
                </div>
            </div>
            <!-- /. User Order info -->
        </div>
    </div>
</div>
@endsection