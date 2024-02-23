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
                <div class="row align-items-center m-4">
                    <div class="col-lg-4 order-lg-1 order-2 text-center mt-3">
                        <div class="d-flex align-items-center justify-content-around ">
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
                        <a href="{{ url('/dealer/' . $dealer->user_id) }}"
                            class="mb-0 fs-6 btn btn-outline-{{ $dealer->social->theme ?? 'secondary' }} btn-sm mt-3">View
                            All Cars</a>
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
                            <li class="position-relative" id="shareLink">
                                <a class="text-white bg-warning d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                                    href="javascript:void(0)">
                                    <i class="fa fa-share-alt"></i>
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
                    @if ($dealer->description)
                        <div class="card hover-img p-3 border border-{{ $dealer->social->theme ?? 'secondary' }} rounded">

                            {!! nl2br(e($dealer->description)) !!}
                        </div>
                    @else
                        <div class="card hover-img p-3 border border-{{ $dealer->social->theme ?? 'secondary' }} rounded">
                            {{ $dealer->company_name }} is a trusted name in the pre-owned car market, dedicated to
                            providing
                            quality
                            vehicles and exceptional service to our customers. With years of experience in the automotive
                            industry,
                            we have established ourselves as a reliable source for purchasing reliable, affordable, and
                            well-maintained used cars.

                            Mission Statement:
                            Our mission at {{ $dealer->company_name }} is to simplify the car-buying process for our
                            customers
                            by
                            offering
                            a wide selection of high-quality used vehicles at competitive prices. We aim to exceed
                            expectations
                            by
                            providing personalized assistance, transparent dealings, and ongoing support to ensure a
                            satisfying
                            and
                            hassle-free buying experience.
                            <br><br>
                            Services:
                            <br><br>
                            Extensive Inventory:<br> We maintain a diverse inventory of used cars, trucks, SUVs, and vans,
                            meticulously
                            inspected and thoroughly reconditioned to meet our high standards.<br>
                            Financing Options: <br>Our experienced finance team works with various lenders to offer flexible
                            financing
                            solutions tailored to each customer's budget and credit situation.<br>
                            Trade-In Assistance:<br> We accept trade-ins, providing fair market value assessments to help
                            customers
                            seamlessly transition into their new vehicle.<br>
                            Warranty and Protection Plans: <br>For added peace of mind, we offer comprehensive warranty
                            options
                            and
                            vehicle protection plans to safeguard against unexpected repairs.<br>
                            Exceptional Customer Service:<br> Our dedicated sales staff is committed to providing
                            knowledgeable
                            guidance, transparent communication, and ongoing support to ensure complete customer
                            satisfaction.
                            <br><br>
                            Why Choose Us:
                            <br><br>
                            Quality Assurance: <br>Every vehicle in our inventory undergoes a rigorous inspection process to
                            ensure
                            reliability and performance.
                            Competitive Pricing: We offer fair and transparent pricing, backed by market analysis and
                            competitive
                            comparison.<br><br>
                            Customer-Centric Approach: <br>At {{ $dealer->company_name }} , customer satisfaction is our
                            top
                            priority.
                            We
                            strive to build lasting relationships based on trust, integrity, and respect.
                            Convenient Location: Our conveniently located dealership provides easy access for customers from
                            across
                            the region, with ample parking and a welcoming atmosphere.<br><br>
                            Contact Information:<br>
                            {{ $dealer->company_name }}<br>
                            Address: {{ $dealer->company_name }}<br>
                            Contact Person:{{ $dealer->contact_person_name }}<br>
                            Phone: {{ $dealer->contact_call }}<br>
                            Website: {{ $dealer->social->weburl ?? 'NA' }}<br>

                            For inquiries, appointments, or to browse our current inventory, please contact us or visit our
                            showroom
                            today!
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var title = @json($dealer->company_name);
        var text = @json($dealer->address);
        var url = window.location.href;
        const shareButton = document.getElementById("shareLink");
        shareButton.addEventListener("click", (e) => {
            if (navigator.share) {
                navigator.share({
                        title: title,
                        text: text,
                        url: url,
                    })
                    .then(() => console.log('Successful share'))
                    .catch((error) => console.log('Error sharing', error));
            } else {
                console.log('Share not supported on this browser, do it the old way.');
            }
        });
    </script>
@endsection
