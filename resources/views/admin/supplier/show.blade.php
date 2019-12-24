@extends('layouts.panel.panel_design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Suppliers
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
                    <div class="card-header">Supplier ({{ $user->first_name }} {{ $user->last_name }})</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/supplier') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/supplier/' . $user->id . '/edit') }}" title="Edit Supplier"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>
                        <form method="POST" action="{{ url('admin/supplier' . '/' . $user->id) }}"
                            accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Supplier"
                                onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o"
                                    aria-hidden="true"></i> Delete</button>
                        </form>
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
                                    @if($roleName == "Supplier")
                                    <tr>
                                        <th> Business Name </th>
                                        <td> {{ $supplierData->business_name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Category </th>
                                        <td> <label
                                                class="badge badge-info badge-lg badge-pill">{{ $supplierData->category }}</label>
                                        </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th> Status </th>
                                        <td> @if($user->status == 1)<label
                                                class="badge badge-success badge-lg badge-pill">Enable</label>@elseif($user->status
                                            == 0) <label class="badge badge-danger badge-lg">Disable</label> @endif</td>
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
        </div>
    </div>
</div>
@endsection