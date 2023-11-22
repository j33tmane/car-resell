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
        @unlessrole('admin')
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
        @endunlessrole

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
