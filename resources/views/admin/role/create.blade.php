@extends('layouts.panel.panel_design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Create New Role
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
                    <div class="card-header">Create New Role</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/user/role') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        <form action="{{ url('admin/user/role') }}" method="POST"
                            class="form-horizontal login_validator" enctype="multipart/form-data"
                            id="form_inline_validator">

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="Name" class="control-label">Name</label>
                                <input type="text" class="form-control" required>
                            </div>

                            <div class="form-group {{ $errors->has('permissions') ? 'has-error' : ''}}">
                                <label for="Permissions" class="control-label">Permissions</label>
                                <select name="permissions" id="permissions" class="form-control" multiple>
                                    @foreach($permissions as $p)
                                    <option value="{{ $p->name }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Create Role" class="btn btn-info">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection