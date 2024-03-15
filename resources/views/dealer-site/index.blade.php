@extends('layouts.dealer-site')
@section('tags')
    <meta property="og:image" content="{{ $dealer->imageUrl }}">
@endsection
@section('content')
    <section class="text-center container bg-{{ $dealer->social->theme ?? 'secondary' }} mt-3">
        <div class="row py-2">
            <div class="col-lg-6 col-md-8 mx-auto">

                <h2 class="fw-light text-white">{{ $dealer->company_name }}</h2>
                <p class="lead text-white font-size-14">{{ $dealer->address }}</p>
                <p>
                    <a href="tel:+91{{ $dealer->contact_call }}" class="btn btn-light btn-sm"> <i class="fa fa-phone"></i>
                        Call</a>
                    <a href="{{ url('/dealer/' . $dealer->user_id . '/profile') }}" class="btn btn-light btn-sm"><i
                            class="fa fa-info"></i>
                        About</a>
                    <button id="shareLink" class="btn btn-light btn-sm"><i class="fa fa-share"></i>
                        Share</button>
                </p>
            </div>
        </div>
    </section>

    <div class="album py-3 ">
        <div class="container">

            <div class="row justify-content-end">
                @if (request()->has('filter'))
                    <div class="col">
                        <a href="{{ url('/dealer/' . $dealer->user_id) }}">Reset Filter ❌</a>
                    </div>
                @endif
                <div class="col-auto mb-2">
                    <button type="button" class="btn btn-{{ $dealer->social->theme ?? 'secondary' }} btn-sm"
                        data-bs-toggle="collapse" data-bs-target="#demo">Show
                        Filters</button>

                </div>
                <div id="demo" class="collapse {{ request()->has('filter') ? 'show' : '' }}">

                    <div class="row  mb-5  justify-content-end">
                        <div class="col-6 col-md-3 mt-1">
                            <label for="price_sort" class="form-label">Sort by price:</label>
                            <select class="form-select" id="price_sort" name="price_sort" onchange="filterResults()">
                                <option value="">Select sort
                                </option>
                                <option value="price" {{ request()->input('sort') == 'price' ? 'selected' : '' }}>Low
                                    to
                                    high
                                </option>
                                <option value="-price" {{ request()->input('sort') == '-price' ? 'selected' : '' }}>High
                                    to
                                    low
                                </option>
                            </select>
                        </div>

                        <div class="col-6 col-md-3 mt-1">
                            <label for="price_sort" class="form-label">Year:</label>
                            <select class="form-select" id="year_filter" name="year" onchange="filterResults()">
                                <option value="">Select Year
                                </option>
                                @foreach ($years as $year)
                                    <option value="{{ $year }}"
                                        @if (request()->has('filter')) {{ request()->input('filter')['year'] == $year ? 'selected' : '' }} @endif>
                                        {{ $year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 col-md-3 mt-1">
                            <label for="price_sort" class="form-label">Brand:</label>
                            <select class="form-select" id="brand_filter" name="brand_filter" onchange="filterResults()">
                                <option value="">Select brand
                                </option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand }}"
                                        @if (request()->has('filter')) {{ request()->input('filter')['car_brand'] == $brand ? 'selected' : '' }} @endif>
                                        {{ $brand }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 col-md-3 mt-1">
                            <label for="price_sort" class="form-label">Fule:</label>
                            <select class="form-select" id="fule_filter" name="fule_filter" onchange="filterResults()">
                                <option value="">Select brand
                                </option>
                                @foreach ($fuels as $fuel)
                                    <option value="{{ $fuel }}"
                                        @if (request()->has('filter')) {{ request()->input('filter')['fuel'] == $fuel ? 'selected' : '' }} @endif>
                                        {{ $fuel }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>

            </div>


            <div class="row mb-2">

                @foreach ($cars as $car)
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
                                    <img src="{{ $car->firstImageUrl }}"
                                        style="height:100%; min-height: 15vh; object-fit:cover;"
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
                                    <p class="font-size-16 mb-1">{{ $car->location ?? 'Hidden Location' }} </p>
                                    <p class="font-size-13 mb-1 text-capitalize">{{ $car->year ?? '20XX' }} |
                                        {{ $car->km_driven ?? '10XXX' }} KM | {{ $car->fuel ?? 'XX' }} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- small display design end --}}
                @endforeach
            </div>
            {{ $cars->links() }}
        </div>
    </div>
    </main>
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
