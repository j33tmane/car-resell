@extends('layouts.admin')

@section('title')
    Edit Role
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        @component('common-components.breadcrumb')
            @slot('title')
                Role Master
            @endslot
        @endcomponent
    </div>
    <div class="col-lg-6">
        @include('flash::message')
        @include('layouts.components.server_validation_error')
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('role.update', $role->id) }}" method="POST" class="custom-validation" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label>Role Name</label>
                        <input type="text" class="form-control" value="{{ old('name', $role->name) }}" name="name"
                            id="name" placeholder="Enter a role name">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Update Role" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
