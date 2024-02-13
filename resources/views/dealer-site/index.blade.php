@extends('layouts.dealer-site')
@section('tags')
    <meta property="og:image" content="{{ $dealer->imageUrl }}">
@endsection
@section('content')
    <section class="py-5 text-center container bg-{{ $dealer->social->theme ?? 'secondary' }} mt-3">
        <div class="row py-2">
            <div class="col-lg-6 col-md-8 mx-auto">

                <h1 class="fw-light text-white">{{ $dealer->company_name }}</h1>
                <p class="lead text-white">{{ $dealer->address }}</p>
                <p>
                    <a href="tel:+91{{ $dealer->contact_call }}" class="btn btn-light my-2"> <i class="uil-phone-alt"></i>
                        Call</a>
                    <a href="https://wa.me/{{ $dealer->contact_whatsapp }}" class="btn btn-light my-2"><i
                            class="bx bxl-whatsapp"></i> Whats App</a>
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
                    <button type="button" class="btn btn-outline-{{ $dealer->social->theme ?? 'secondary' }} btn-sm"
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
                    <div class="col-md-4 ">
                        <div class="card bg-light" style="--bs-bg-opacity: .5;">
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
                                        <li class="list-inline-item"><small>3 Views</small></li>
                                    </a>
                                </ul>
                                <div class="row justify-content-between">
                                    <div class="col">
                                        <h4 class="text-{{ $dealer->social->theme ?? 'secondary' }}"><i
                                                class="fa fa-inr"></i>
                                            {{ $car->price }}</h4>
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
                @endforeach
            </div>

        </div>
    </div>
    </main>
@endsection

@section('scripts')
    <script>
        function filterResults() {
            let sort = document.getElementById("price_sort").value;
            let brand_filter = document.getElementById("brand_filter").value;
            let year_filter = document.getElementById("year_filter").value;
            let car_name = document.getElementById("car_name").value;
            let fule_filter = document.getElementById("fule_filter").value;


            let href = '?sort=' + sort + '&';
            console.log(sort)
            href += 'filter[car_brand]=' + brand_filter;
            href += '&filter[car_name]=' + car_name;
            href += '&filter[year]=' + year_filter;
            href += '&filter[fuel]=' + fule_filter;

            document.location.href = href;
        }
        // document.getElementById("filter").addEventListener("click", filterResults);

        function filterResetResults() {
            let href = '' + {{ $dealer->user_id }};
            document.location.href = href;
        }
        document.getElementById("filter_reset").addEventListener("click", filterResetResults);
    </script>
@endsection
