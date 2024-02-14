@extends('layouts.master')
@section('title')
    @lang('translation.Dashboard')
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            ABHCars
        @endslot
        @slot('title')
            Profile
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-sm-12">
            @include('flash::message')
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User Info</h4>
                    <p class="card-title-desc">Information filled durting account creation.</p>

                    <form class="custom-validation" action="{{ route('updateprofile') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <div>
                                <input type="email" class="form-control" required parsley-type="email"
                                    placeholder="Enter a valid e-mail" value="{{ $user->email }}" disabled />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" required placeholder="Enter Username"
                                value="{{ $user->name }}" name="name" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mobile</label>
                            <input type="text" class="form-control" required placeholder="Mobile"
                                value="{{ $user->mobile }}" name="mobile" disabled />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                Submit
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Password</h4>
                    <p class="card-title-desc">Update your old password with new one.</p>

                    <form action="{{ route('updatepassword') }}" class="custom-validation" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Old Password</label>
                            <div>
                                <input type="password" class="form-control" required data-parsley-minlength="6"
                                    placeholder="Min 8 chars." name="old_password" />
                            </div>
                        </div>
                        <div class="row mb-3 mt-2">

                            <div class="col-sm-6">
                                <label class="form-label">New Password</label>
                                <input type="password" id="pass2" class="form-control" required placeholder="Password"
                                    name="new_password" />
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label ">Confirm Password</label>
                                <input type="password" class="form-control" required data-parsley-equalto="#pass2"
                                    placeholder="Re-Type Password" />
                            </div>
                        </div>




                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect">
                                Cancel
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
@endsection
