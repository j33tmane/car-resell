@extends('layouts.dealer-site')
@section('tags')
    <meta property="og:image" content="{{ $car->firstImageUrl }}">
@endsection
@section('content')
    <section class="py-5 container">
        <div class="col-sm-12">
            @include('flash::message')
        </div>
        <div class="row mt-2">
            <div class="col-md-8">
                <div id="carouselExampleIndicators"
                    class="carousel slide border border-{{ $dealer->social->theme ?? 'secondary' }} rounded"
                    data-bs-ride="carousel">
                    {{-- <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div> --}}
                    <div class="carousel-inner">


                        @foreach ($car->images as $key => $item)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ $item->imageUrl }}" class="w-100 rounded" alt="..."
                                    style="object-fit: contain;" height="350px" width="100%">
                            </div>
                        @endforeach

                        @if ($car->images->count() == 0)
                            <div class="carousel-item active">
                                <img src="{{ $car->firstImageUrl }}" class="w-100 rounded" alt="..."
                                    style="max-height:500px;object-fit: contain;">
                            </div>
                        @endif


                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <article class="card blog-post bg-white p-3 mt-3 border border-{{ $dealer->social->theme ?? 'secondary' }}">

                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <h2 class="blog-post-title">{{ $car->car_name }}
                            </h2>
                        </div>

                    </div>
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <p class="blog-post-meta">{{ date('d-M-Y', strtotime($car->created_at)) ?? 'NA' }} by <a
                                    href="{{ url('dealer/' . $car->dealerProfile->user_id) }}">{{ $car->dealerProfile->company_name }}</a>
                            </p>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-sm text-{{ $dealer->social->theme ?? 'secondary' }}"
                                href="whatsapp://send?text=I just saw this ad {{ $car->car_name }} on {{ $car->dealerProfile->company_name }} website.%0a{{ Request::url() }}"
                                data-action="share/whatsapp/share" style="font-size:18px"> <i class="fa fa-whatsapp"
                                    style="font-size:20px"></i>
                            </a>
                            <a class="btn btn-sm text-{{ $dealer->social->theme ?? 'secondary' }}"
                                href="https://telegram.me/share/url?url={{ Request::url() }}&text=I just saw this ad {{ $car->car_name }} on {{ $car->dealerProfile->company_name }} website."
                                data-action="share/whatsapp/share" style="font-size:18px"> <i class="fa fa-telegram"
                                    style="font-size:20px"></i>
                            </a>
                            <button onclick="copyFunction()" class="btn btn-sm ">


                                <i class="fa fa-copy text-{{ $dealer->social->theme ?? 'secondary' }}"
                                    style="font-size:20px"></i>
                            </button>
                        </div>
                    </div>

                    <table class="table table-bordered">

                        <tbody>
                            @if ($car->car_number && $car->visibility != '2')
                                <tr>
                                    <th width="30%">Vehicle Number</th>
                                    <td>{{ $car->car_number ?? '' }}</td>
                                </tr>
                            @endif
                            @if ($car->car_brand)
                                <tr>
                                    <th>Brand</th>
                                    <td>{{ $car->car_brand ?? 'NA' }}</td>
                                </tr>
                            @endif
                            @if ($car->year)
                                <tr>
                                    <th>Year</th>
                                    <td>{{ $car->year ?? 'NA' }}</td>
                                </tr>
                            @endif
                            @if ($car->fuel)
                                <tr>
                                    <th>Fuel</th>
                                    <td>{{ $car->fuel ?? 'NA' }}</td>
                                </tr>
                            @endif
                            @if ($car->transmission)
                                <tr>
                                    <th>Transmission</th>
                                    <td>{{ config('drops.transmission')[$car->transmission ?? 1] }}</td>
                                </tr>
                            @endif
                            @if ($car->km_driven)
                                <tr>
                                    <th>KM Driven</th>
                                    <td>{{ $car->km_driven ?? 'NA' }}</td>
                                </tr>
                            @endif
                            @if ($car->no_of_owners)
                                <tr>
                                    <th>No Of Owners</th>
                                    <td>{{ $car->no_of_owners ?? 'NA' }}</td>
                                </tr>
                            @endif
                            @if ($car->tyre_type)
                                <tr>
                                    <th>Tyre Condtion</th>
                                    <td>{{ $car->tyre_type ?? 'NA' }}</td>
                                </tr>
                            @endif
                            @if ($car->insurance)
                                <tr>
                                    <th>Insurance</th>
                                    <td>{{ $car->insurance == 1 ? 'YES' : 'NO' }}</td>
                                </tr>
                            @endif
                            @if ($car->location)
                                <tr>
                                    <th>Location</th>
                                    <td>{{ $car->location ?? 'NA' }}</td>
                                </tr>
                            @endif
                            @if ($car->bodystyle)
                                <tr>
                                    <th>Body-style</th>
                                    <td>{{ $car->body_style_name ?? 'NA' }}</td>
                                </tr>
                            @endif

                            @if ($car->engine)
                                <tr>
                                    <th>Engine(CC)</th>
                                    <td>{{ $car->engine ?? 'NA' }}</td>
                                </tr>
                            @endif
                            @if ($car->power)
                                <tr>
                                    <th>Power(bhp)</th>
                                    <td>{{ $car->power ?? 'NA' }}</td>
                                </tr>
                            @endif

                            <tr>
                                <th>Features</th>
                                <td>
                                    @if ($car->features != null)
                                        @foreach (explode(',', $car->features) as $item)
                                            {{ Config::get('drops.features')[$item] }},
                                        @endforeach
                                    @else
                                        no features available
                                    @endif
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </article>

                @if ($car->social)
                    <article
                        class="card blog-post bg-white mt-3 p-3 border border-{{ $dealer->social->theme ?? 'secondary' }}">

                        <h5 class="blog-post-title">Description</h5>
                        <p>{{ $car->car_description ?? 'No Description is provided by dealer.' }}</p>


                    </article>
                @endif

                @if ($car->video_id)
                    <div class="card">
                        <div class="carousel-item active">
                            <iframe width="100%" height="300"
                                src="https://www.youtube.com/embed/{{ $car->video_id }}?rel=0" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                @endif





            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">

                    <div class="p-4 mb-3 bg-{{ $dealer->social->theme ?? 'secondary' }} rounded border border-{{ $dealer->social->theme ?? 'secondary' }}"
                        style="--bs-bg-opacity: .1;">
                        <h2 class="fw-bold">₹ {{ $car->price_inr }}</h2>
                        @if ($car->location)
                            Location: {{ $car->location ?? 'NA' }}
                        @endif
                        <div class="d-grid gap-2 mt-4">
                            @if ($car->is_sold)
                                <button type="button" class="btn btn-danger" disabled><b>SOLD</b></button>
                            @else
                                <button type="button" class="btn btn-outline-{{ $dealer->social->theme ?? 'secondary' }}"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">Submit Enquiry</button>
                            @endif
                        </div>
                    </div>

                    <div
                        class="p-4 mb-3 border border-{{ $dealer->social->theme ?? 'secondary' }} rounded d-none d-sm-none d-md-block">
                        <div class="row">
                            <div class="col-auto">

                                <a class=" text-uppercase" href="{{ url('dealer/' . $dealer->user_id) }}"><img
                                        src="{{ $dealer->image_url }}" class="img rounded-circle border border-white"
                                        style="height: 50px;width: 50px;object-fit: cover;">
                                </a>
                            </div>
                            <div class="col-auto">
                                <h5 class="fw-bold">{{ $dealer->company_name ?? '' }}</h5>
                                <p class="blog-post-meta">{{ date('d-M-Y', strtotime($car->created_at)) ?? 'NA' }} </a>
                                </p>

                            </div>
                            <div class="row">
                                <a href="{{ url('dealer/' . $car->dealerProfile->user_id) }}"
                                    class="btn btn-outline-{{ $dealer->social->theme ?? 'secondary' }}">View Other
                                    Vehicles</a>
                            </div>
                        </div>

                    </div>
                    <p class="mb-0 text-danger">Note: Original purchase invoice, insurance, road tax receipt, and
                        pollution
                        certificate
                        are other documents that are needed to be checked while buying a used car.</p>




                </div>
            </div>
        </div>
        <div class="row mt-3">
            @if ($rcars->count() > 0)
                <h4>Related Cars</h4>
            @endif
            @foreach ($rcars as $car)
                {{-- large display design start --}}
                <div class="col-md-4 d-none d-sm-none d-md-block">
                    <div class="card bg-light border border-{{ $dealer->social->theme ?? 'secondary' }}"
                        style="--bs-bg-opacity: .5;">
                        @if ($car->is_sold == 1)
                            <div class="card-img-overlay">
                                <a href="#" class="btn btn-sm btn-danger "><b>SOLD</b></a>
                            </div>
                        @endif
                        <img src="{{ $car->firstImageUrl }}" style="max-height:18vh;object-fit:cover;"
                            class="img-fluid image card-img-top">
                        <div class="card-body p-2">
                            <a href="#" class="text-dark">
                                <h5>{{ $car->car_name }} </h5>
                            </a>
                            <ul class="list-unstyled list-inline">
                                <a href="#" class="text-warning">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="#" class="text-muted">
                                    <li class="list-inline-item">
                                        <small>{{ \Carbon\Carbon::now()->diffInHours($car->created_at) }}

                                        </small>
                                    </li>
                                </a>
                            </ul>
                            <div class="row justify-content-between">
                                <div class="col">
                                    <h4 class="text-{{ $dealer->social->theme ?? 'secondary' }}"><i
                                            class="fa fa-inr"></i>
                                        {{ $car->price_inr }}
                                    </h4>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ url('dealer/car/' . $car->id) }}"
                                        class="btn btn-outline-{{ $dealer->social->theme ?? 'secondary' }} btn-sm">
                                        <li class="list-inline-item"><small>View Details</small></li>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- large display design end --}}
                {{-- small display design start --}}
                <div class="col-md-4 d-sm-block d-md-none">
                    <div class="card border border-{{ $dealer->social->theme ?? 'secondary' }}"
                        onclick="document.location='{{ url('dealer/car/' . $car->id) }}'">
                        <div class="row">

                            <div class="col-5">
                                @if ($car->is_sold == 1)
                                    <div class="card-img-overlay">
                                        <a href="#" class="btn btn-sm btn-danger font-size-10"><b>SOLD</b></a>
                                    </div>
                                @else
                                    <div class="card-img-overlay">
                                        <ul class="list-unstyled list-inline ">
                                            <a href="#" class="text-muted bg-white rounded p-1 font-size-10">
                                                <li class="list-inline-item">
                                                    <i class="fa fa-eye"></i>
                                                    <small>{{ \Carbon\Carbon::now()->diffInHours($car->created_at) }}

                                                    </small>
                                                </li>
                                            </a>
                                        </ul>
                                    </div>
                                @endif
                                <img src="{{ $car->firstImageUrl }}" style="height:15vh;object-fit:cover;"
                                    class="img-fluid  card-img-top rounded img-thumbnail ">
                            </div>
                            <div class="col-7 auto overflow-x-scroll">
                                <a href="#" class="text-dark">
                                    <p class="font-size-16 mb-1">{{ $car->car_name }} </p>
                                </a>
                                <h4 class="text-{{ $dealer->social->theme ?? 'secondary' }} mb-1"><i
                                        class="fa fa-inr"></i>
                                    {{ $car->price_inr }}
                                </h4>
                                <p class="font-size-16 mb-1">{{ $car->location ?? '' }} </p>
                                <p class="font-size-16 mb-1 text-capitalize">{{ $car->year ?? '20XX' }} |
                                    {{ $car->km_driven ?? '10XXX' }} KM | {{ $car->fuel ?? 'XX' }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- small display design end --}}
            @endforeach
        </div>
        <div class="p-4 mb-3 border border-{{ $dealer->social->theme ?? 'secondary' }} rounded  d-sm-block d-md-none">
            <div class="row">
                <div class="col-auto">

                    <a class=" text-uppercase" href="{{ url('dealer/' . $dealer->user_id) }}"><img
                            src="{{ $dealer->image_url }}" class="img rounded-circle border border-white"
                            style="height: 50px;width: 50px;object-fit: cover;">
                    </a>
                </div>
                <div class="col-auto">
                    <h5 class="fw-bold">{{ $dealer->company_name ?? '' }}</h5>
                    <p class="blog-post-meta">{{ date('d-M-Y', strtotime($car->created_at)) ?? 'NA' }} </a>
                    </p>

                </div>
                <div class="row">
                    <a href="{{ url('dealer/' . $car->dealerProfile->user_id) }}"
                        class="btn btn-outline-{{ $dealer->social->theme ?? 'secondary' }}">View Other
                        Vehicles</a>
                </div>
            </div>

        </div>
    </section>

    <br>
    {{-- <section class="py-5 container ">
        Related Ads
        <div class="row mb-2">
            <div class="col-4 oc-card">
                <div class="card shadow-sm" data-clickable="true" data-href="details.html" data-clickable="true"
                    data-href="details.html">
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0Y8bRw-GhxxxyuX8vUAZCXRNaFIDCINirXspJHyo0Dh1f8K5MzPOUAfOOf9gGq-JQmfE&usqp=CAU">
                    <div class="card-body" style="padding: 5px;">
                        <div class="row justify-content-between">
                            <div class="col">
                                <p class="card-text text-sm-start">Alto 800 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 oc-card">
                <div class="card shadow-sm" data-clickable="true" data-href="details.html">
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0Y8bRw-GhxxxyuX8vUAZCXRNaFIDCINirXspJHyo0Dh1f8K5MzPOUAfOOf9gGq-JQmfE&usqp=CAU">
                    <div class="card-body" style="padding: 5px;">
                        <div class="row justify-content-between">
                            <div class="col">
                                <p class="card-text ">Alto 800 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 oc-card">
                <div class="card shadow-sm" data-clickable="true" data-href="details.html">
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0Y8bRw-GhxxxyuX8vUAZCXRNaFIDCINirXspJHyo0Dh1f8K5MzPOUAfOOf9gGq-JQmfE&usqp=CAU">
                    <div class="card-body" style="padding: 5px;">
                        <div class="row justify-content-between">
                            <div class="col">
                                <p class="card-text ">Alto 800 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mb-2">
            <div class="col-4 oc-card">
                <div class="card shadow-sm" data-clickable="true" data-href="details.html" data-clickable="true"
                    data-href="details.html">
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0Y8bRw-GhxxxyuX8vUAZCXRNaFIDCINirXspJHyo0Dh1f8K5MzPOUAfOOf9gGq-JQmfE&usqp=CAU">
                    <div class="card-body" style="padding: 5px;">
                        <div class="row justify-content-between">
                            <div class="col">
                                <p class="card-text text-sm-start">Alto 800 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 oc-card">
                <div class="card shadow-sm" data-clickable="true" data-href="details.html">
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0Y8bRw-GhxxxyuX8vUAZCXRNaFIDCINirXspJHyo0Dh1f8K5MzPOUAfOOf9gGq-JQmfE&usqp=CAU">
                    <div class="card-body" style="padding: 5px;">
                        <div class="row justify-content-between">
                            <div class="col">
                                <p class="card-text ">Alto 800 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 oc-card">
                <div class="card shadow-sm" data-clickable="true" data-href="details.html">
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0Y8bRw-GhxxxyuX8vUAZCXRNaFIDCINirXspJHyo0Dh1f8K5MzPOUAfOOf9gGq-JQmfE&usqp=CAU">
                    <div class="card-body" style="padding: 5px;">
                        <div class="row justify-content-between">
                            <div class="col">
                                <p class="card-text ">Alto 800 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section> --}}
    <!-- Varying Modal Content example -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ url('enquiry/car/' . $car->id) }}" class="custom-validation">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Submit Enquiry</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        @csrf
                        <div class="mb-1">
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-1">
                            <label for="mobile" class="col-form-label">Mobile:</label>
                            <input type="text" class="form-control" id="mobile" name="mobile"
                                data-parsley-pattern="^[789]\d{9}$" required>
                        </div>
                        <div class="mb-1">
                            <label for="mobile" class="col-form-label">Offer Price:</label>
                            <input type="number" class="form-control" id="offer" name="offer" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message" name="message" required></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>

    <script>
        function copyFunction() {
            // Get the text field
            var copyText = window.location.href.toString();
            // Copy the text inside the text field
            navigator.clipboard
                .writeText(copyText)
                .then(() => {
                    alert("URL Copied : " + copyText);
                })
                .catch(() => {
                    alert("something went wrong");
                });
        }
    </script>
@endsection
