@extends('layouts.master')
@section('title')
    Verification
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            ABHCars
        @endslot
        @slot('title')
            Verification
        @endslot
    @endcomponent

    <div class="row">
        @if (!Auth::user()->active == 0)
            <div class="col-md-12 col-xl-12 col-sm-12">
                <div class="alert alert-danger  fade show  px-4 mb-0 text-center" role="alert">
                    <i class="uil uil-exclamation-octagon d-block display-4 text-danger"></i>
                    <h5 class="text-danger">Please Wait..</h5>
                    <p>Your account is under verification, it will be active once
                        verfication is completed.</p>
                </div>
            </div>
        @endif

    </div> <!-- end row-->
@endsection
@section('script')
@endsection
