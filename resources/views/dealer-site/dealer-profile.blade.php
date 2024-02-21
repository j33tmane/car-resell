@extends('layouts.dealer-site')

@section('pagecss')
    <style>
        body {
            padding-top: 20px;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        .card {
            margin-bottom: 30px;
        }

        .overflow-hidden {
            overflow: hidden !important;
        }

        .p-0 {
            padding: 0 !important;
        }

        .mt-n5 {
            margin-top: -3rem !important;
        }

        .linear-gradient {
            background-image: linear-gradient(#50b2fc, #f44c66);
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .align-items-center {
            align-items: center !important;
        }

        .justify-content-center {
            justify-content: center !important;
        }

        .d-flex {
            display: flex !important;
        }

        .rounded-2 {
            border-radius: 7px !important;
        }

        .bg-light-info {
            --bs-bg-opacity: 1;
            background-color: rgba(235, 243, 254, 1) !important;
        }

        .card {
            margin-bottom: 30px;
        }

        .position-relative {
            position: relative !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }

        .overflow-hidden {
            overflow: hidden !important;
        }

        .border {
            border: 1px solid #ebf1f6 !important;
        }

        .fs-6 {
            font-size: 1.25rem !important;
        }

        .mb-2 {
            margin-bottom: 0.5rem !important;
        }

        .d-block {
            display: block !important;
        }

        a {
            text-decoration: none;
        }

        .user-profile-tab .nav-item .nav-link.active {
            color: #5d87ff;
            border-bottom: 2px solid #5d87ff;
        }

        .mb-9 {
            margin-bottom: 20px !important;
        }

        .fw-semibold {
            font-weight: 600 !important;
        }

        .fs-4 {
            font-size: 1rem !important;
        }

        .card,
        .bg-light {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .fs-2 {
            font-size: .75rem !important;
        }

        .rounded-4 {
            border-radius: 4px !important;
        }

        .ms-7 {
            margin-left: 30px !important;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="card overflow-hidden mt-5">
            <div class="card-body p-0 border border-{{ $dealer->social->theme ?? 'secondary' }} rounded">
                <img src="{{ $dealer->banner }}" alt="banner" class="bg-secondary" width="100%" height="250px"
                    style="object-fit: cover;">
                <div class="row align-items-center">
                    <div class="col-lg-4 order-lg-1 order-2">
                        <div class="d-flex align-items-center justify-content-around m-4">
                            <div class="text-center">
                                <i class="fa fa-car fs-6 d-block mb-2"></i>
                                <h4 class="mb-0 fw-semibold lh-1">{{ $carsTotal ?? 0 }}</h4>
                                <p class="mb-0 fs-4">Total Cars</p>
                            </div>
                            <div class="text-center">
                                <i class="fa fa-car fs-6 d-block mb-2"></i>
                                <h4 class="mb-0 fw-semibold lh-1">{{ $soldCars ?? 0 }}</h4>
                                <p class="mb-0 fs-4">Sold Cars</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                        <div class="mt-n5">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <div class="linear-gradient d-flex align-items-center justify-content-center rounded-circle"
                                    style="width: 110px; height: 110px;" ;="">
                                    <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                                        style="width: 100px; height: 100px;">
                                        <img src="{{ $dealer->image_url ?? '' }}" alt="" class="w-100 h-100">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mb-2">
                                <p class="mb-0 fs-3">{{ $dealer->company_name ?? '' }}</p>
                                <h5 class="fs-6  fw-normal">{{ $dealer->address ?? '' }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 order-last text-right">
                        <ul
                            class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-start my-3 gap-3">
                            <li class="position-relative">
                                <a class="text-white bg-primary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle"
                                    href="{{ $dealer->social->fburl ?? 'javascript:void(0)' }}">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                                    href="{{ $dealer->social->instaurl ?? 'javascript:void(0)' }}">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>

                            <li class="position-relative">
                                <a class="text-white bg-danger d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                                    href="{{ $dealer->social->weburl ?? 'javascript:void(0)' }}">
                                    <i class="fa fa-globe"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane fade show active" id="pills-friends" role="tabpanel" aria-labelledby="pills-friends-tab"
                tabindex="0">
                <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                    <h3
                        class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center text-{{ $dealer->social->theme ?? 'secondary' }}">
                        About Us</h3>

                </div>
                <div class="col-sm-12 col-lg-12">
                    <div class="card hover-img p-3 border border-{{ $dealer->social->theme ?? 'secondary' }} rounded">

                        {!! nl2br(e($dealer->description)) !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
