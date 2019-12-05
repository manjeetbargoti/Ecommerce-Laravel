@extends('layouts.panel.panel_design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    {{ $user->first_name }} {{ $user->last_name }}
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $user->first_name }} {{ $user->last_name }}
                        ({{ implode(', ', $user->getRoleNames()->toArray()) }})</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/dashboard') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/profile/' . $user->id . '/edit') }}" title="Edit user"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>
                        <a href="{{ url('/admin/profile/' . $user->id . '/change-password') }}"
                            title="Change Password"><button class="btn btn-primary btn-sm pull-right"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Change Password</button></a>
                        <br />
                        <br />
                        <div class="row">
                            <div class="col-lg-6 m-t-10">
                                <div class="text-center">
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumb_zoom zoom admin_img_width image-circle">
                                                <img src="{{ url('/images/230x170.jpg') }}"
                                                    alt="{{ $user->first_name }} {{ $user->last_name }}"
                                                    class="admin_img_width"></div>
                                            <div
                                                class="fileinput-preview fileinput-exists thumb_zoom zoom admin_img_width">
                                            </div>
                                            <!-- <div class="btn_file_position">
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new">Change image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="Changefile">
                                                </span>
                                                <a href="#" class="btn btn-warning fileinput-exists"
                                                    data-dismiss="fileinput">Remove</a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <ul class="nav nav-inline view_user_nav_padding">
                                        <li class="nav-item card_nav_hover">
                                            <a class="nav-link active" href="#user" id="home-tab" data-toggle="tab"
                                                aria-expanded="true">User Details</a>
                                        </li>
                                        @if($roleName == "Supplier" || $roleName == "Vendor")
                                        <li class="nav-item card_nav_hover">
                                            <a class="nav-link" href="#business" id="hats-tab"
                                                data-toggle="tab">Business
                                                info</a>
                                        </li>
                                        @endif
                                        <li class="nav-item card_nav_hover">
                                            <a class="nav-link" href="#address" id="followers"
                                                data-toggle="tab">Address</a>
                                        </li>
                                    </ul>
                                    <div id="clothing-nav-content" class="tab-content m-t-10">
                                        <div role="tabpanel" class="tab-pane fade show active" id="user">
                                            <table class="table" id="users">
                                                <tr>
                                                    <td>Username</td>
                                                    <td class="inline_edit">
                                                        <span>{{ $user->username }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Name</td>
                                                    <td class="inline_edit">
                                                        <span>{{ $user->title }} {{ $user->first_name }}
                                                            {{ $user->last_name }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>E-mail</td>
                                                    <td>
                                                        <span>{{ $user->email }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Phone Number</td>
                                                    <td>
                                                        <span>{{ $user->phone }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Role</td>
                                                    <td>
                                                        <span><label class="badge badge-success badge-lg badge-pill">{{ implode(', ', $user->getRoleNames()->toArray()) }}</label></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Created At</td>
                                                    <td>{{ date('d M, Y (h:i:s A)', strtotime($user->created_at)) }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="business">
                                            <div class="card_nav_body_padding">
                                                <table class="table" id="users">
                                                    <tr>
                                                        <td>Business Name</td>
                                                        <td class="inline_edit">
                                                            <span>@if(!empty($supplierData->business_name)){{ $supplierData->business_name }}
                                                                @endif</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Category</td>
                                                        <td class="inline_edit">
                                                            <span>@if(!empty($supplierData->business_name))
                                                                {{ $supplierData->category }} @endif</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="address">
                                            <div class="card_nav_body_padding follower_images">
                                                <div class="row">
                                                    <a class="btn btn-info btn-sm pull-right" href="#">Add New</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card m-t-35">
                    <div class="card-header bg-white">
                        <div>
                            <i class="fa fa-question-circle"></i>
                            Recent Query
                        </div>
                    </div>
                    <div class="card-body padding">
                        <div class="feed">
                            <ul>
                                <li>
                                    <span>
                                        <img src="img/roundicons/flat/Office-27.png" alt="text_image"
                                            class="rounded-circle img-fluid recent_feeds_img" />
                                    </span>
                                    <h5>
                                        Important Mails
                                    </h5>
                                    <p>
                                        Mail received from
                                        <strong>John</strong> .
                                    </p>
                                    <i>1 hr back</i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection