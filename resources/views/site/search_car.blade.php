<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome to ABHCARS - Your Destination for Quality Used Cars</title>
    <meta name="description"
        content="Discover a wide range of quality used cars at ABHCARS. Scan our unique QR codes to access detailed information about each vehicle - brand, year, fuel type, and more. Find your perfect car hassle-free!">
    <meta name="keywords" content="ABHCARS, used cars, quality vehicles, QR code, car sales, pre-owned cars">
    <meta name="author" content="ABHCARS">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="og:title" content="Welcome to ABHCARS - Your Destination for Quality Used Cars">
    <meta name="og:description"
        content="Discover a wide range of quality used cars at ABHCARS. Scan our unique QR codes to access detailed information about each vehicle - brand, year, fuel type, and more. Find your perfect car hassle-free!">
    <meta name="og:image" content="https://www.example.com/abhcars-logo.png">
    <meta name="og:url" content="https://www.abhcars.in">
    <meta name="og:type" content="website">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Welcome to ABHCARS - Your Destination for Quality Used Cars">
    <meta name="twitter:description"
        content="Discover a wide range of quality used cars at ABHCARS. Scan our unique QR codes to access detailed information about each vehicle - brand, year, fuel type, and more. Find your perfect car hassle-free!">
    <meta name="twitter:image" content="https://www.example.com/abhcars-logo.png">

    <link rel="canonical" href="https://www.abhcars.in">
    <!-- Other necessary meta tags or links go here -->
    @yield('tags')
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('siteassets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ url('siteassets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('siteassets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('siteassets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('siteassets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ url('siteassets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ url('siteassets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ url('siteassets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top bg-dark">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="{{ url('/') }}">ABHCars</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="{{ url('/') }}">Home</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <main id="main">


        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container p-4" style="{{ !$car ? 'margin-top: 10%;margin-bottom: 10%;' : '' }}">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h3>Enter Car Number</h3>
                        <p>Enter vehicle number to find vehicle details</p>
                        <form action="{{ url('/search/car') }}" method="get">
                            <div class="row">
                                <input type="text" name="filter[car_number]" class="form-control"
                                    placeholder="Enter number here" required>
                                <input type="submit" value="Search" class="btn btn-success mt-3">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>

        @if ($car)
            <section id="search" class="bg-white" style="padding-top: 0px; margin-bottom: 10%;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 ">
                            <div class="img img-thumbnail">
                                <img src="{{ $car->firstImageUrl }}" class="img-fluid" style="object-fit: cover;">
                            </div>
                            <div class="card p-3 mt-2 text-center bg-warning-subtle">
                                <h2> ₹ {{ $car->price }}</h2>
                            </div>
                            <table class="table table-striped mt-2">
                                <tbody>
                                    <tr>
                                        <th>Vehical No</th>
                                        <td>{{ $car->car_number ?? 'NA' }}</td>
                                    </tr>
                                    <tr>
                                        <th width="40%">Brand</th>
                                        <td>{{ $car->car_brand ?? 'NA' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Year</th>
                                        <td>{{ $car->year ?? 'NA' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fuel</th>
                                        <td>{{ $car->fuel ?? 'NA' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Transmission</th>
                                        <td>{{ config('drops.transmission')[$car->transmission ?? 1] }}</td>
                                    </tr>
                                    <tr>
                                        <th>KM Driven</th>
                                        <td>{{ $car->km_driven ?? 'NA' }}</td>
                                    </tr>
                                    <tr>
                                        <th>No Of Owners</th>
                                        <td>{{ $car->no_of_owners ?? 'NA' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tyre Condtion</th>
                                        <td>{{ $car->tyre_type ?? 'NA' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Insurance</th>
                                        <td>{{ $car->insurance == 1 ? 'YES' : 'NO' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Power Window</th>
                                        <td>{{ $car->p_window == 1 ? 'YES' : 'NO' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Power Steering</th>
                                        <td>{{ $car->p_steering == 1 ? 'YES' : 'NO' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Location</th>
                                        <td>{{ $car->location ?? 'NA' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Body-style</th>
                                        <td>{{ $car->bodystyle ?? 'NA' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Engine(CC)</th>
                                        <td>{{ $car->engine ?? 'NA' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Power(bhp)</th>
                                        <td>{{ $car->power ?? 'NA' }}</td>
                                    </tr>

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
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $car->car_description ?? 'NA' }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </main>




    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ url('siteassets/vendor/aos/aos.js') }}"></script>
    <script src="{{ url('siteassets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('siteassets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ url('siteassets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('siteassets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ url('siteassets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ url('siteassets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('siteassets/js/main.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            setInr();
        });

        function changeRate() {
            if ($('#currency').is(":checked")) {
                $("#rate1").html(
                    '<sup>$</sup>0<span>7 Days</span>');
                $("#rate2").html(
                    '<sup>$</sup>10<span>per month</span>');
                $("#rate3").html(
                    '<sup>$</sup>100<span>per year</span>');
            } else
                setInr()
        }

        function setInr() {
            $("#rate1").html('<sup>₹</sup>0<span>7 Days</span>');
            $("#rate2").html('<sup>₹</sup>599<span>per month</span>');
            $("#rate3").html('<sup>₹</sup>5999<span>per year</span>');
        }
    </script>

</body>

</html>
