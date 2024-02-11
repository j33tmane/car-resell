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
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="index.html">ABHCars</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    
                    {{-- <li><a class="nav-link scrollto" href="#vehicals">Vehicals</a></li> --}}
                    <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
                    <li><a class="nav-link scrollto" href="#footer">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->




        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
    
                        <div class="col-lg-4 col-md-6 footer-contact">
                            <h3>ABHCARS</h3>
                            <p>
                                NEAR SAINATH HOSPITAL<br>
                                MAIN ROAD RUKDI <br>
                                NEAR ICC BANK ATM <br>
                                PIN 416118 <br><br>
                                <strong>Phone:</strong> +91 90964 18208<br>
                            </p>
                        </div>
    
                        <div class="col-lg-4 col-md-6 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">About</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Demo</a></li>
    
                            </ul>
                        </div>
    
                        <div class="col-lg-4 col-md-6 footer-links">
                            <h4>Leagel</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    
    
        </footer><!-- End Footer -->
    
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