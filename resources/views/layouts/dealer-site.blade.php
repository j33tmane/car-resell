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

<body class="bg-white">

    <header>

        <nav class="navbar navbar-expand-md navbar-light bg-white" aria-label="Fourth navbar example">
            <div class="container">
                <a class="navbar-brand text-uppercase"
                    href="{{ url('dealer/' . $dealer->user_id) }}">{{ $dealer->company_name }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample04">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ url('/dealer/' . $dealer->user_id) }}">Home</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <input class="form-control me-2" type="text" placeholder="Search car name" name="car_name"
                            id="car_name">
                        <button class="btn btn-outline-info btn" type="button"
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
            <p class="mb-1">{{ $dealer->company_name ?? '' }} &copy;All Rights Reserved!</p>

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
    <!-- JAVASCRIPT -->
    @yield('scripts')
</body>

</html>
