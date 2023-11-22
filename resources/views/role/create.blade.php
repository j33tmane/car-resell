@extends('layouts.master')

@section('title')
    Add Role
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
        @include('common-components.server_validation_error')
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('role.store') }}" method="POST" class="custom-validation" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Role Name</label>
                        <input type="text" class="form-control" required="" value="{{ old('name') }}" name="name"
                            id="name" placeholder="Enter a Role name">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Create Role" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-scripts')
@endsection
