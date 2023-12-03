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
            Dashboard
        @endslot
    @endcomponent

    <div class="row">
        @if (!Auth::user()->dealerProfile)
            <div class="col-md-6 col-xl-3">
                <div class="alert alert-danger  fade show  px-4 mb-0 text-center" role="alert">
                    <i class="uil uil-exclamation-octagon d-block display-4 text-danger"></i>
                    <h5 class="text-danger">Oops</h5>
                    <p><a href="{{ url('/dealer-profile') }}">Please click to complete dealer profile first!</a></p>
                </div>
            </div>
        @endif
        @role('admin')
            <div class="col-md-6 col-xl-3">
                <div class="card bg-success-subtle">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <i class="uil-user-check text-primary" style="font-size: 30px"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $dpCnt }}</span></h4>
                            <p class="text-muted mb-0"><small>Dealers with complete profile</small></p>
                        </div>
                    </div>
                </div>
            </div> <!-- end col-->
        @endrole

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <i class="uil-car-sideview text-warning" style="font-size: 30px"></i>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $carsCnt }}</span></h4>
                        <p class="text-muted mb-0">Total Cars</p>
                    </div>

                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end">
                        <i class="uil-comment-message text-success" style="font-size: 30px"></i>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $enqCnt }}</span></h4>
                        <p class="text-muted mb-0">Total Enquiry</p>
                    </div>

                </div>
            </div>
        </div> <!-- end col-->

    </div> <!-- end row-->
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
@endsection
