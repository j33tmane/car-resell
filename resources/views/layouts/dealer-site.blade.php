<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="At {{ $dealer->company_name ?? '' }}, {{ $dealer->address ?? '' }} we redefine the experience of purchasing pre-owned vehicles. With a passion for quality and reliability, we've established ourselves as a trusted name in the used car market.">
    <meta name="author" content="{{ $dealer->company_name ?? '' }}">
    @yield('tags')
    <title>{{ $dealer->company_name ?? '' }} | ABHCars</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
    <!-- Icons Css -->
    <link href="{{ URL::asset('/assets/css/icons.css') }}" id="icons-style" rel="stylesheet" type="text/css" />
    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('/assets/css/bootstrap.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/css/app.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .oc-card {
            padding-right: 6px;
            padding-left: 3px;
        }

        .card[data-clickable=true] {
            cursor: pointer;
        }

        /* .vp-font-small{
        font-size: 3vw;
      } */
    </style>


</head>

<body class="bg-white" style="--bs-bg-opacity: .5;">

    <header>
        <nav class="navbar navbar-expand-md bg-{{ $dealer->social->theme ?? 'secondary' }}"
            aria-label="Fourth navbar example">
            <div class="container">
                <a class=" text-uppercase" href="{{ url('dealer/' . $dealer->user_id) }}"><img
                        src="{{ $dealer->image_url }}" class="img rounded-circle border border-white"
                        style="height: 50px;width: 50px;object-fit: cover;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample04">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">


                    </ul>
                    {{-- <div class="d-flex">

                        <ul class="navbar-nav me-auto mb-2 mb-md-0">

                            <li class="nav-item">
                                <a class="nav-link " aria-current="page"
                                    href="{{ url('/dealer/' . $dealer->user_id) }}">Search Vehicle</a>
                            </li>
                        </ul>
                    </div> --}}

                    <div class="d-flex">

                        <input class="form-control me-2" type="text" placeholder="Search car name" name="car_name"
                            id="car_name"
                            value="@if (request()->has('filter')) {{ request()->input('filter')['car_name'] }} @endif">
                        <button class="btn btn-outline-light btn" type="button"
                            onclick="filterResults()">Search</button>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="{{ url('dealer/' . $dealer->user_id) }}">Home </a> |
                <a href="#">Back to top</a>
            </p>
            <p>
                <a href="{{ $dealer->social->instaurl ?? 'javascript:void(0);' }}" target="_blank"
                    class="btn btn-sm"><i class="fa fa-instagram" style="font-size: 20px;"></i></a>
                <a href="{{ $dealer->social->fburl ?? 'javascript:void(0);' }}" target="_blank" class="btn btn-sm"><i
                        class="fa fa-facebook" style="font-size: 20px;"></i></a>
                <a href="{{ $dealer->social->yturl ?? 'javascript:void(0);' }}" target="_blank" class="btn btn-sm"><i
                        class="fa fa-youtube" style="font-size: 20px;"></i></a>
                <a href="{{ $dealer->social->weburl ?? 'javascript:void(0);' }}" target="_blank" class="btn btn-sm"><i
                        class="fa fa-globe" style="font-size: 20px;"></i></a>
            </p>
            <p class="mb-1 text-center">{{ $dealer->company_name ?? '' }} &copy;All Rights Reserved!</p>

        </div>
    </footer>


    <script src="{{ url('assets/libs/bootstrap/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(() => {
            $(document.body).on('click', '.card[data-clickable=true]', (e) => {
                var href = $(e.currentTarget).data('href');
                window.location = href;
            });
        });


        function formatMe(dig) {
            const formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'INR',

                // These options are needed to round to whole numbers if that's what you want.
                //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
                //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
            });
            return formatter.format(dig);
        }
    </script>
    <script>
        function filterResults() {
            let sort = document.getElementById("price_sort")?.value;
            let brand_filter = document.getElementById("brand_filter")?.value;
            let year_filter = document.getElementById("year_filter")?.value;
            let car_name = document.getElementById("car_name")?.value;
            let fule_filter = document.getElementById("fule_filter")?.value;


            let href = @json(url('/dealer/' . $dealer->user_id));
            console.log(sort)
            href += !sort ? '?sort=' : '?sort=' + sort
            href += !fule_filter ? '&filter[fuel]=' : '&filter[fuel]=' + fule_filter;
            href += !brand_filter ? '&filter[car_brand]=' : '&filter[car_brand]=' + brand_filter;
            href += !car_name ? '&filter[car_name]=' : '&filter[car_name]=' + car_name;
            href += !year_filter ? '&filter[year]=' : '&filter[year]=' + year_filter;


            document.location.href = href;
        }
        // document.getElementById("filter").addEventListener("click", filterResults);
    </script>
    @yield('scripts')
</body>

</html>
